<?php
include "../connection.php";
$id =$_GET['id'];
$query ="SELECT * FROM `seat_type` WHERE `type_id`='$id'";
$result =mysqli_query($conn,$query);
$row =mysqli_fetch_row($result);
if(isset($_POST['Update']))
{
   
    $seat_name = $_POST['seat_name'];
    $query="UPDATE `seat_type` SET`seat_name`='$seat_name' WHERE `type_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:seats_details.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Add Movie</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
<div class="form-group">
    <label for="exampleInputName">Seat_type</label>
    <input type="text" class="form-control" name="seat_name" placeholder="Seat Name">
</div>
  <button type="submit" name="Update" value="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>