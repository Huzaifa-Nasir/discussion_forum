<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// includes/functions.php

function redirectIfNotLoggedIn() {
    if (!isset($_SESSION['user_id']) || !isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

?>
