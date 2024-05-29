<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Thread_creation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
