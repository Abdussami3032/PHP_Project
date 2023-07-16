<?php
include('../connection.php');
$id =$_GET['id'];
$query="DELETE FROM `halls` WHERE `hall_id`='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:customer.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>