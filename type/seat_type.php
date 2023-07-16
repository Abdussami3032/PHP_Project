<?php 
include "../connection.php";
$query = "SELECT * FROM `seat_type`";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Seats Type</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Seats Type</h2>
<table class="table table-bordered">
	<thead>
		<tr>
        <th>Type id</th>   
		<th>Seat Type</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
				while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
					<td><?php echo $row['type_id']; ?></td>
					<td><?php echo $row['seat_type']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['type_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['type_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php	
        	}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>