<?php
include "../connection.php";
$hquery ="SELECT * FROM halls";
$hresult = mysqli_query($conn,$hquery);
$squery ="SELECT * FROM seat_type";
$sresult = mysqli_query($conn,$squery);
$mquery = "SELECT * FROM seat_detail RIGHT JOIN halls ON seat_detail.seat_id =halls.hall_id RIGHT JOIN seat_type on seat_detail.seat_id=seat_type.type_id";
$mresult =mysqli_query($conn,$mquery);
if(isset($_POST['Insert']))
{
    $hall_id = $_POST['hall_id'];
    $seat_type = $_POST['seat_type'];
    $price = $_POST['price'];
    $no_of_seats = $_POST['sno_of_seats'];

    $query="INSERT INTO `seat_detail`(`hall_id`, `seat_type`, `price`, `no_of_seats`) VALUES ('$hall_id','$seat_type','$price','$no_of_seats')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:details.php');
    }
    else
    {
        echo "<script>alert('Error =".mysqli_error($conn)."')";
    }
}

if(isset($_POST['Edit']))
{
    $id=$_POST['id'];
    $hall_id = $_POST['hall_id'];
    $seat_type = $_POST['seat_type'];
    $price = $_POST['price'];
    $no_of_seats = $_POST['sno_of_seats'];

    $query="UPDATE `seat_detail` SET `hall_id`='$hall_id',`seat_type`='$seat_type',`price`='$price',`no_of_seats`='$no_of_seats' WHERE `seat_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:details.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>