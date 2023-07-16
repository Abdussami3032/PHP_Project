<?php 
include "../connection.php";
$query = "SELECT * FROM `movie_cat`";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Categories</h2>
<table class="table table-bordered">
	<thead>
		<tr>
        <th>Category id</th>   
		<th>Category</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
				while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
					<td><?php echo $row['cat_id']; ?></td>
					<td><?php echo $row['category']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['cat_id']; ?>">Edit</a>|<a class="btn btn-danger" href="delete.php?id=<?php echo $row['cat_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php	
        	}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>