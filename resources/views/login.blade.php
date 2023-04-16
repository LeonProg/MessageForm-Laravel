@extends('layout.layout')

@section('title', 'Логин')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    @include('components.alerts.error')
                    @include('components.UI.input', ['field' => 'email', 'text' => 'Электронная почта', 'type' => 'email', 'placeholder' => 'name@example.com', 'old' => old('email')])
                    @include('components.UI.input', ['field' => 'password', 'text' => 'Пароль', 'type' => 'password', 'placeholder' => '********'])
                    <button type="submit" class="btn btn-primary mt-2 w-100">Войти</button>
                </form>
                <a class="mt-2" href="{{ route('registration') }}">Нет аккаунта?</a>
            </div>
        </div>
    </div>
@endsection
