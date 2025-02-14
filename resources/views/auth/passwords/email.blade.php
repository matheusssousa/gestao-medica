@extends('layouts.guess')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="text-center text-light mb-4">Medical</h1>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

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

                            <button type="submit" class="btn w-100" style="background-color: #17B8A6; color: white;">
                                {{ __('Enviar link de redefinição de senha') }}
                            </button>
                            <hr>
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="btn btn-secondary w-100">
                                    {{ __('Voltar') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
