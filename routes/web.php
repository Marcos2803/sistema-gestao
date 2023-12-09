<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

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
    Route::get('/', [ClientesController::class, 'index']) ->name('Clientes.index');
    /* Produto Create*/
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente']) ->name('cadastrar.Cliente');
    Route::post('/cadastrarcliente', [ClientesController::class, 'cadastrarCliente']) ->name('cadastrar.Cliente');
    /*Produto Update*/
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente']) ->name('atualizar.Cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente']) ->name('atualizar.Cliente');
    /*Deleta produto */
    Route::delete('/delete', [ClientesController::class, 'delete']) ->name('Cliente.delete');
 });


