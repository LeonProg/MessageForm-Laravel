@extends('layout.layout')

@section('title', 'Админ панель')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h5>Сортировка по</h5>
                <select class="form-select sort" aria-label="Default select example">
                    <option value="ASC">Сначала старые</option>
                    <option value="DESC">Сначала новые</option>
                </select>
            </div>
            <div class="col-sm">
                <h5>Выбор пагинации</h5>
                <select class="form-select per-page" aria-label="Default select example">
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id Пользователя</th>
                <th scope="col">Время создания Клиента</th>
                <th scope="col">Время отправки сообщения;</th>
                <th scope="col">Имя Клиента</th>
                <th scope="col">E-mail Клиента;</th>
                <th scope="col">Тема сообщения;</th>
                <th scope="col">Текст сообщения;</th>
                <th scope="col">Ссылка на прикрепленный файл</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

            </ul>
        </nav>
    </div>

    <script src="js/admin.js"></script>
@endsection

