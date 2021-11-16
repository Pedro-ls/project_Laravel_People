@extends("layouts.app")

@section("Atualização  de {{ explode(" ", $person->fullname)[0] }}")

@section("content")

<div class="container">
    <form class="d-flex" method="POST" action="{{ route('route.person.alter.me') }}">
        @csrf



        @method("PUT")


        <div class="col">
            <div class="card my-3">

                <div class="card-body bg-dark-normal col">
                    <div class="card-header">
                        <h4 class="card-title">Atualizar pessoa</h4>
                    </div>


                    @if (session("success"))
                    <div class="alert-success py-3 time">
                        {{ session("success") }}
                    </div>
                    @endif
                    @error('default')
                    <div class="alert-danger py-3 time">
                        {{ session("success") }}
                    </div>
                    @enderror

                    <div>
                        <div class="mb-3">

                            <label for="fullname_id" class="form-label">Nome completo</label>
                            <input type="text" name="fullname" id="fullname_id" class="form-control"
                                placeholder="insira seu nome" aria-describedby="fullname"
                                value="{{ $person->fullname }}">
                            @error('fullname')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">

                            <label for="email_id" class="form-label">Email</label>
                            <input class="form form-control" type="email" placeholder="Insira seu email" name="email"
                                id="email_id" value="{{ $person->email }}">
                            @error("email")
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="password_id" class="form-label">{{ __('Password') }}</label>
                            <input class="form form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="Insira sua senha" name="password">
                            @error('password')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">

                            <label for="confirm_id" class="form-label">Confirme sua senha</label>
                            <input class="form form-control" type="password"
                                placeholder="Insira  a confirmação da sua senha" name="password_confirmation"
                                id="confirm_id">
                            @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>



                        <div class="mb-3">

                            <label for="city_id" class="form-label">Sua Cidade</label>
                            <input type="text" name="city" id="city_id" class="form-control"
                                placeholder="insira sua cidade" aria-describedby="city" value="{{ $person->city }}">
                            @error('city')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="state_id" class="form-label">Seu estado</label>
                            <input type="text" name="state" id="state_id" class="form-control"
                                placeholder="insira seu estado" aria-describedby="state" value="{{ $person->state }}">
                            @error('state')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="district_id" class="form-label">Seu bairro</label>
                            <input type="text" name="district" id="district_id" class="form-control"
                                placeholder="insira seu bairro" aria-describedby="district"
                                value="{{ $person->district }}">
                            @error('district')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="number_id" class="form-label">Seu numero</label>
                            <input type="text" name="number" id="number_id" class="form-control"
                                placeholder="insira seu numero" aria-describedby="number" value="{{ $person->number }}">
                            @error('number')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="locate_id" class="form-label">Seu endereço</label>
                            <input type="text" name="locate" id="locate_id" class="form-control"
                                placeholder="insira seu endereço" aria-describedby="locate"
                                value="{{ $person->locate }}">
                            @error('locate')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="#job_id" class="form-label">Nome de onde você trabalha</label>
                            <input type="text" name="job" id="job_id" class="form-control"
                                placeholder="insira seu local de trabalho" aria-describedby="job"
                                value="{{ $person->job }}">
                            @error('job')
                            <span class="text-danger" role="alert">
                                <div class="row">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </span>
                            @enderror
                        </div>

                        <input class="btn btn-success text-light" type="submit" value="Atualizar">


                    </div>
                </div>
            </div>

        </div>

    </form>
</div>


<script>
    setTimeout(() => {
        try {
            var events = window.document.getElementsByClassName("time");



            events[0].setAttribute("class", "d-none");
            events[1].setAttribute("class", "d-none");

        } catch {
            // faz nada
        }
    }, 4000);
</script>
@endsection