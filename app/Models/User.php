<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Add ApiTokens Passport Later

    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'username',
        'cin',
        'phone',
        'photo',
        'date_embauche',
        'date_naissance',
        'ville_id',
        'secteur_id',
        'add_medecin_permision',
        'listing_permision',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'ville_id',
        'secteur_id',
        'email_verified_at',
        'created_at',
        'updated_at',
        'visites',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_embauche' => 'date',
        'date_naissance' => 'date',
    ];

    protected $appends = ['count_visites'];

    protected $supportedRelations = ['villes','secteures'];

    /* -------------------------------------------------------------------------- */
    /*                                  GET DATA                                  */
    /* -------------------------------------------------------------------------- */

    public function findForPassport($identifier) {
        return $this->orWhere('email', $identifier)->orWhere('user_name', $identifier)->first();
    }

    public function getVisitesToday(){
        return $this->visites()
            ->whereYear('date',now()->year)
            ->whereMonth('date',now()->month)
            ->whereDay('date',now()->day)
            ->where('etat',Visite::_DEFAULT_)
            ->get();
    }

    public function getVisitesTodayApi(){
        $visites = [];

        foreach ($this->getVisitesToday() as $key => $item) {
            // $image = "https://via.placeholder.com/500x400";

            $visites [] = array(
                "id"=>$item->id,
                "medecin"=>$item->getMedecinName(),
                "image"=>$item->medecin ? $item->medecin->photos : array(),
                "position"=>$item->getMedecinPosition()
            );
        }

        return $visites;
    }

    public function countVisitesPrevueToday(){
        return $this->visites()
            ->whereYear('date',Carbon::now()->year)
            ->whereMonth('date',Carbon::now()->month)
            ->whereDay('date',Carbon::now()->day)
            ->count();
    }

    public function countVisitesDoneToday(){
        return $this->visites()
            ->where('etat',Visite::_END_)
            ->whereYear('date',Carbon::now()->year)
            ->whereMonth('date',Carbon::now()->month)
            ->whereDay('date',Carbon::now()->day)
            ->count();
    }


    public function tauxCouvertureLastWeek(){
        $now = Carbon::now()->addWeek(-1);
        // dump($now->toString(),$now->startOfWeek()->toString(),$now->endOfWeek()->toString());
        $visites = $this->visites()
            ->whereBetween('date',[$now->startOfWeek()->format('Y-m-d'),$now->endOfWeek()->format('Y-m-d')])
            ->get();
        // dd($visites);

        return (($visites->where('etat',Visite::_END_)->count()*100)/($visites->count() > 0 ? $visites->count() : 1));
    }

    /* -------------------------------------------------------------------------- */
    /*                                  ATTRIBUTE                                 */
    /* -------------------------------------------------------------------------- */

    public function getCountVisitesAttribute(){
        return $this->visites->where('etat',Visite::_END_)->count();
        // return 0;
        // return $this->visites()->where('etat',Visite::_END_)->count();
    }

    public function countVisitesWithDate(Carbon $f_date,Carbon $l_date){
        $visites = $this->visites()->whereBetween('date',[$f_date,$l_date])->get();
        $count_visites_all = $visites->count();
        $count_visites_end = $visites->where('etat',Visite::_END_)->count();
        return ($count_visites_end*100)/($count_visites_all > 0 ? $count_visites_all : 1);
    }

    /* -------------------------------------------------------------------------- */
    /*                                RELATIONSHIP                                */
    /* -------------------------------------------------------------------------- */

    public function medecins(){
        return $this->hasMany(MediPharma::class);
    }

    public function visites(){
        return $this->hasMany(Visite::class);
    }

    public function historiques(){
        return $this->hasMany(Historique::class,'user_id','id');
    }

    public function villes(){
        return $this->BelongsToMany(Ville::class,'ville_user','user_id','ville_id');
    }

    public function secteures(){
        return $this->BelongsToMany(Secteur::class,'secteur_user','user_id','secteur_id');
    }
}
