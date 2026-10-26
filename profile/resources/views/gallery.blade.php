<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фото галерея</title>
    <style>
        * {
            box-sizing: border-box;
        }

        img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
        }

        div {
            width: 800px;
            display: grid;
            grid-template-columns: repeat(4, 150px);
            justify-content: space-evenly;
            gap: 20px;
            margin: auto;
            background: linear-gradient(135deg, #1e5799 0%, #2989d8 100%);
            padding: 15px;
            align-items: center;
            border-radius: 20px;
            justify-items: center;
        }

        form {
            width: auto;
            margin: 10px;
            border: solid 1px black;
            display: inline-block;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="{{ route('gallery.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="picture">
        <button type="submit">Отправить</button>
    </form>
    <h1>Фото галерея</h1>
    <div>
        @foreach ($files as $file)
            <img src="{{ Storage::url($file) }}" alt="{{ basename($file) }}">
        @endforeach
    </div>
</body>

</html>