<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;

class User
{
    public static function getUser($middlware = [], $prefix = '/user')
    {
        return Route::group(['middleware' => $middlware, 'prefix' => $prefix], function () {
            Route::get('/get-users', [\App\Http\Controllers\user\UsersController::class, 'buscarUsers']);
            Route::get('/get-cidades', [\App\Http\Controllers\user\UsersController::class, 'buscarCidades']);
            Route::post('/enviar-criar', [\App\Http\Controllers\user\UsersController::class, 'enviarCriarUser']);
        });
    }
}
