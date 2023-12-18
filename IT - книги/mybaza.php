<?php
error_reporting(0); // Отключает вывод ошибок
ini_set('display_errors', 0); // Скрывает ошибки на экране

// Подключение к базе данных
$mysqli = new mysqli("localhost", "u2233162_default", "mbClmf97BLh823KF", "u2233162_default");

// Проверка подключения
if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$comment = $_POST['comment'];

if (!empty($name) && !empty($comment)) { // Проверяем, что поля name и comment не пустые
    // Вставка комментария в базу данных
    $sql = "INSERT INTO comments (name, comment) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $name, $comment);

    if ($stmt->execute()) {
        echo "Комментарий успешно добавлен.";
    } else {
        echo "Ошибка при добавлении комментария: " . $stmt->error;
    }

    $stmt->close();
} elseif (empty($name)) { // Если поле name пустое, выводим сообщение
    echo "Пожалуйста, укажите ваше имя.";
}

// Запрос к базе данных для получения комментариев
$sql = "SELECT name, comment, created_at FROM comments ORDER BY created_at DESC";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Стилизуем имя и комментарии в красивые рамки
        echo '<div class="comment-box">';
        echo '<p><strong>' . $row['name'] . '</strong> (' . $row['created_at'] . ')</p>';
        echo '<div class="comment-content">' . $row['comment'] . '</div>';
        echo '</div>';
    }
} else {
    echo "Пока нет комментариев.";
}

$mysqli->close();
?>
