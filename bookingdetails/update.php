<?php 
include "../connection.php";
$tquery ="SELECT * FROM tickets";
$tresult = mysqli_query($conn,$tquery);
$bquery = "SELECT * FROM booking_detail RIGHT JOIN tickets ON booking_detail.booking_id =tickets.ticket_id";
$bresult =mysqli_query($conn,$bquery);
	
$id =$_GET['id'];
$query ="SELECT * FROM `booking_detail` WHERE `booking_id`='$id'";
$result =mysqli_query($conn,$query);
$row =mysqli_fetch_row($result);
if(isset($_POST['Update']))
{
   
	$ticketbookingid = $_POST['ticketbooking'];
    $age = $_POST['age'];
    $price= $_POST['price'];
    $query="UPDATE `booking_detail` SET `ticket_booking_id`='$ticketbookingid',`age`='$age',`price`='$price' WHERE `booking_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:bookingdetail.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
	?>
<!DOCTYPE html>
<html>
<title>Booking_Detail update</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<h2>Booking_Detail</h2>

<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputName">Tickets_Booking_Id</label>
	<?php
    while($row=mysqli_fetch_assoc($tresult))
                  {
                  ?>
                  <option value="<?php echo $row['ticket_id'];?>"><?php echo $row['ticket_id'];?></option>
                  <?php
                  }
                  ?>
    <br>
<div class="form-group">
    <label for="exampleInputName">Age</label>
	<input type="text" name="age" value="<?php echo $age; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Price</label>
	<input type="text" name="price" value="<?php echo $price; ?>">
</div>
  <input type="submit" name="update" value="Update" class="btn btn-primary"></input>
</form>
	<?php
	} else{

		header('Location: view.php');
	}

}
?>