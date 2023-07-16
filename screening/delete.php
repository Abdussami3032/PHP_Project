<?php
include('../connection.php');
$id=$_GET['id'];
$query="DELETE from `screening` where `screening_id`='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:View_screening.php');
}else{
    echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
}
?>