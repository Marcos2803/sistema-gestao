<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
  /* Produtos*/
Route::prefix('produtos')->group(function () {
   Route::get('/', [ProdutosController::class, 'index']) ->name('produto.index');
   /* Produto Create*/
   Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto']) ->name('cadastrar.produto');
   Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto']) ->name('cadastrar.produto');
   /*Produto Update*/
   Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto']) ->name('atualizar.produto');
   Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto']) ->name('atualizar.produto');
   /*Deleta produto */
   Route::delete('/delete', [ProdutosController::class, 'delete']) ->name('produto.delete');
});
/* Clientes*/
Route::prefix('clientes')->group(function () {
   Route::get('/', [ClientesController::class, 'index']) ->name('cliente.index');
   /* clientes Create*/
   Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente']) ->name('cadastrar.cliente');
   Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente']) ->name('cadastrar.cliente');
   /*clientes Update*/
   Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente']) ->name('atualizar.cliente');
   Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente']) ->name('atualizar.cliente');
   /*Deleta clientes */
   Route::delete('/delete', [ClientesController::class, 'delete']) ->name('cliente.delete');
});

/* Vendass*/
Route::prefix('vendas')->group(function () {
   Route::get('/', [VendasController::class, 'index']) ->name('venda.index');
   /* vendas Create*/
   Route::get('/cadastrarVenda', [VendasController::class, 'cadastrarVenda']) ->name('cadastrar.venda');
   Route::post('/cadastrarVenda', [VendasController::class, 'cadastrarVenda']) ->name('cadastrar.venda');

});