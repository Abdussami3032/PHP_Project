<?php
include('connection.php');
$id=$_GET['id'];
$query="DELETE from `review` where `review_id`='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:review_view.php');
}else{
    echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
}
?>