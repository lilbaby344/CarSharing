<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>О нас</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FCE4EC;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .header h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #FF69B4;
        }
        
        .header p {
            font-size: 14px;
            color: #888;
        }
        
        .content {
            margin-bottom: 20px;
        }
        
        .content h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #FF69B4;
        }
        
        .content p {
            margin-bottom: 10px;
        }
        
    
    </style>
</head>
<body>
<?php require "header.php"?>
    <div class="container">
        <div class="header">
            <h1>О нас</h1>
            <p>Узнайте больше о нашей компании и сервисе</p>
        </div>

        <div class="content">
            <h2>Car Sharing</h2>
            <p>Каршеринговая компания "Car Sharing" - ваш надежный партнер в мире автомобильной аренды и деловой мобильности.</p>
                       <h2>Преимущества работы с нами</h2>
            <p>Широкий выбор автомобилей: у нас вы найдете разнообразные модели, от компактных городских автомобилей до комфортабельных седанов и внедорожников.</p>
            <p>Гибкие тарифы: мы предлагаем различные планы аренды, чтобы соответствовать вашим потребностям. </p>
            <p>Простая и удобная система бронирования: через нашу онлайн-платформу вы можете легко забронировать автомобиль.</p>
        </div>

        <?php include 'footer.php'; ?>  
    </div>
</body>
</html>








