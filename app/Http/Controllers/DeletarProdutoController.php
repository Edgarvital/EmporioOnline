<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Validator\ProdutoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class deletarProdutoController extends Controller
{

    public function deletar(Request $request)
    {
            $produto = Produto::find($request->id);
        if(Gate::allows('delete-produto', $produto)) {
            $produto->delete();
        }
            return redirect('/listarProdutos');

    }
}
