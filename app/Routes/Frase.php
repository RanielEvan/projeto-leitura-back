<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;

class Frase
{
    public static function getFrase($middlware = [], $prefix = '/frase')
    {
        return Route::group(['middleware' => $middlware, 'prefix' => $prefix], function () {
            Route::get('/get-frase', [\App\Http\Controllers\frase\FrasesController::class, 'buscarFrase']);
            Route::post('/enviar-resposta-frase', [\App\Http\Controllers\frase\FrasesController::class, 'enviarRespostaFrase']);
        });
    }
}
