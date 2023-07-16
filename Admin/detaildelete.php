<?php
include "../connection.php";
$id = $_GET['id'];
$query="UPDATE `seat_detail` SET `detail_status`='expired' WHERE seat_id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:details.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>