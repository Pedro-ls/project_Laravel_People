@extends('layouts.app')

@section("title")
 {{ explode(" ", $person->fullname)[0]  }}
@endsection


@section('content')
<div class="container">
  <div class="row-md">
    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">Nome Completo</h3>
          <p class="card-text">{{ $person->fullname }}</p>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">profissão</h3>
          <p class="card-text">{{ $person->job }}</p>
        </div>
      </div>
    </div>

    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">endereço</h3>
          <p class="card-text">{{ $person->locate }}</p>
        </div>
      </div>
    </div>

    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">Numero</h3>
          <p class="card-text">{{ $person->number }}</p>
        </div>
      </div>
    </div>

    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">Bairro</h3>
          <p class="card-text">{{ $person->district }}</p>
        </div>
      </div>
    </div>

    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">Cidade</h3>
          <p class="card-text">{{ $person->city }}</p>
        </div>
      </div>
    </div>

    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">estado</h3>
          <p class="card-text">{{ $person->state }}</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection