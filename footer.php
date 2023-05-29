<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<head>
    <title>Название сайта</title>
    <style>
        /*cтили для footer*/
        footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        p {
            margin: 0;
            color: #888;
        }
        </style>
</head>
<body>
    <footer>
        <div class="container">
         <p>&copy; <?php echo date('Y'); ?> Car Sharing. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>



