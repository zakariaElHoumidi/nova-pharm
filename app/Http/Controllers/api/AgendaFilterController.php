<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Ville;
use App\Http\Controllers\Controller;
use App\Models\Visite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendaFilterController extends Controller
{
    public function users()
    {
        $users = User::all();

        return response($users);
    }

    public function villes()
    {
        $villes = Ville::all();

        return response($villes);
    }

    public function secteurs($id)
    {

        $ville = Ville::find($id);

        return response($ville->secteurs);
    }

    public function filter(Request $req)
    {
        $user = $req->query('user');
        $ville = $req->query('ville');
        $secteur = $req->query('secteur');
        $date = $req->query('date');


        $visites = Visite::query();

        if ($user) {
            $visites = $visites->where('user_id', $user);
        }

        if ($ville) {
            $visites = $visites->where('ville_id', $ville);
        }

        if ($date) {
            $formattedDate = Carbon::parse($date)->format('Y-m-d H:i');

            $visites = $visites->whereRaw("DATE_FORMAT(date, '%Y-%m-%d %H:%i') = ?", [$formattedDate]);
        }

        return response($visites->get());
    }
}
