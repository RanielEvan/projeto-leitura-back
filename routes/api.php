<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Routes\User;
User::getUser();

use App\Routes\Frase;
Frase::getFrase();

use App\Routes\Relatorio;
Relatorio::getRelatorio();

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
