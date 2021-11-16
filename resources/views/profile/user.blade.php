@extends('layouts.app')

@section({{ explode(" ", Auth::user()->fullname)[0] }})

@section("buttons")
    
@endsection

@section('content')
<div class="container">
  <div class="row-md">
    <div style="font-size: 30px;" class="text-light my-4">
      Perfil
    </div>

    <small class="text-muted text-gray-normal">
      No final da pagina há opções de deletar e alterar
    </small>
    
    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">Nome Completo</h3>
          <p class="card-text">{{ Auth::user()->fullname }}</p>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">profissão</h3>
          <p class="card-text">{{ Auth::user()->job }}</p>
        </div>
      </div>
    </div>   

    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">endereço</h3>
          <p class="card-text">{{ Auth::user()->locate }}</p>
        </div>
      </div>
    </div>
    
    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">Numero</h3>
          <p class="card-text">{{ Auth::user()->number }}</p>
        </div>
      </div>
    </div>     
    
    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">Bairro</h3>
          <p class="card-text">{{ Auth::user()->district }}</p>
        </div>
      </div>
    </div>
    
    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">Cidade</h3>
          <p class="card-text">{{ Auth::user()->city }}</p>
        </div>
      </div>
    </div>
    
    <div class="col-md">
      <div class="card border-normal">
        <div class="card-body">
          <h3 class="card-title">estado</h3>
          <p class="card-text">{{ Auth::user()->state }}</p>
        </div>
      </div>
      <div class="my-2 p-4 bg-dark">
        <div class="d-flex">
            <div class="mx-2">
                <form action="{{ route('route.person.delete.me') }}" method="POST">
                    @csrf
                    @method("DELETE")
        
                    <button class="btn btn-danger text-light" onclick="return window.confirm('deseja deletar o seu perfil?');">
                        Deletar
                    </button>
                </form>
            </div>
    
            <div class="mx-2">
              
                    <a href="{{ route('person.account.alter') }}" class="btn btn-orange text-light">
                        Alterar
                    </a>
               
            </div>
        </div>
      </div>

</div>
</div>
</div>
@endsection
