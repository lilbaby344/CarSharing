<?php
session_start();
// Подключение к базе данных
$host = 'localhost';
$dbUsername = 'layra2fv_car';
$dbPassword = 'Kursach123';
$dbName = 'layra2fv_car';

$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

// Проверка подключения к базе данных
if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Розовый стиль для личного кабинета */
        body {
            background-color: #FCE4EC;
            color: #FFF;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #FF69B4;
            margin-bottom: 20px;
        }

        .user-info {
            background-color: #FFF;
            padding: 20px;
            border-radius: 10px;
        }

        .user-info label {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php require "header2.php"; ?>
    <div class="container">
        <div class="user-info">
            <?php
             // Получение информации о пользователе из таблицы client
            $login = $_SESSION['login'];
            $sql = "SELECT * FROM client WHERE login = '$login'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) >= 1) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $surname = $row['surname'];
                $patronymic = $row['patronymic'];
                $phone = $row['phone'];
                $number_VU = $row['number_VU'];
                $number_card = $row['number_card'];
                $card_validity_period = $row['card_validity_period'];

                // Вывод информации о пользователе
                echo "<h2>Личный кабинет</h2>";
                echo "<p>Имя: $name</p>";
                echo "<p>Фамилия: $surname</p>";
                echo "<p>Отчество: $patronymic</p>";
                echo "<p>Телефон: $phone</p>";
                echo "<p>Номер ВУ: $number_VU</p>";
                echo "<p>Номер карты: $number_card</p>";
                echo "<p>Срок действия карты: $card_validity_period</p>";
            } else {
                echo "Ошибка: Информация о пользователе не найдена.";
                echo $login;
            }

            // Закрытие соединения с базой данных
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>
</html>
