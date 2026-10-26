<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="{{ asset('css/guestbook.css') }}">
</head>
<body>
<main>
    <h1>Гостевая книга</h1>
    <div>
        @foreach ($messages as $msg)
            <p>
                Пользователь:
                <strong>{{ $msg['name'] }}</strong>

                <a class="btn btn-edit"
                    href="{{ route('guestbook.edit', $msg['id']) }}">Изменить</a>
                <a class="btn btn-delete"
                    href="{{ route('guestbook.delete', $msg['id']) }}"
                    onclick="return confirm('Удалить эту запись?')">Удалить</a>
                <br>
                Сообщение: {{ $msg['message'] }}
                <br>
                Время: {{ $msg['time'] }}
            </p>
        @endforeach
    </div>

    <form action="{{ route('guestbook.add') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Введите ваше имя" required>
        <textarea name="message" class="small" placeholder="Добавьте запись" required></textarea>
        <button type="submit">Отправить</button>
    </form>
</main>
</body>
</html>