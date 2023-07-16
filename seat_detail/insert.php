<?php
include "../connection.php";
$hsquery ="SELECT * FROM halls,seat_type";
$hsresult = mysqli_query($conn,$hsquery);
$mquery = "SELECT * FROM seat_detail RIGHT JOIN hall_id ON seat_detail.seat_id =hall.hall_id RIGHT JOIN seat_type on seat_detail.seat_id=seat_type.type_id";
$mresult =mysqli_query($conn,$mquery);
if(isset($_POST['Insert']))
{
    $hall_id = $_POST['hall_id'];
    $seat_type = $_POST['seat_type'];
    $price = $_POST['price'];
    $no_of_seats = $_POST['no_of_seats'];

    $query="INSERT INTO `seat_detail`(`hall_id`, `seat_type`, `price`, `no_of_seats`) VALUES ('$hall_id','$seat_type','$price','$no_of_seats')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:seats_details.php');
    }
    else
    {
        echo "<script>alert('Error =".mysqli_error($conn)."')";
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
    <label for="exampleInputName">Hall_id</label>
    <select name="hall_id">
        
    <?php
                  while($row=mysqli_fetch_assoc($hsresult))
                  {
                  ?>
                  <option value="<?php echo $row['hall_id'];?>"><?php echo $row['hall_name'];?></option>
                  <?php
                  }
                  ?>
    </select>
</div>
</div>
<div class="form-group">
    <label for="exampleInputName">Seat_type</label>
    <select name="seat_type">
        
    <?php
                  while($row=mysqli_fetch_assoc($hsresult))
                  {
                  ?>
                  <option value="<?php echo $row['type_id'];?>"><?php echo $row['seat_name'];?></option>
                  <?php
                  }
                  ?>
    </select>
</div>
<div class="form-group">
    <label for="exampleInputName">Price</label>
    <input type="text" class="form-control" name="price" placeholder="price">
</div>
<div class="form-group">
    <label for="exampleInputName">No Of Seats</label>
    <input type="text" class="form-control" name="no_of_seats" placeholder="no of seats">
</div>
  <button type="submit" name="Insert" value="submit" class="btn btn-primary">Insert</button>
</form>
</body>
</html>