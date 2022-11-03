<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'idade',
        'sexo',
        'nivel_escolaridade',
        'cidade',
        'bairro',
        'created_at',
        'updated_at'
    ];

    public function findAll()
    {
        return User::where('status', 'Ativo')->get();
    }
}
