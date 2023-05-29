<?php
session_start();
// Получение значений из формы
$username = $_POST['username'];
$password = $_POST['password'];

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
</head>
<body>
<?php
// Подготовка SQL-запроса для поиска пользователя в таблице client
$sql1 = "SELECT * FROM client WHERE login = '$username'";

// Выполнение запроса к таблице client
$result1 = mysqli_query($conn, $sql1);

// Проверка результата запроса к таблице client
if (mysqli_num_rows($result1) == 1) {
    $row = mysqli_fetch_assoc($result1);
    if ($row['password'] == $password) {
        $_SESSION['login'] = $username;
//echo $_SESSION['login']
       // $rideStartTime = $_SESSION["ride_start_time"];
        echo '<script>window.location.href = "dashboardUser.php";</script>';
             exit();
    } else {
        echo "Неверное имя пользователя или пароль. Попробуйте еще раз.";
    }
} else {
    // Пользователь не найден в таблице client, проверяем таблицу users
    // Подготовка SQL-запроса для поиска пользователя в таблице users
    $sql2 = "SELECT * FROM users WHERE login = '$username'";

    // Выполнение запроса к таблице users
    $result2 = mysqli_query($conn, $sql2);

    // Проверка результата запроса к таблице users
    if (mysqli_num_rows($result2) == 1) {
        $row = mysqli_fetch_assoc($result2);
        if ($row['password'] == $password) {
            echo '<script>window.location.href = "dashboardUserAdmin.php";</script>';
 // Страница для администратора
            exit();
        } else {
            echo "Неверное имя пользователя или пароль. Попробуйте еще раз.";
        }
    } else {
        echo "Неверные данные пользователя!";
    }
}


// Закрытие соединения с базой данных
mysqli_close($conn);
?>
</body>
</html>
