<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;

class Relatorio
{
    public static function getRelatorio($middlware = [], $prefix = '/relatorio')
    {
        return Route::group(['middleware' => $middlware, 'prefix' => $prefix], function () {
            Route::get('/get-relatorio-geral', [\App\Http\Controllers\relatorio\RelatorioController::class, 'buscarRelatorioGeral']);
        });
    }
}
