<?php
include ("../connection.php");
$tquery ="SELECT * FROM tickets";
$tresult = mysqli_query($conn,$tquery);
$bquery = "SELECT * FROM booking_detail RIGHT JOIN tickets ON booking_detail.booking_id =tickets.ticket_id";
$bresult =mysqli_query($conn,$bquery);
if(isset($_POST['Insert']))
{
    $ticketbookingid = $_POST['ticketbooking'];
    $age = $_POST['age'];
    $price= $_POST['price'];

    $query="INSERT INTO `booking_detail`(`ticket_booking_id`, `age`, `price`) VALUES ('$ticketbookingid','$age','$price')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:bookingdetail.php');
    }
    else
    {
        echo "<script>alert('Error =".mysqli_error($conn)."')";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Insert Booking Details</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputName">Ticket Booking Id</label>
    <select name='ticketbooking'>
    <?php
    while($row=mysqli_fetch_assoc($tresult))
                  {
                  ?>
                  <option value="<?php echo $row['ticket_id'];?>"><?php echo $row['ticket_id'];?></option>
                  <?php
                  }
                  ?>
                  </select>
    <br>
    <label for="exampleInputName">Age</label>
    <input type="text" class="form-control" name="age" placeholder="Age">
    <br>
    <label for="exampleInputName">Price</label>
    <input type="text" class="form-control" name="price" placeholder="Price">
    <br>
  <input type="submit" name="Insert" value="Insert" class="btn btn-primary"></input> 
</form>
</body>