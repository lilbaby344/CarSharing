<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Дополнительная обработка данных (например, валидация, фильтрация и т.д.)

    // Отправка письма
    $to = "info@carsharing.com"; // Адрес получателя
    $subject = "Новое сообщение от пользователя CarSharing"; // Тема письма

    // Формирование содержимого письма
    $mailContent = "Имя: " . $name . "\n";
    $mailContent .= "Email: " . $email . "\n";
    $mailContent .= "Сообщение: " . $message . "\n";

    // Отправка письма
    if (mail($to, $subject, $mailContent)) {
        // Если письмо успешно отправлено, выполните необходимые действия (например, показать сообщение об успешной отправке)
        echo "Сообщение успешно отправлено!";
    } else {
        // Если возникла ошибка при отправке письма, выполните необходимые действия (например, показать сообщение об ошибке)
        echo "Ошибка при отправке сообщения.";
    }
}
?>



