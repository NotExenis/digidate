<?php 
session_start();
session_destroy();
session_unset();
unset($_SESSION['role']);
header('location: ../index.php?page=login');
?>