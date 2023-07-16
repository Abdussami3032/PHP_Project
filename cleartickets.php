<?php
session_start();
unset($_SESSION['ticket']);
unset($_SESSION['noofticket']);
unset($_SESSION['total']);
unset($_SESSION['msg']);
header('location:products.php');

?>