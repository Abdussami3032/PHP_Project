<?php
include "../connection.php";
$id = $_GET['id'];
$movie_id=$_GET['movie_id'];
$query="UPDATE `movies` SET `movie_status`='expired' WHERE movie_id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:movies.php');
}
else
{
    echo"<script>alert('Error =".mysqli_error($conn)."')</script>";
}
?>