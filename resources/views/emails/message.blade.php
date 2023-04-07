<x-mail::message>
<h1>Новое сообщение</h1><br>
Тема: {{ $data->theme}}<br>
Текст:{{ $data->text}}<br>
<a href="{{ $data->file_url}}" download>Скачать файл</a> 
</x-mail::message>
