<?php
// Начало сессии
session_start();

// Подключение к базе данных
$servername = 'localhost';
$username = 'layra2fv_car';
$password = 'Kursach123';
$dbname = 'layra2fv_car';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$minutes = $_SESSION['minutes'];
$ID_model = $_SESSION['ID_model'];
$login = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Каршеринг</title>
</head>
<body>
<?php
// Получение цены (поминутной) для выбранного автомобиля
$sql1 = "SELECT price FROM model_car WHERE ID_model = $ID_model";
$result = $conn->query($sql1);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $price = $row["price"];

    // Вычисление общей стоимости аренды
    $final_cost = $minutes * $price;

    $sql = "SELECT MAX(ID_ride) AS ID_ride FROM rent";
    $result = $conn->query($sql);
    $ID_ride = $result->fetch_assoc();
    // Обновление записи аренды с общей стоимостью
    $sql2 = "UPDATE rent SET final_cost = $final_cost WHERE ID_ride = '$ID_ride'";
    if ($conn->query($sql2) === TRUE) {
        // Сохранение данных в переменные сессии
        $_SESSION["final_cost"] = $final_cost;
        $_SESSION["minutes"] = $minutes;
        $_SESSION["login"] = $login;
        
        echo "Данные успешно обновлены.";
        echo '<script>window.location.href = "fis_ch.php";</script>';
        exit();
    } else {
        // Обработка ошибки при обновлении записи
        echo "Ошибка при обновлении данных: " . $conn->error;
    }
} else {
    // Обработка ошибки получения цены
    echo "Ошибка при получении цены: " . $conn->error;
}


// Закрытие соединения с базой данных
$conn->close();
?>
</body>
</html>
