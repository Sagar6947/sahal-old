<?php
session_start();
unset($_SESSION['SaharDirectory_status']);
unset($_SESSION['SaharDirectory']);
session_destroy();
header('location:../index.php');
?>