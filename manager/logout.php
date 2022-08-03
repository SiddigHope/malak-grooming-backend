<?php
session_start();

if(!isset($_SESSION['managerSession']))
{
 header("Location: managerdashboard.php");
}
else if(isset($_SESSION['managerSession'])!="")
{
 header("Location: ../adminlogin.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['managerSession']);
 header("Location: ../adminlogin.php");
}
?>