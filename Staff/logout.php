<?php
session_start();

include 'connection.php';
if (!isset($_SESSION["email"])) {
    header("Location: signin.php");
    exit();
}


if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: signin.php");
    exit();
}
?>