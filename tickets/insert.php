<?php
include "../connection.php";
$tcssquery ="SELECT * FROM customer,screening,seat_detail";
$tcssresult = mysqli_query($conn,$tcssquery);
$mquery = "SELECT * FROM tickets RIGHT JOIN customer ON tickets.ticket_id =customer.cust_id RIGHT JOIN screening on tickets.ticket_id=screening.screen_id RIGHT JOIN seat_detail on tickets.ticket_id=seat_detail.seat_id";
$mresult =mysqli_query($conn,$mquery);
if(isset($_POST['Insert']))
{
    $cust_id = $_POST['cust_id'];
    $screen_id=$_POST['screen_id'];
    $seat_id=$_POST['seat_id'];
    $no_of_seats=$_POST['no_of_seats'];
    $dateofbooking=$_POST['date_of_booking'];
    $totalbill=$_POST['total_bill'];

    $query="INSERT INTO `tickets`(`cust_id`, `screen_id`, `seat_id`, `no_of_seat`, `date_of_booking`, `total_bill`) VALUES ('$cust_id','$screen_id','$seat_id','$no_of_seats','$dateofbooking','$totalbill')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:tickets.php');
    }
    else
    {
        echo "<script>alert('Error =".mysqli_error($conn)."')";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Add tickets</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputName">Customer</label>
    <select name="cust_id">
        
    <?php
                  while($row=mysqli_fetch_assoc($tcssresult))
                  {
                  ?>
                  <option value="<?php echo $row['cust_id'];?>"><?php echo $row['cust_name'];?></option>
                  <?php
                  }
                  ?>
    </select>
    <br>
<div class="form-group">
    <label for="exampleInputName">Screen</label>
    <select name="screen_id">
        
        <?php
                      while($row=mysqli_fetch_assoc($tcssresult))
                      {
                      ?>
                      <option value="<?php echo $row['screen_id'];?>"><?php echo $row['screen_id'];?></option>
                      <?php
                      }
                      ?>
        </select>
    <br>
</div>
<div class="form-group">
    <label for="exampleInputName">Seat</label>
    <select name="seat_id">
        
    <?php
                  while($row=mysqli_fetch_assoc($tcsssresult))
                  {
                  ?>
                  <option value="<?php echo $row['seat_id'];?>"><?php echo $row['seat_id'];?></option>
                  <?php
                  }
                  ?>
    </select>
    <br>
</div>
<div class="form-group">
    <label for="exampleInputName">Number of Seats</label>
    <input type="text" class="form-control" name="no_of_seats" placeholder="Number of Seats">
    <br>
</div>
<div class="form-group">
    <label for="exampleInputName">Date Of Booking</label>
    <input type="text" class="form-control" name="date_of_booking" placeholder="Date Of Booking">
    <br>
</div>
<div class="form-group">
    <label for="exampleInputName">Total Bill</label>
    <input type="text" class="form-control" name="total_bill" placeholder="Total Bill">
    <br>
</div>
  <button type="submit" name="Insert" value="submit" class="btn btn-primary">Insert</button>
</form>
</body>
