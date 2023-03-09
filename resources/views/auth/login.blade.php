@extends('layouts.main')

@section('title', 'Dashboard')
    @section('content')
        <div id="event-create-container" class="col-md-6 offset-md-3">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
            <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input  id="email" class="mb-4 form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Senha') }}</label>
                    <input  id="password" class="mb-4 form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group form-check d-flex align-items-center">
                    <input type="checkbox" style="scale: 1.5;" class="form-check-input" name="remember" id="remember">
                    <label   class="form-check-label" for="remember">{{ __('Lembrar Senha') }}</label>
                </div>
                <button type="button" class="mt-4 btn btn-primary" onclick="login()">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
@endsection
