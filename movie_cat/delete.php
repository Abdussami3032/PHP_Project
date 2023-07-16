<?php
include('../connection.php');
$id =$_GET['id'];
$query="DELETE FROM `movie_cat` WHERE `cat_id`='$id'";
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