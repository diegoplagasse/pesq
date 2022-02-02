<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pesquisa_perguntas;
use Dotenv\Validator;
use Illuminate\Http\Request;

class PerguntasController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth()->guard('api')->user();
    }

    public function index(Request $request)
    {
        $perguntas = Pesquisa_perguntas::where('user_id', $this->user->id)
                        ->where('tipo', $request->tipo)
                        ->where('pesquisa_id', $request->uid)
                        ->with('user')
                        ->orderBy('id', 'DESC')
                        ->paginate(env('APP_PAGINATE'));

        return compact('notes');

    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Pesquisa_perguntas::$rules);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 200);
        }

        $pergunta = new Pesquisa_perguntas;
        $pergunta->user_id = $this->user->id;
        $pergunta->fill($request->all());
        $pergunta->save();
        
        if($pergunta->id){
            return $pergunta->fresh('user');
        }

        return $this->error('Erro ao cadastrar nota');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Pesquisa_perguntas::$rules);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 200);
        }

        $pergunta = Pesquisa_perguntas::where('user_id', $this->user->id)
                        ->find($id);
        
        if($pergunta){
            $pergunta->fill($request->all());
            if($pergunta->save()){
                return $this->success('Dados atualizados com sucesso');
            }
            return $this->error('Erro ao atualizar dados'); 
        }

        return $this->error('Nota não encontrada');
    }


    public function destroy($id)
    {
        $pergunta = Pesquisa_perguntas::where('user_id', $this->user->id)
                        ->find($id);
        if($pergunta->id){
            if($pergunta->delete()){
                return $this->success('Pergunta apagada com sucesso');
            }
            return $this->error('Erro ao apagar dados');
        }
        return $this->error('Pergunta não encontrada');

    }
}
