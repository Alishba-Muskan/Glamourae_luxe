<?php


session_start();
session_destroy();
unset($_SESSION['EmailAddress']);
header("Location:./Login.php")


?>