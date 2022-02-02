<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesquisa_perguntas extends Model
{
    use HasFactory;

    protected $table = 'pesquisa_perguntas';
    protected $guarded = ['id'];


    static $rules = [
        'pergunta' => 'required'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id')->select('id', 'name');
    }
}
