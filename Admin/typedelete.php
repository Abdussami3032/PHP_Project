<?php
include "../connection.php";
$id = $_GET['id'];
$query="UPDATE `seat_type` SET `seat_status`='expired' WHERE type_id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:type.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>