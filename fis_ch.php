<?php
header('Content-Type: text/html; charset=utf-8');
require('tfpdf/tfpdf.php');
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
$final_cost = $_SESSION['final_cost'];
$minutes = $_SESSION['minutes'];
$login = $_SESSION['login'];

$sql = "SELECT `name`, `surname` FROM `client`  WHERE `login` = '$login'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $surname = $row['surname'];
}

class FiskalniChek extends tFPDF {
    // Метод для создания формы фискального чека
    function createFiskalniChek($name, $surname, $minutes, $final_cost) {
        // Установка шрифта и размера
        $this->AddFont('DejaVuSerif', '', 'DejaVuSerif.ttf', true);
        $this->Image('pics/logo.png', 10, 10, 30);
        $this->SetFont('DejaVuSerif', '', 12);
        $this->Cell(0, 15, 'ФИСКАЛЬНЫЙ ЧЕК', 0, 1, 'C');
                
        // Добавление полей формы
        $this->Ln(10); // Переход на новую строку
        $this->Cell(40, 10, 'Имя:', 0, 0);
        $this->Cell(60, 10, $name, 0, 1);

        $this->Cell(40, 10, 'Фамилия:', 0, 0);
        $this->Cell(60, 10, $surname, 0, 1);

        $this->Cell(40, 10, 'Итоговое время:', 0, 0);
        $this->Cell(60, 10, $minutes, 0, 1);

        $this->Cell(40, 10, 'Итог:', 0, 0);
        $this->Cell(60, 10, $final_cost . ' рублей', 0, 1);

        // Добавление подвала
        $this->Ln(10);
        $this->Cell(0, 10, 'Спасибо за покупку!', 0, 1, 'C');
        $this->Cell(0, 10, '(' . date('d.m.Y') . ')', 0, 0, 'C');
    }
}

// Создание экземпляра класса FiskalniChek
$pdf = new FiskalniChek();
$pdf->AddPage();
// Создание формы фискального чека
$pdf->createFiskalniChek($name, $surname, $minutes, $final_cost);
// Генерация PDF
$pdf->Output('fis_ch.pdf', 'D');
$conn->close();
?>
