<?php
session_start();
unset($_SESSION['user']); //remove session variable

header('location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . '/index.php?page=home');

?>