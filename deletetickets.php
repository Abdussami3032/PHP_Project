<?php
session_start();
$id=$_GET['id'];
$index = array_search($id,$_SESSION['ticket']);

unset($_SESSION['ticket'][$index]);
unset($_SESSION['noofticket'][$index]);

$_SESSION['ticket']=array_values($_SESSION['ticket']);
$_SESSION['noofticket']=array_values($_SESSION['nooftickets']);

header('location:viewtickets.php');
?>