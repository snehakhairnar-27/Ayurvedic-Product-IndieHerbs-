<?php
session_start();


session_destroy();
//header('location:index.php');
echo "<script>";
echo "alert('Logout Successfull');";
echo 'window.location.href="index.php";';
echo "</script>";
?>