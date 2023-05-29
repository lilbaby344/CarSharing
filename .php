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
    <?php require "header.php"?>
    <?php
    
 require_once("SQL.php");
 session_start();

$db = new SQL();
$db->Connect(
    'localhost',
    'layra2fv_car',
    'Kursach123',
    'layra2fv_car'
);
?>


    <div style="position:relative;overflow:hidden;">
    <a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a>
    <a href="https://yandex.ru/maps/213/moscow/?ll=37.398482%2C55.742610&utm_medium=mapframe&utm_source=maps&z=13" style="color:#eee;font-size:12px;position:absolute;top:14px;">Москва — Яндекс Карты</a>
    <iframe src="https://yandex.ru/map-widget/v1/?ll=37.398482%2C55.742610&z=13" width="1560" height="600" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
    </div>
     
    <?php include 'footer.php'; ?>     
    </body>
    </html>
