<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FCE4EC;
            margin: 0;
            padding: 0;
        }
        .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
    }
    
    h1 {
        color: #FF69B4;
        font-size: 24px;
        margin-bottom: 20px;
    }
    
    .contact-info {
        margin-bottom: 20px;
    }
    
    .contact-info p {
        margin: 10px 0;
        color: #FF69B4;
    }
    
    .contact-form {
        margin-bottom: 20px;
    }
    
    .contact-form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #FF69B4;
    }
    
    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #FF69B4;
        border-radius: 5px;
        box-sizing: border-box;
    }
    
    .contact-form textarea {
        height: 150px;
    }
    
    .contact-form button[type="submit"] {
        background-color: #FF69B4;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .footer {
        background-color: #FCE4EC;
        padding: 20px;
        text-align: center;
        color: #FF69B4;
    }
</style>
</head>
<body>
<?php require "header.php"?>
    <div class="container">
        <h1>Контакты</h1>
        <div class="contact-info">
        <p>Адрес: 09316, Регион 77, Москва, Волгоградский проспект, дом 42, корпус 9</p>
        <p>Телефон: +7 (800) 111-2222</p>
        <p>Email: info@carsharing.com</p>
    </div>

    <div class="contact-form">
        <h2>Напишите нам</h2>
        <form method="post" action="process_contact.php">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Сообщение:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Отправить</button>
        </form>
    </div>
</div>

<div class="footer">
    <p>&copy; 2023 Car Sharing. Все права защищены.</p>
</div>
</body>
</html>












