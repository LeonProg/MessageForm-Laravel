<x-mail::message>
<h1>Новое сообщение</h1><br>
Тема: {{ $theme}}<br>
Текст:{{ $text}}<br>
<a href="{{ $file_url}}" download>Скачать файл</a> 
</x-mail::message>
