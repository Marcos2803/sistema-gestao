@extends('index')
@section ('content')

<form class="form" method="POST" action="{{ route ('cadastrar.venda')}}">
@csrf
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criar Nova Vendas</h1>
     </div>
<div class="mb-3">
    <label  class="form-label">Numeração</label>
    <input type="text" value="{{ $findNumeracao }}" class="form-control @error('numero_da_venda')is-invalid @enderror" name="nome">
 @if ($errors->has ('numero_da_venda'))
  <div class="invalid-feedback">{{ $errors->First('numero_da_venda') }}</div>
 @endif
</div>
<select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
<button type="submit" class="btn btn-success">Cadastrar</button>
</form>

 @endsection