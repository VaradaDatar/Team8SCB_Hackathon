<?php ob_start();?>
<?php session_start();?>
<?php
$_SESSION['name']=null;
$_SESSION['contact']=null;
$_SESSION['email']=null;
$_SESSION['password']=null;
$_SESSION['income']=null;

header("Location: ../../login.php");
?>
