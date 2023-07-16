<?php 
include "../connection.php";
$sql = "SELECT * FROM `movies`";
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
        <th>Movie id</th>   
		<th>Movie title</th>
		<th>Cover</th>
		<th>Description</th>
		<th>Relase Date</th>
        <th>trailer</th>
        <th>director</th>
        <th>duration</th>
        <th>category</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				while($row=mysqli_fetch_assoc($result)) {
		?>
		<tr>
					<td><?php echo $row['movie_id']; ?></td>
					<td><?php echo $row['movie_title']; ?></td>
					<td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Cover'])?>" width="100px"height="100px"/></td>
					<td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['relase_date']; ?></td>
                    <td><?php echo $row['trailer']; ?></td>
                    <td><?php echo $row['director']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                    <td><?php echo $row['cat_id']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['movie_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['movie_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>