<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $courseType = $_POST["course-type"];
    $name = $_POST["name"];
    $whatsapp = $_POST["whatsapp"];
    $userEmail = $_POST["user-email"]; // Адрес электронной почты, введенный пользователем
    
    // Замените "ваш_адрес@gmail.com" на ваш адрес Gmail
    $to = "khalidhack04@gmail.com";
    $subject = "Новая заявка на курс";
    
    // Создаем сообщение с данными для вашей почты
    $message = "Тип курса: " . $courseType . "\n";
    $message .= "Имя: " . $name . "\n";
    $message .= "Номер WhatsApp: " . $whatsapp;
    
    // Отправляем электронное письмо на ваш адрес
    mail($to, $subject, $message);
    
    // Создаем сообщение с уведомлением для пользователя
    $userSubject = "Ваша заявка принята";
    $userMessage = "Ваша заявка на курс принята. В ближайшее время с вами свяжется менеджер от Khalidjan в WhatsApp. Спасибо, что выбрали нас!";
    
    // Отправляем уведомление на адрес, введенный пользователем
    mail($userEmail, $userSubject, $userMessage);
    
    // Возвращаем пользователю сообщение об успешной отправке
    echo "Ваши данные были успешно отправлены. Мы свяжемся с вами в ближайшее время.С уважением Khalidjan👨🏻‍💻";
}
// Генерируем HTML-код
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<title>Результат обработки</title>';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '</head>';
echo '<body>';
// Ваш HTML-код для результатов обработки
echo '</body>';
echo '</html>';
?>