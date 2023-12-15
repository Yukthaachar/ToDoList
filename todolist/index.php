<?php
include 'config.php';

// Check if the form is submitted (for adding tasks)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];

    // Insert the new task into the database
    $conn->query("INSERT INTO tasks (task_name, task_description) VALUES ('$task_name', '$task_description')");
}

// Check if a task should be deleted
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Delete the task from the database
    $conn->query("DELETE FROM tasks WHERE id = $task_id");
}

// Retrieve all tasks from the database
$result = $conn->query("SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>ToDo List</h1>
    <!-- Form to add new tasks -->
    <form method="post" action="">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" required>
        <label for="task_description">Task Description:</label>
        <input type="text" id="task_description" name="task_description" required>
        <button type="submit">Add Task</button>
    </form>

    <!-- Display the list of tasks -->
    <ul>
        <?php
        // Loop through the tasks and display them
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['task_name']} - {$row['task_description']} 
                  <a href='index.php?action=delete&id={$row['id']}'>Delete</a>
                  <a href='update_task.php?id={$row['id']}'>Update</a>
                  </li>";
        }
        ?>
    </ul>
</body>
</html>
