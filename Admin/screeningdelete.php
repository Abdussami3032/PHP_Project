<?php
include "../connection.php";
$id = $_GET['id'];
$query="UPDATE `screening` SET `screening_stauts`='expired' WHERE screening_id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:screen.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>