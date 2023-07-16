<?php 
include "connection.php";
$sql = "SELECT * FROM booking_detail";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Booking_Detail Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>View ticket</h2>
<table class="table">
	<thead>
		<tr>
		<th>Tickets_Booking_Id</th>
		<th>Age</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
		?>
		<tr>
					<td><?php echo $row['Tickets_Booking_Id']; ?></td>
					<td><?php echo $row['Age']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>