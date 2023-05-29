<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function() {
            // Маска для номера телефона
            $('#phone').inputmask({ mask: '9-(999)-999-99-99' });
                    // Маска для паспортных данных
        $('#passport').inputmask({ mask: '99-99-999-999' });
        
        // Маска для номера ВУ
        $('#number_VU').inputmask({ mask: '99-99-999999' });
        
        // Маска для срока действия карты
        $('#card_validity_period').inputmask({ mask: '99/99/9999' });
    });
</script>
<title>Регистрация нового пользователя</title>
</head>
<body>
<?php require "header.php"?>
<div class="container mt-4">
    <h2>Регистрация нового пользователя</h2>
    <form action="registration.php" method="post">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Фамилия:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="patronymic">Отчество:</label>
            <input type="text" class="form-control" id="patronymic" name="patronymic">
        </div>
        <div class="form-group">
            <label for="phone">Телефон:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="number_VU">Номер ВУ:</label>
            <input type="text" class="form-control id="number_VU" name="number_VU" required>
        </div>
        <div class="form-group">
            <label for="experience">Стаж вождения:</label>
            <input type="text" class="form-control" id="experience" name="experience" required>
        </div>
        <div class="form-group">
            <label for="passport">Паспортные данные:</label>
            <input type="text" class="form-control" id="passport" name="passport" required>
        </div>
        <div class="form-group">
            <label for="number_card">Номер карты:</label>
            <input type="text" class="form-control" id="number_card" name="number_card" required>
        </div>
        <div class="form-group">
            <label for="card_validity_period">Срок действия карты:</label>
            <input type="text" class="form-control" id="card_validity_period" name="card_validity_period" required>
        </div>
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="text" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" class=" btn-register" name="submit" value="Зарегистрироваться">
        </div>
    </form>
</div>
</body>
</html>
        

