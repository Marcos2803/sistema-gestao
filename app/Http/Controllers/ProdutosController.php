<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{  
    
  public function  __construct(Produto $produto ) {
    $this->produto = $produto;
  }   
     
    public function index (Request $request)
    {
      $pesquisar = $request->pesquisar;
      //dd($request);
      $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');

      //dd($pesquisar);
      return view ('pages.produtos.paginacao', compact('findProduto'));
    }

  public function delete (Request $request){
    
      $id = $request->id;
      $buscaRegistro = Produto::find($id);
      $buscaRegistro->delete();
      
       return response()->json(['success' => true]);
    }
    // cadastrar produto
    Public function cadastrarProduto (FormRequestProduto  $request ){
      
       if ($request->method() == "POST" ){
       $data = $request->all();
        $componentes = new Componentes();
        $data['valor'] =  $componentes->formatacaoMascaraDinheiroDecimal( $data['valor']);
      
        Produto::create($data);
        Toastr::success('Gravado com sucesso'); 
        return redirect()->route('produto.index');
  }
  
        return view ('pages.produtos.create');  
  }
    //atualizar produto

    Public function atualizarProduto (FormRequestProduto  $request, $id ){
      
      
     if ($request->method() == "PUT" ){
      //atualiazar dados
        $data = $request->all();
        //dd($data);
        $componentes = new Componentes();
        $data['valor'] =  $componentes->formatacaoMascaraDinheiroDecimal( $data['valor']);
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->update($data);

       return redirect()->route('produto.index');
 }
      // mostra dados
      $findProduto = Produto::where('id', '=', $id)->First();
 
       return view ('pages.produtos.atualizar', compact('findProduto'));  
 }
}