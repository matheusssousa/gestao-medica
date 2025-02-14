@extends('layouts.guess')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="text-center text-light mb-4">Medical</h1>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                <input id="nome" type="text"
                                    class="form-control @error('nome') is-invalid @enderror" name="nome"
                                    value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                @error('nome')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">{{ __('Senha') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" required autocomplete="password" autofocus>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password-confirm" class="form-label">{{ __('Confirmar Senha') }}</label>
                                <input id="password-confirm" type="password"
                                    class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm"
                                    value="{{ old('password-confirm') }}" required autocomplete="password-confirm" autofocus>
                                @error('password-confirm')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn w-100" style="background-color: #17B8A6; color: white;">
                                {{ __('Registrar-se') }}
                            </button>

                            <hr>

                            <div class="text-center">
                                <a href="{{ route('login') }}" class="btn btn-secondary w-100">
                                    {{ __('Login') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
