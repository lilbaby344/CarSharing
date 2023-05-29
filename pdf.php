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

// Получение данных пользователя из базы данных
 // Необходимо начать сеанс сессии
$login = $_SESSION['login']; 
$sql = "SELECT `name`, `surname`, `passport` FROM `client`  WHERE `login` = '$login'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $surname = $row['surname'];
    $passport = $row['passport'];
} else {
    // Обработка ошибки, если пользователь не найден
}

// Создание класса договора на основе TFPDF
class AgreementPDF extends tFPDF {
    function Header() {
        // Логотип и заголовок
        $this->AddFont('DejaVuSerif', '', 'DejaVuSerif.ttf', true);
        $this->Image('pics/logo.png', 10, 10, 30);
        $this->SetFont('DejaVuSerif', '', 12);
        $this->Cell(0, 15, 'ДОГОВОР ПОЛЬЗОВАТЕЛЬСКОГО СОГЛАШЕНИЯ', 0, 1, 'C');
        $this->Ln(10);
    }
    
    function Content($name, $surname, $passport) {
        // Пользовательские данные
        $this->SetFont('DejaVuSerif', '', 12);
        $this->MultiCell(0, 10, 'Я, нижеподписавшийся, с одной стороны, и каршеринговая компания "Car Sharing с другой стороны, заключили настоящее Пользовательское соглашение о нижеследующем: ', 0, 'L');
        $this->MultiCell(0, 10, '1. Предмет договора: Пользователь получает право пользоваться автомобилями, предоставляемыми каршеринговой компанией, на условиях, указанных в Договоре.', 0, 'L');
        $this->MultiCell(0, 10, '2. Ответственность: Пользователь обязуется не нарушать условия использования автомобилей, следовать правилам дорожного движения и нести ответственность за любые ущерб, причиненный автомобилю во время его использования.', 0, 'L');
        $this->MultiCell(0, 10, '3. Срок действия договора: Договор вступает в силу с момента подписания и действует до его расторжения.', 0, 'L');
        $this->MultiCell(0, 10, '4. Прочие условия: Пользователь обязуется возвращать автомобиль в указанное время и место, соблюдая условия использования и тарифы. Каршеринговая компания оставляет за собой право изменять условия Договора и тарифы в одностороннем порядке. ', 0, 'L');
        $this->Ln(5);
        $this->MultiCell(0, 10, '   Пользовательские данные:', 0, 'L');
        $this->MultiCell(0, 10, '   Имя: ' . $name, 0, 'L');
        $this->MultiCell(0, 10, '   Фамилия: ' . $surname, 0, 'L');
        $this->MultiCell(0, 10, '   Паспортные данные: ' . $passport, 0, 'L');
    }
    
   function Footer() {
    // Подписи и дата
    $this->SetY(-70);
    $this->SetFont('DejaVuSerif', '', 12);
    $this->Cell(0, 10, 'Пользователь: ' . $this->name . ' ' . $this->surname, 0, 0, 'C');
    $this->Ln(10);
    $this->Cell(0, 10, '_____________________', 0, 0, 'C');
    $this->Ln(5);
    $this->Cell(0, 10, '(' . $this->name . ' ' . $this->surname . ')', 0, 0, 'C');
    $this->Ln(10);
    $this->Cell(0, 10, 'Каршеринговая компания "Car Sharing": (Представитель)', 0, 0, 'C');
    $this->Ln(10);
    $this->Cell(0, 10, '_____________________', 0, 0, 'C');
    $this->Ln(5);
    $this->Cell(0, 10, '(' . date('d.m.Y') . ')', 0, 0, 'C');
    }

}

// Создание экземпляра класса договора и генерация PDF
$pdf = new AgreementPDF();
$pdf->name = $name;
$pdf->surname = $surname;
$pdf->AddPage();
$pdf->Content($name, $surname, $passport);
$pdf->Output('user_agreement.pdf', 'D');

$conn->close();
?>
