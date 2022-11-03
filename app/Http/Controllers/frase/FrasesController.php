<?php

namespace App\Http\Controllers\frase;

use App\Http\Controllers\Controller;
use App\Models\Frase;
use App\Models\User;
use Illuminate\Http\Request;

class FrasesController extends Controller
{
    protected $user;
    protected $frase;

    public function __construct(User $user, Frase $frase)
    {
        $this->user = $user;
        $this->frase = $frase;
    }

    public function buscarFrase(Request $request)
    {
        try {
            $params['id_user'] = $request['id_user'];
            $params['selects'] = ['respostas.*', 'frases.nivel'];
            $respostas = $this->frase->findRespostas($params);

            if ($ultima_resposta = $respostas->first()) {
                $nivel_atual = $ultima_resposta->porcentagem_acerto >= 70 ? ($ultima_resposta->nivel + 1) : $ultima_resposta->nivel;
                $respostas_corretas = $respostas->where('porcentagem_acerto', '>=', 70)->pluck('id_frase');
            } else {
                $nivel_atual = 1;
                $respostas_corretas = [];
            }

            $frase = $this->frase->whereNotIn('id', $respostas_corretas)->where('nivel', $nivel_atual)->inRandomOrder()->first();

            if (!$frase) {
                return response()->json(['success' => false, 'message' => 'Parabéns, você completou o desafio da leitura!'], 500);
            }

            return response()->json(['success' => true, 'frase' => $frase]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()], 500);
        }
    }

    public function enviarRespostaFrase(Request $request)
    {
        try {
            $dados = $request->all();
            $this->frase->createResposta($dados);

            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()], 500);
        }
    }
}
