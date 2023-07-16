<?php
include('../connection.php');
$id =$_GET['id'];
$query="DELETE FROM `booking_detail` WHERE `booking_id`='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:bookingdetail.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>