<?php
include 'includes/db.php';
include 'includes/functions.php';
redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO threads (user_id, title, content) VALUES ($user_id, '$title', '$content')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: threads.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'templates/header.php'; ?>
<h2>Add Thread</h2>
<form method="POST">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" required>
    <label for="content">Content</label>
    <textarea id="content" name="content" required></textarea>
    <button type="submit">Add Thread</button>
</form>
<?php include 'templates/footer.php'; ?>
