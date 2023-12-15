<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];

    $conn->query("DELETE FROM tasks WHERE id = $task_id");
}

header("Location: index.php");
exit();
?>
