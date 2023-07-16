<?php 
include "../connection.php";
$hsquery ="SELECT * FROM halls,seat_type";
$hsresult = mysqli_query($conn,$hsquery);
$sresult=mysqli_query($conn)
$mquery = "SELECT * FROM seat_detail RIGHT JOIN hall_id ON seat_detail.seat_id =hall.hall_id RIGHT JOIN seat_type on seat_detail.seat_id=seat_type.type_id";
$mresult =mysqli_query($conn,$mquery);
$query = "SELECT * FROM `seat_detail`";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Movies</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Movies</h2>
<table class="table table-bordered">
	<thead>
		<tr>
        <th>Seat id</th>   
		<th>Hall id</th>
		<th>Seat Type</th>
		<th>Price</th>
		<th>No of Seats</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
				while ($row = mysqli_fetch_assoc($hsresult)) {
		?>
		<tr>
					<td><?php echo $row['seat_id']; ?></td>
					<td value="<?php echo $row['hall_id'];?>"><?php echo $row['hall_name'];?></td>
					<td value="<?php echo $row['type_id'];?>"><?php echo $row['seat_name'];?></td>
					<td><?php echo $row['price']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['seat_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['seat_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php	
        	}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>