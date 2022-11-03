<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Frase extends Model
{
    protected $table = 'frases';

    public function findRespostas($request)
    {
        $selects = $request['selects'] ?? ['respostas.*'];

        return DB::table('respostas')->select($selects)
            ->join('users', 'users.id', '=', 'respostas.id_user')
            ->join('frases', 'frases.id', '=', 'respostas.id_frase')
            ->where(function ($query) use ($request) {
                if (isset($request['id_user'])) {
                    $query->where('respostas.id_user', $request['id_user']);
                }
                if (isset($request['nivel'])) {
                    $query->where('frases.nivel', $request['nivel']);
                }
            })
            ->distinct('respostas.id')
            ->orderBy('respostas.id', 'desc')
            ->get();
    }

    public function createResposta($request)
    {
        DB::table('respostas')->insert($request);
    }
}
