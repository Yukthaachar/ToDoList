<?php
include 'config.php';

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Fetch task details
    $result = $conn->query("SELECT * FROM tasks WHERE id = $task_id");
    $task = $result->fetch_assoc();

    // Check if the form is submitted (for updating tasks)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_task_name = $_POST['new_task_name'];
        $new_task_description = $_POST['new_task_description'];

        // Update the task in the database
        $conn->query("UPDATE tasks SET task_name = '$new_task_name', task_description = '$new_task_description' WHERE id = $task_id");

        // Redirect back to index.php after updating
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Update Task</h2>
    <!-- Form to update the task -->
    <form method="post" action="">
        <label for="new_task_name">New Task Name:</label>
        <input type="text" id="new_task_name" name="new_task_name" value="<?php echo $task['task_name']; ?>" required>
        <label for="new_task_description">New Task Description:</label>
        <input type="text" id="new_task_description" name="new_task_description" value="<?php echo $task['task_description']; ?>" required>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>
