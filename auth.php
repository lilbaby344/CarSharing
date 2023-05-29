<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<html>
<head>
    <title>Окно авторизации</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group input[type="submit"] {
            background-color: #FF69B4;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php require "header.php"?>
    <div class="container">
        <h2>Авторизация</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Войти">
            </div>      

        </form>
        
    </div>
    <div class="container">
        <h2>Нет учетной записи</h2>
        <form action="FormReg.php" method="POST">
    <div class="form-group">
                <input type="submit" value="Зарегистрируйся">
            </div>
    </div>
</body>
</html>
 