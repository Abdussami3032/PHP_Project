<?php 
include "../connection.php";
$sql = "SELECT * FROM `customer`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Customer</h2>
<table class="table table-bordered">
	<thead>
		<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Contact No</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
		?>
		<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['password']; ?></td>
					<td><?php echo $row['contactno']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['cust_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['cust_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>