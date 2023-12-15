<?php
include 'config.php';

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    $conn->query("DELETE FROM tasks WHERE id = $task_id");
}

header("Location: index.php");
exit();
?>
