<?php
session_start();
if(isset($_SESSION['customer']))
{
if(!in_array($_GET['id'],$_SESSION['ticket']))
{
    array_push($_SESSION['ticket'],$_GET['id']);
    array_push($_SESSION['noofticket'],1);
    $_SESSION['msg']="Added Successfully";
    header('location:tickets.php');
}else{
   
    $_SESSION['msg']="Movie is already booked";
    header('location:tickets.php');
}
}else{
    header('location:login.php');
}


?>