<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UsersApiController;
use App\Http\Controllers\Api\SeedlingApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
    RESTful Api - HTTP metode za tablicu "Users"

    GET /api/users           - dohvaća sve korisnike
    GET /api/users/{id}      - dohvaća pojedinog korisnika po njegovom ID-u
    POST /api/users          - pravi novog korisnika
    PUT /api/users/{id}      - ažurira postojeđeg korisnika putem njegova ID-a
    DELETE /api/users/{id}   - briše korisnika putem njegova ID-a

    Sve podatke dostavlja u json formatu
*/
Route::get('/users', [UsersApiController::class, 'index']);
Route::get('/users/{user}', [UsersApiController::class, 'getSingleUser']);
Route::post('/users', [UsersApiController::class, 'store']);
Route::put('/users/{user}', [UsersApiController::class, 'update']);
Route::delete('/users/{user}', [UsersApiController::class, 'destroy']);

/*
    RESTful Api - HTTP metode za tablicu "Users"

    GET /api/seedlings       - dohvaća sve sadnice
    GET /api/seedlings/{id}  - dohvaća pojedinu sadnicu po ID-u

    Sve podatke dostavlja u json formatu
*/
Route::get('/seedlings', [SeedlingApiController::class, 'index']);
Route::get('/seedlings/{seedling}', [SeedlingApiController::class, 'getSingleSeedling']);