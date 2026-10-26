<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Изменение записи гостевой книги</title>
    <link rel="stylesheet" href="{{ asset('css/guestbook.css') }}">
</head>
<body>
<main>
    <h1>Изменение записи гостевой книги</h1>
    <form action="{{ route('guestbook.update', $message['id']) }}" method="post">
        @csrf
        <input type="text" name="nameEdit" placeholder="Введите ваше имя" value="{{ $message['name'] }}" required>
        <textarea name="messageEdit" class="small" placeholder="Добавьте запись" required>{{ $message['message'] }}</textarea>
        <button type="submit">Изменить</button>
    </form>
</main>
</body>
</html>