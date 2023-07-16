<?php
include('../connection.php');
$id =$_GET['id'];
$query="DELETE FROM `casts` WHERE `cast_id`='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:cast.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>