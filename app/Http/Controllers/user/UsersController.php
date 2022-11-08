<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function buscarUsers(Request $request)
    {
        try {
            $users = $this->user->findAll();;

            return response()->json(['success' => true, 'users' => $users]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()], 500);
        }
    }

    public function buscarCidades(Request $request)
    {
        try {
            $users = $this->user->findAll();;

            return response()->json(['success' => true, 'users' => $users]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()], 500);
        }
    }

    public function enviarCriarUser(Request $request)
    {
        try {
            $dados = $request->all();
            $user = $this->user->create($dados);

            return response()->json(['success' => true, 'usuario' => $user]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()], 500);
        }
    }
}
