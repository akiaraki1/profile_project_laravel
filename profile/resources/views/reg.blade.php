<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="{{ asset('css/reg.css') }}" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
    <div class="container">
        <h1>Регистрация</h1>
        <form action="{{ route('reg.process') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" value="{{ old('login') }}" name="login" placeholder="Введите ваш логин. Минимум 8 символов">
                @error('login')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Введите ваш адрес почты. Минимум 6 символов">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Введите ваш пароль. Минимум 8 символов">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Введите ваш пароль снова">
                @error('repeatPassword')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-primary" name="submit">Зарегистрироваться</button>
            </div>
        </form>
    </div>
</body>
</html>