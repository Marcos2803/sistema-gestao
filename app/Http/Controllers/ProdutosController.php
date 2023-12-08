<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormRequestProduto;
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

    Public function cadastrarProduto (FormRequestProduto  $request ){
      //dd($request);
       if ($request->method() == "POST" ){
        $data = $request->all();
        Produto::create($data);
    
        return redirect()->route('produto.index');
  }
  
        return view ('pages.produtos.create');  
  }
}
//FormRequestProduto 