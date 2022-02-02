<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pesquisa;
use App\Models\Pesquisa_formTipos;
use Illuminate\Http\Request;


class PesquisasController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = Auth()->guard('api')->user();
    }

    private function getData()
    {
        return [
            'tipos_input' => Pesquisa_formTipos::all()
        ];
    }
    
    public function index()
    {
        //
    }

    
    public function store()
    {
        $pesquisa = Pesquisa::with('pesquisa_perguntas')
                        ->firstOrCreate([
                            'usuario_id'=> $this->user->id,
                            'status_pesquisa' => 0
                        ]);

        return array_merge(['pesquisa' => $pesquisa], $this->getData());
    }

    
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
