<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function  __construct(Venda $venda ) {
        $this->venda = $venda;
        
      }   
         
        public function index (Request $request)
        
        {
          $pesquisar = $request->pesquisar;
          $findVenda = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
    
          //dd($pesquisar);
          return view ('pages.vendas.paginacao', compact('findVenda'));
        }
    
      public function delete (Request $request){
        
          $id = $request->id;
          $buscaRegistro = Venda::find($id);
          $buscaRegistro->delete();
          
           return response()->json(['success' => true]);
        }
        // cadastrar produto
        Public function cadastrarVenda (FormRequestVenda  $request ){
          
           if ($request->method() == "POST" ){
           $data = $request->all();
            Venda::create($data);
            Toastr::success('Gravado com sucesso'); 
            return redirect()->route('venda.index');
      }
            $findNumeracao = Venda::max('numero_da_venda') + 1;
            
            return view ('pages.vendas.create');  
      }
}