<?php

use App\Models\User;
use App\Models\Visite;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/visites', function () {
    $visites = Visite::with(['user', 'medecin'])->get();

    return response($visites);
})
    ->name('filter');
