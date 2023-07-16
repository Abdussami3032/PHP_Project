<?php
include "../connection.php";
$id =$_GET['id'];
$query ="SELECT * FROM `halls` WHERE `hall_id`='$id'";
$result =mysqli_query($conn,$query);
$row =mysqli_fetch_row($result);
if(isset($_POST['Update']))
{
   
    $HallName = $_POST['name'];
    $no_of_seats = $_POST['no_of_seats'];
    $query="UPDATE `halls` SET `hall_name`=' $HallName',`no_of_seats`='$no_of_seats' WHERE `hall_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:hall.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Update Halls</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
</div>
<div class="form-group">
    <label for="exampleInputName">No_of_seat</label>
    <input type="text" class="form-control" name="no_of_seat" placeholder="no_of_seat">
</div>
  <input type="submit" name="submit" value="Submit" class="btn btn-primary"></input>
</form>
</body>
</html>