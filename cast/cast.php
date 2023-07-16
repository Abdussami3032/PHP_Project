<?php 
include "../connection.php";
$mquery ="SELECT * FROM movies";
$mresult = mysqli_query($conn,$mquery);
$caquery = "SELECT * FROM casts RIGHT JOIN movies ON casts.cast_id =movies.movie_id";
$caresult =mysqli_query($conn,$caquery);
$sql = "SELECT * FROM `cast`";
$result = $conn->query($sql);
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
        <th>Cast id</th>   
		<th>Movie title</th>
		<th>Cast</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				while($row=mysqli_fetch_assoc($mresult)) {
		?>
		<tr>
					<td><?php echo $row['movie_id']; ?></td>
					<td value="<?php echo $row['movie_id'];?>"><?php echo $row['movie_title'];?></td>
                    <td><?php echo $row['cast_name']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['cast_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['cast_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>