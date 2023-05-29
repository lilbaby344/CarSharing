<?php       
        //Подключение к базе данных и получение данных выбранного автомобиля
        session_start();
        $servername = 'localhost';
        $username = 'layra2fv_car';
        $password = 'Kursach123';
        $dbname = 'layra2fv_car';
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Ошибка подключения к базе данных: " . $conn->connect_error);
        }
        $ID_ride = $_SESSION["ID_ride"];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Выбранный автомобиль</title>
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
<?php require "header2.php"?>
<div class="container">
    <?php  
         

        $sql = "SELECT ID_car, ride_start_time FROM rent WHERE ID_ride = $ID_ride";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        $ID_car = $result['ID_car'];
        $ride_start_time = $result['ride_start_time'];

        $sql = "UPDATE rent SET ride_end_time = CURRENT_TIME(), final_time = TIMEDIFF(CURRENT_TIME(), '$ride_start_time') WHERE ID_ride = $ID_ride";
        $result = $conn->query($sql);
        $sql = "SELECT final_time FROM rent ORDER BY ID_ride DESC LIMIT 1";
        $result = $conn->query($sql);
        
       // Проверка и обработка результата запроса
if ($result && $result->num_rows > 0) {
    // Извлечение данных из результата запроса
    $row = $result->fetch_assoc();
    $finalTime = $row["final_time"];

    // Преобразование времени в минуты
    $timeComponents = explode(':', $finalTime);
    $minutes = $timeComponents[1];

    // Используйте переменную $minutes по вашему усмотрению
    echo "Минуты: " . $minutes;
    $_SESSION["minutes"] = $minutes;

    // Другие действия и вывод на экран
    if ($result) {
        echo 'Аренда успешно завершена <a href="schet.php" class="bill-btn">Счет</a>';
    }
} else {
    // Обработка случая, когда результат запроса пустой или возникла ошибка
    echo "Запрос не вернул результатов или произошла ошибка: " . $conn->error;
}
        $sql = "SELECT ID_model FROM car WHERE ID_car = $ID_car";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        $ID_model = $result["ID_model"];
        $_SESSION["ID_model"] = $ID_model;
               
        $sql = "SELECT `stamp`, `colour`, `model`, `price`, `status` FROM `model_car` WHERE `ID_model` = $ID_model";
        $result = $conn->query($sql);
                // Вывод информации о выбранном автомобиле
        $row = $result->fetch_assoc();

        // echo '
        // <div class="card">
        //     <h2 class="card-title"><small class="text-muted">Марка:</small> '.$row["stamp"].'</h2>
        //     <h3 class="card-title"><small class="text-muted">Цвет:</small> '.$row["colour"].'</h3>
        //     <h4 class="card-title"><small class="text-muted">Модель:</small> '.$row["model"].'</h4>
        //     <h5 class="card-title"><small class="text-muted">Цена(поминутная):</small> '.$row["price"].'</h5>
        //     <h6 class="card-title"><small class="text-muted">Статус:</small> '.$row["status"].'</h6>
                    
        //     <form method="post" action="schet.php">
        //         <input type="hidden" name="ID_model" value="'.$ID_model.'">
        //         <input type="hidden" name="action" value="return">
        //         <button class="return-btn" type="submit">Завершить аренду</button>
        //     </form>

        //     <a href="pdf2.php" class="bill-btn">Счет</a>
        // </div>
        // ';

    $conn->close();
?>
</div>
<?php include 'footer.php'; ?>  
</body>
</html>
