<?php
include 'includes/db.php';
include 'includes/functions.php';
redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    $thread_id = $_POST['thread_id'];

    $sql = "INSERT INTO replies (thread_id, user_id, content) VALUES ($thread_id, $user_id, '$content')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: thread.php?id=$thread_id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
