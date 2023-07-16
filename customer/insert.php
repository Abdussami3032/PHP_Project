<?php 
include "../connection.php";


	if (isset($_POST['btnsubmit'])) {

		$name= $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$contact_no = $_POST['contactno'];

		$sql = "INSERT INTO `customer`(`cust_name`, `cust_email`, `cust_password`, `cust_contact_no`) VALUES ('$name','$email','$password','$contact_no')";
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}
?>
<!DOCTYPE html>
<html>
<title>Booking_Detail insert</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<h2>Customer</h2>

<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
</div>
<div class="form-group">
    <label for="exampleInputName">Email</label>
    <input type="text" class="form-control" name="email" placeholder="email">
</div>
<div class="form-group">
    <label for="exampleInputName">Pasword</label>
    <input type="password" class="form-control" name="password" placeholder="password">
</div>
<div class="form-group">
    <label for="exampleInputName">Contact No</label>
    <input type="text" class="form-control" name="contactno"  placeholder="Contact No">
</div>
  <input type="submit" name="btnsubmit" value="submit" class="btn btn-primary">Submit</input>
</form>
</body>
</html>