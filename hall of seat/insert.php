<?php 
include "../connection.php";


	if (isset($_POST['btnsubmit'])) {

		$name= $_POST['name'];
		$no_of_seat = $_POST['no_of_seat'];

		$sql = "INSERT INTO `halls`(`hall_name`, `no_of_seats`) VALUES ('$name','$no_of_seat')";
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
<title>hall  insert</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<h2>hall </h2>

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