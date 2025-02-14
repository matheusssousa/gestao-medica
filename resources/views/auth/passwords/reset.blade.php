@extends('layouts.guess')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="text-center text-light mb-4">Medical</h1>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

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
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password-confirm" class="form-label">{{ __('Confirmar Senha') }}</label>
                                <input id="password-confirm" type="password"
                                    class="form-control @error('password-confirm') is-invalid @enderror"
                                    name="password-confirm" value="{{ old('password-confirm') }}" required
                                    autocomplete="password-confirm" autofocus>
                                @error('password-confirm')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn w-100" style="background-color: #17B8A6; color: white;">
                                {{ __('Redefinir senha') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
