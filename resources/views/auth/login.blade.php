@extends('layouts.layout')
@section('title')
Login
@endsection
@section('content')
<div class="row h-100">
    <div class="container my-auto d-flex justify-content-center">
        <div class="col-md-7">
            <div class="d-flex flex-column bg-light rounded shadow">
                <div class="row justify-content-center"><h1 class="mx-2 my-4">Login</h1></div>

                <div class="d-flex flex-column border-bottom py-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a senha?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-8 offset-md-4 mt-2">
                                <p>Não é cadastrado ainda? <a href="/register">Registre-se</a></p>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="row py-4 mx-auto">
                <p>Não cadastrado? Cheque nossos relatórios <a href="/relatorios">aqui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
