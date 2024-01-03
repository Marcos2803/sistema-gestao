<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormRequestCliente;
use App\Models\Componentes;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function  __construct(Cliente $cliente ) {
        $this->cliente = $cliente;
      }   
         
        public function index (Request $request)
        {
          $pesquisar = $request->pesquisar;
          //dd($pesquisar);
          $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
          
          return view ('pages.clientes.paginacao', compact('findCliente'));
        }
    
      public function delete (Request $request){
          $id = $request->id;
          $buscaRegistro = Cliente::find($id);
          $buscaRegistro->delete();
          
           return response()->json(['success' => true]);
        }
        // cadastrar produto
        Public function cadastrarCliente (FormRequestCliente  $request ){
          
           if ($request->method() == "POST" ){
           $data = $request->all();
           //dd($data);
          
            Cliente::create($data);
            Toastr::success('Gravado com sucesso'); 
            return redirect()->route('cliente.index');
      }
      
            return view ('pages.clientes.create');  
      }
        //atualizar produto
    
        Public function atualizarCliente  (Request  $request, $id ){
          
          
         if ($request->method() == "PUT" ){
          //atualiazar dados
            $data = $request->all();
            //dd($data);
            $componentes = new Componentes();
            $buscaRegistro =Cliente::find($id);
            $buscaRegistro->update($data);
    
           return redirect()->route('cliente.index');
     }
          // mostra dados
          $findCliente = Cliente::where('id', '=', $id)->First();
     
           return view ('pages.clientes.atualizar', compact('findCliente'));  
     }
}
