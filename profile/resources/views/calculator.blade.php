<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        form {
            background: linear-gradient(135deg, #1e5799 0%, #2989d8 100%);
            height: 100px;
            width: 700px;
            margin: 400px auto 0px;
            border-radius: 30px;
        }

        button, select {
            width: 30px;
            height: 30px;
            cursor: pointer;
            margin: 40px 0px 0px;
            border-radius: 5px;
        }

        select{
            width: 40px;
            text-align: center;
        }

        form input {
            margin: 30px 10px 0px;
            border-radius: 5px;
            border: none;
            height: 30px;
        }

        input#result {
            width: 210px;
        }
    </style>
</head>

<body>
    <form action="" method="get">
        <input type="number" name="num1" required placeholder="Введите первое число" value="{{ request('num1') }}">
        <select name="operation" required>
             <option value="+"  {{ request('operation') === '+'  ? 'selected' : '' }}>+</option>
             <option value="-"  {{ request('operation') === '-'  ? 'selected' : '' }}>-</option>
             <option value="*"  {{ request('operation') === '*'  ? 'selected' : '' }}>*</option>
             <option value="/"  {{ request('operation') === '/'  ? 'selected' : '' }}>/</option>
             <option value="%"  {{ request('operation') === '%'  ? 'selected' : '' }}>%</option>
             <option value="**" {{ request('operation') === '**' ? 'selected' : '' }}>**</option>
        </select>
        <input type="number" name="num2" required placeholder="Введите второе число" value="{{ request('num2') }}">
        <button type="submit">=</button>
        <input type="text" readonly placeholder="Результат" value="{{ $result ?? '' }}">
    </form>
</body>

</html>