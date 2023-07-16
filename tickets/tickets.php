<?php 
include "../connection.php";
$query = "SELECT * FROM `tickets`";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tickets</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Tickets</h2>
<table class="table table-bordered">
	<thead>
		<tr>
        <th>Ticket Id</th>   
		<th>Customer</th>
        <th>Screen</th>
        <th>Seat</th>
        <th>Number Of Seats</th>
        <th>Date Of Booking</th>
        <th>Total Bill</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
				while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
					<td><?php echo $row['ticket_id']; ?></td>
					<td><?php echo $row['cust_id']; ?></td>
                    <td><?php echo $row['screen_id']; ?></td>
                    <td><?php echo $row['seat_id']; ?></td>
                    <td><?php echo $row['no_of_seat']; ?></td>
                    <td><?php echo $row['date_of_booking']; ?></td>
                    <td><?php echo $row['total_bill']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['ticket_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['ticket_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php	
        	}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>