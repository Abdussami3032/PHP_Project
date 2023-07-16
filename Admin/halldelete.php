<?php
include "../connection.php";
$id = $_GET['id'];
$query="UPDATE `halls` SET `hall_status`='expired' WHERE hall_id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:hall.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>