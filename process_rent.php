<?php
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
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background-color: #FCE4EC;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .text-muted {
            font-size: 14px;
            color: #888;
        }
        
        .return-btn, .bill-btn {
            background-color: #FF69B4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
require "header2.php";
// Получение данных из формы
$ID_model = $_POST['ID_model'];
$action = $_POST['action'];
$login = $_SESSION['login'];

if ($action == 'take') {
    // Обработка взятия автомобиля в аренду
    $rideStartTime = date('H:i:s');
    $date = date('Y-m-d');
    /*$sql = "INSERT INTO rent (ride_start_time) VALUES ('$rideStartTime')";
    if ($conn->query($sql) === true) {*/
        //Успешно добавлено в таблицу rent
        $sql3 = "INSERT INTO `rent` (`ID_ride`, `ID_car`, `ID_client`, `final_cost`, `final_time`, `payment`, `date`, `ride_start_time`, `ride_end_time`, `starting_place`, `end_place`, `price_per_minute`) VALUES (NULL, (SELECT ID_car FROM car WHERE ID_model = $ID_model ORDER BY ID_model ), (SELECT ID_client FROM client WHERE login = \"$login\"), 0, NULL, '0', '$date', '$rideStartTime', NULL, '55.747147,37.627894', '65.746147,37.007894', (SELECT price FROM model_car WHERE ID_model = $ID_model))";
        $sql5 = "SELECT MAX(ID_ride) FROM rent";
        if ($conn->query($sql3) === true) {
            $result5 = $conn->query($sql5);
            $ID_ride = $result5->fetch_assoc()['MAX(ID_ride)'];
            $_SESSION["ID_ride"] = $ID_ride;
            $_SESSION["login"] = $login;
            //echo '<script>window.location.href = "http://layra2fv.beget.tech/proc_end_rent.php";</script>';
        } else {
            echo "Ошибка при выполнении запроса: " . $conn->error;
        }
    
        $sql = "SELECT `stamp`, `colour`, `model`, `price`, `status` FROM `model_car` WHERE `ID_model` = $ID_model";
        $result = $conn->query($sql);
                // Вывод информации о выбранном автомобиле
        $row = $result->fetch_assoc();
        echo '
        <div class="card">
            <h2 class="card-title"><small class="text-muted">Марка:</small> '.$row["stamp"].'</h2>
            <h3 class="card-title"><small class="text-muted">Цвет:</small> '.$row["colour"].'</h3>
            <h4 class="card-title"><small class="text-muted">Модель:</small> '.$row["model"].'</h4>
            <h5 class="card-title"><small class="text-muted">Цена(поминутная):</small> '.$row["price"].'</h5>
            <h6 class="card-title"><small class="text-muted">Статус:</small> '.$row["status"].'</h6>
                    
            <form method="post" action="proc_end_rent.php">
                <input type="hidden" name="ID_model" value="'.$ID_model.'">
                <input type="hidden" name="action" value="return">
                <button class="return-btn" type="submit">Завершить аренду</button>
            </form>
        </div>
        ';

    } else {
        echo "Ошибка при выполнении запроса: " . $conn->error;
    }
// }


/*if (isset($_SESSION["action"][$ID_model])) {
    $carData = $_SESSION["action"][$ID_model];
    // Используйте $carData для получения информации об автомобиле
    $stamp = $carData['stamp'];
    $colour = $carData['colour'];
    $model = $carData['model'];
    $price = $carData['price'];
    $status = $carData['status'];

    // Вывод информации об автомобиле
    echo '<div class="card">';
    echo '<h2 class="card-title"><small class="text-muted">Марка:</small> ' . $stamp . '</h2>';
    echo '<h3 class="card-title"><small class="text-muted">Цвет:</small> ' . $colour . '</h3>';
    echo '<h4 class="card-title"><small class="text-muted">Модель:</small> ' . $model . '</h4>';
    echo '<h5 class="card-title"><small class="text-muted">Цена(поминутная):</small> ' . $price . '</h5>';
    echo '<h6 class="card-title"><small class="text-muted">Статус:</small> ' . $status . '</h6>';
    echo '<form method="post" action="proc_end_rent.php">';
    echo '<input type="hidden" name="ID_model" value="' . $ID_model . '">';
    echo '<input type="hidden" name="action" value="take">';
    echo '<button class="take-btn" type="submit">Взять</button>';
    echo '</form>';
    echo '</div>';
} else {
    // Если информация об автомобиле не найдена
    echo "Информация об автомобиле не доступна.";
}
*/
$conn->close();
include 'footer.php';
?>
</body>
</html>
