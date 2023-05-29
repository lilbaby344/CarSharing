<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Интерфейс администратора</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #FCE4EC;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            margin-top: 0;
            text-align: center;
            color: #FF69B4;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #FF69B4;
        }
        
        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .form-group button {
            background-color: #FF69B4;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }
        
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #F5F5F5;
            border: 1px solid #DDD;
            font-size: 14px;
        }
        
        pre {
            margin: 0;
            padding: 0;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Интерфейс администратора</h1>
        
        <!-- Форма для выполнения SQL-запросов -->
        <form method="post" action="">
            <div class="form-group">
                <label for="sql-query">SQL-запрос:</label>
                <textarea id="sql-query" name="sql-query" rows="5"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="execute-query">Выполнить запрос</button>
            </div>
        </form>
        
        <?php
        // Обработка отправленного SQL-запроса
        if (isset($_POST['execute-query'])) {
            // Подключение к базе данных
            $servername = 'localhost';
            $username = 'layra2fv_car';
            $password = 'Kursach123';
            $dbname = 'layra2fv_car';
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Выполнение SQL-запроса
            $sqlQuery = $_POST['sql-query'];
            $result = $conn->query($sqlQuery);
            
            // Вывод результатов выполнения запроса
            if ($result) {
                echo '<div class="result">Результат выполнения запроса:</div>';
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<pre>' . print_r($row, true) . '</pre>';
                    }
                } else {
                    echo '<div class="result">Запрос вернул 0 результатов.</div>';
                }
            } else {
                echo '<div class="result">Ошибка выполнения запроса: ' . $conn->error . '</div>';
            }
            
            // Закрытие соединения с базой данных
            $conn->close();
        }
        ?>
    </div>
</body>
</html>