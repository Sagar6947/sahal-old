<?php
session_start();
unset($_SESSION['ekaumbharat']);
unset($_SESSION['ekaumbharat_Employee']);
session_destroy();
header('location:../index.php');
?>