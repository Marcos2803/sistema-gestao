<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{  
    
  public function  __construct(Produto $produto ) {
    $this->produto = $produto;
  }   
     
    public function index (Request $request)
    {
      $pesquisar = $request->pesquisar;
      //dd($pesquisar);
      $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
      //dd($findProduto);
      return view ('pages.produtos.paginacao', compact('findProduto'));
    }

  public function delete (Request $request){
      $id = $request->id;
      $buscaRegistro = Produto::find($id);
      $buscaRegistro->delete();
      

      return response()->json(['success' => true]);
    }

    Public function cadastrarProduto (Request $request ){
       if ($request->method() == "POST" ){
    }
    return view ('pages.produtos.create');  
  }
}