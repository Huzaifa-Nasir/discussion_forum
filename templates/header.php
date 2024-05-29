<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <ul>
        <li><a href="threads.php">View Threads</a></li>
            <?php if (isLoggedIn()): ?>
                <li><a href="add_thread.php">Add Thread</a></li>
                <li><a href="logout.php">Logout</a></li>
                
            <?php else: ?>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>
