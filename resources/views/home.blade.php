@extends('layout.layout')

@section('title', 'Главная')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form action="{{ route('message.store') }}"  method="POST" enctype="multipart/form-data">
                    @include('components.alerts.error')
                    @csrf
                    @include('components.UI.input', ['field' => 'theme', 'text' => 'Тема обращения', 'type' => 'text', 'placeholder' => 'Не могу восставность аккаунт'])
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="input-group">
                        <input name="file" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2 w-100">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
