<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesquisa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    static $rules = [
        '' => ''
    ];

    public function pesquisa_perguntas(){
        return $this->hasMany('App\Models\Pesquisa_perguntas', 'pesquisa_id', 'id')->orderBy('order', 'ASC');
    }
}
