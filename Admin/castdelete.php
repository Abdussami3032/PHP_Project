<?php
include "../connection.php";
$id = $_GET['id'];
$query="UPDATE `casts` SET `cast_status`='expired' WHERE cast_id='$id'";
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