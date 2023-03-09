@extends('layouts.main')

@section('title', 'Dashboard')
    @section('content')
        <div id="event-create-container" class="col-md-6 offset-md-3">
            <form id="register-form" method="POST" action="{{ route('register') }}">
            @csrf
                <div class="form-group">
                    <label for="name">{{ __('Nome') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Senha') }}</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <button type="button" class="mt-4 btn btn-primary" onclick="registerUser()">{{ __('Cadastrar') }}</button>
                </div>
            </form>
        </div>

@endsection
