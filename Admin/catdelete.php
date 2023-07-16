<?php
include "../connection.php";
$id = $_GET['id'];
$query="UPDATE `movie_cat` SET `cat_status`='expired' WHERE cat_id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:categories.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>