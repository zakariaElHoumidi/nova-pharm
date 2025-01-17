<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

 Route::get('/test', function (Request $request) {
     $getUsers = fn () => Http::nyt()->get('/list/overview.json')->json('results.lists');

     Cache::remember('agenda', now()->addMinute(10), $getUsers);
 });
