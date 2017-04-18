<?php
include('check.php');
session_start();
$_SESSION = array();
header("location:login.php");
 ?>
