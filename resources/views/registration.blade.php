@extends('layout.layout')

@section('title', 'Регистрация')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form action="{{ route('auth.registration') }}" method="POST">
                    @include('components.alerts.error')

                    @csrf
                    @include('components.UI.input', ['field' => 'email', 'text' => 'Электронная почта', 'type' => 'email', 'placeholder' => 'name@example.com', 'old' => old('email')])
                    @include('components.UI.input', ['field' => 'name', 'text' => 'Имя', 'type' => 'text', 'placeholder' => 'Имя', 'old' => old('name')])
                    @include('components.UI.input', ['field' => 'password', 'text' => 'Пароль', 'type' => 'password', 'placeholder' => '********'])
                    @include('components.UI.input', ['field' => 'password_confirmation', 'text' => 'Повторите пароль', 'type' => 'password', 'placeholder' => '********'])
                    <button type="submit" class="btn btn-primary mt-2 w-100">Зарегистрироваться</button>
                </form>
                <a class="mt-2" href="{{ route('login') }}">Есть аккаунта?</a>
            </div>
        </div>

    </div>
@endsection
