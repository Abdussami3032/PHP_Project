<?php
include "../connection.php";
if(isset($_POST['Insert']))
{
    $seat_name = $_POST['seat_name'];

    $query="INSERT INTO `seat_type`(`seat_name`) VALUES (`$seat_name`)";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:seat_type.php');
    }
    else
    {
        echo "<script>alert('Error =".mysqli_error($conn)."')";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Add Seat Type</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputName">Seat_type</label>
    <input type="text" class="form-control" name="seat_name" placeholder="seat_type">
    <br>
  <button type="submit" name="Insert" value="submit" class="btn btn-primary">Insert</button>
</form>
</body>