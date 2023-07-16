<?php 
include "../connection.php";
$sql = "SELECT * FROM `booking_detail`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Booking Details</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Booking Details</h2>
<table class="table table-bordered">
	<thead>
		<tr>
		<th>Booking Id</th>
		<th>Ticket Booking Id</th>
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
					<td><?php echo $row['booking_id']; ?></td>
					<td><?php echo $row['ticket_booking_id']; ?></td>
					<td><?php echo $row['age']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['booking_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['booking_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>