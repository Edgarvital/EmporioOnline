<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor', 'total', 'data',
    ];

    public static $rules = [
        'valor' => 'required|min:1|max:6',
        'total' => 'required|min:1|max:6',
        'data' => 'required'
    ];

    public static $messages = [
        'valor.*' => 'O valor é um campo obrigatório, e deve ter entre 1 e 6 digitos',
        'total.*' => 'O valor total é um campo obrigatório, e deve ter entre 1 e 6 digitos',
        'data.*' => 'A data é um campo obrigatório'
    ];

    public function usuario(){
    	return $this->belongsTo('App\Models\Usuario');
    }

    public function produtos(){
    	return $this->hasMany('App\Models\Produto');
    }
}
