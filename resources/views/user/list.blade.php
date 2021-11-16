@extends('layouts.app')
{{-- @if(!empty($users)) --}}

@section("Listagem de pessoas")

@section('content')
<div class="container my-3">
            <div class="row">
              @foreach ($people as $person)
              <div class="col-md-5 my-3">
              
                    <div class="card">
                      <div class="card-body">
                        <h3 class="card-title"></h3>

                        <img src="" class="img-fluid" alt="">

                        <p class="card-text">{{ $person->fullname }}</p>

                        <div class="row">
                            <div class="col-3">
                                <a href="{{ route('route.person.show', [
                                  "user" => $person->id
                                ]) }}" class="btn btn-orange text-light">
                                    Visualizar 
                                </a>
                            </div>
                        </div>
                      </div>
                    </div>
           
              </div>
              @endforeach
            </div>
</div>
@endsection
   
    
{{-- @else
    nenhum usuario
@endif --}}