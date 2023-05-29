<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<head>
    <title>Название сайта</title>
    <style>
        /* Стили для header */
        header {
            background-color: #333;
            color: #fff;
            padding: 7px;
        
        
    display: flex;
    justify-content: center;
    width: 100%;
    height: 130px;
    gap: 30px;
    margin: auto;
  }

          .logo {
            font-size: 2x;
            font-weight: bold;
            vertical-align: middle;
            margin-right: 10px;


        }
        

        .lk {
            margin-top: 1px;
            float: right;
            color: #FF69B4;
            margin-right: 10px;



        }
         .lk:hover {
             color: #fff;
                 }

        .logout {
            margin-right: 10px;
            margin-top: 1px;
            float: right;
            color: #FF69B4;



        }
         .logout:hover {
             color: #fff;
                 }

        
        .navigation ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navigation ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .navigation ul li a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <header>
        
        <div class="logo">
            <!-- Логотип -->
            <?php
            $imagePath = 'pics/logo.png';//вставка лого и изменение размера
                     echo '<img src="' . $imagePath . '" alt="Логотип" width="90" height="90" class="logo">';
            ?>
                </div>
                     <nav class="navigation">
                <ul>
                    <h1>Добро пожаловать в Car Sharing!</h1>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="about.php">О нас</a></li>
                    <li><a href="contact.php">Контакты</a></li>
                     <a class="logout" href="logout.php">Выход</a>
                    <a class="lk" href="lk.php">Личный кабинет</a>
                    
                   
     
                    
                    

                </ul>
                </nav>
    </header>
</body>
</html>

