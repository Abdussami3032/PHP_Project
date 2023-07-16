<?php
include "../connection.php";
if(isset($_POST['Insert']))
{
    $seat_name = $_POST['seat_name'];

    $query="INSERT INTO `seat_type`(`seat_name`) VALUES ('$seat_name')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:type.php');
    }
    else
    {
        echo "<script>alert('Error =".mysqli_error($conn)."')";
    }
}
if(isset($_POST['Edit']))
{
    $id=$_POST['id'];
    $seat_name = $_POST['seat_name'];
    $query="UPDATE `seat_type` SET`seat_name`='$seat_name' WHERE `type_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:type.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>
