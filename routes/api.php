<?php

use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AgendaFilterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [AgendaFilterController::class, 'users'])
    ->name('users');

Route::get('/villes', [AgendaFilterController::class, 'villes'])
    ->name('villes');

Route::get('/{id}/secteurs', [AgendaFilterController::class, 'secteurs'])
    ->name('secteurs');

Route::get('/filter', [AgendaFilterController::class, 'filter'])
    ->name('filter');

Route::get('/visites', function () {
    $visites = Visite::with(['user', 'medecin'])->get();

    return response($visites);
})
    ->name('filter');
