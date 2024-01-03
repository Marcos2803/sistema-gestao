@extends('index')
@section ('content')

<form class="form" method="POST" action="{{ route ('cadastrar.venda')}}">
@csrf
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Vendas</h1>
     </div>
<div class="mb-3">
    <label  class="form-label">Nome</label>
    <input type="text" value="{{old('nome')}}" class="form-control @error('nome')is-invalid @enderror" name="nome">
 @if ($errors->has ('nome'))
  <div class="invalid-feedback">{{ $errors->First('nome') }}</div>
 @endif
</div>
  <div class="mb-3">
    <label  class="form-label ">Bairro</label>
    <input id='bairro' value="{{old('bairro')}}"  class="form-control @error('bairro')is-invalid @enderror"  name="bairro">
 @if ($errors->has ('bairro'))
  <div class="invalid-feedback">{{ $errors->First('bairro') }}</div>
 @endif
  </div>
  <button type="submit" class="btn btn-success">cadastrar</button>
</form>

 @endsection