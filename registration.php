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
    session_start();
// Проверка, была ли отправлена форма
if (isset($_POST['submit'])) {
    // Получение значений из формы
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $numberVU = $_POST['number_VU'];
    $experience = $_POST['experience'];
    $passport = $_POST['passport'];
    $numberCard = $_POST['number_card'];
    $cardValidity = $_POST['card_validity_period'];
    $username = $_POST['login'];
    $password = $_POST['password'];
   $_SESSION['login'] = $username;
    
// Подготовка SQL-запросов для добавления нового пользователя в таблицы users и client
//$sql1 = "INSERT INTO users (username, password) VALUES ('$login', '$password')"; 


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
    $sql2 = ("INSERT INTO `client`(`ID_client`, `name`, `surname`, `patronymic`, `phone`, `e-mail`, `number_VU`, `experience`, `passport`, `number_card`, `card_validity_period`, `login`, `password`)
    VALUES (null,'$name', '$surname', '$patronymic', '$phone', '$email', '$numberVU', '$experience','$passport', '$numberCard', '$cardValidity', '$username', '$password')");
   
   // Выполнение запросов
   if (mysqli_query($conn, $sql2)) {
    echo "Регистрация прошла успешно!";
    echo '<a href="pdf.php" class="return-btn">Договор</a>';
} else {
       echo "Ошибка регистрации: " . mysqli_error($conn);
   } 
 // Закрытие соединения с базой данных
 mysqli_close($conn);
}

?>
</body>
</html>


