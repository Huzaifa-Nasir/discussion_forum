<?php
include 'includes/db.php';
include 'includes/functions.php';

$error_message = ""; // Initialize an empty error message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
        } else {
            $error_message = "Invalid password.";
        }
    } else {
       $error_message = "No user found.";
    }
}
?>

<?php include 'templates/header.php'; ?>
<h2>Login</h2>
<?php if ($error_message): ?>
    <div id="error-message" class="error-message"><?php echo $error_message; ?></div>
<?php endif; ?>

<form method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
</form>
<?php include 'templates/footer.php'; ?>


<script>
   

    function hideErrorMessage() {
        var errorMessage = document.getElementById("error-message");
        if (errorMessage) {
            setTimeout(function() {
                errorMessage.style.display = "none";
            }, 3000); 
        }
    }

 
    window.onload = function() {
        hideErrorMessage();
    };
</script>

