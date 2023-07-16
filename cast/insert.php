<?php 
include "../connection.php";
$mquery ="SELECT * FROM movies";
$mresult = mysqli_query($conn,$mquery);
$caquery = "SELECT * FROM casts RIGHT JOIN movies ON casts.cast_id =movies.movie_id";
$caresult =mysqli_query($conn,$caquery);
	if (isset($_POST['btnsubmit'])) {

		$Movie_id= $_POST['movie-id'];
        $casts= $_POST['casts'];

		$query="INSERT INTO `casts`(`movie_id`, `cast_name`) VALUES('$Movie_id','$casts'')";
		$result = mysqli_query($conn,$query);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
            echo("Error description: " . mysqli_error($conn));
		}

		$conn->close();

	}
?>
<!DOCTYPE html>
<html>
<title>Add Movie</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<h2>hall </h2>

<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputName">Movie</label>
    <select name='movie-id'>
    <?php
                  while($row=mysqli_fetch_assoc($mresult))
                  {
                  ?>
                  <option value="<?php echo $row['movie_id'];?>"><?php echo $row['movie_title'];?></option>
                  <?php
                  }
                  ?>
                  </select>
</div>
<br>
<div class="form-group">
    <label>Cast</label>
    <input type="text" class="form-control" name="casts" placeholder="Cast">
</div>

  <input type="submit" name="btnsubmit" value="Submit" class="btn btn-primary"></input>
</form>
</body>
</html>