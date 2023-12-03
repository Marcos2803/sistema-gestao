<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index ()
    {
      $findProduto = Produtos::all();
      //dd($findProduto);
      return view ('pages.produtos.paginacao', compact('findProduto'));

    }
}
