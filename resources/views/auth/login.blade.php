@extends('layouts.app')

@section("title", "Login")

@section('content')
<div class="container my-4">
    <div class="container-fluid">
        <div style="display: flex;" class="justify-content-center" class="col-sm-8">
            <div class="card col-md-4 col-md-4">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{-- __('E-Mail Address') --}}Email</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="current-password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-3 my-3">
                                <div class="mr-0 ">
                                    <button class="btn btn-success text-light px-5 py-2 mr-0" type="submit">
                                         {{ __('Login') }} 
                                    </button>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

