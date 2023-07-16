<?php 
include "../connection.php";
$cquery ="SELECT * FROM movie_cat";
$cresult = mysqli_query($conn,$cquery);
$mquery = "SELECT * FROM movies RIGHT JOIN movie_cat ON movies.movie_id =movie_cat.cat_id";
$mresult =mysqli_query($conn,$mquery);
	if (isset($_POST['btnsubmit'])) {

		$Movie_title= $_POST['movie-title'];
		$Cover = addslashes(file_get_contents($_FILES['cover']['tmp_name']));
        $Description =$_POST['description'];
        $Relase_Date = $_POST['relase-date'];
        $Trailer=$_POST['trailer'];
        $Director=$_POST['directors'];
        $Duration=$_POST['duration'];
        $Category=$_POST['category'];

		$query="INSERT INTO `movies`(`movie_title`, `Cover`, `description`, `relase_date`, `trailer`, `director`, `duration`, `cat_id`) VALUES('$Movie_title','$Cover','$Description','$Relase_Date','$Trailer','$Director','$Duration','$Category')";
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

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputName">Movie-Title</label>
    <input type="text" class="form-control" name="movie-title" placeholder="Movie-title">
</div>
<div class="form-group">
    <label>Cover</label>
    <input type="file" class="form-control" name="cover" id="fileToUpload" placeholder="Cover">
</div>
<div class="form-group">
    <label for="exampleInputName">Description</label>
    <input type="text" class="form-control" name="description" placeholder="Description">
</div>
<div class="form-group">
    <label for="exampleInputName">Relase Date</label>
    <input type="text" class="form-control" name="relase-date" placeholder="Relase Date">
</div>
<div class="form-group">
    <label for="exampleInputName">Trailer</label>
    <input type="text" class="form-control" name="trailer" placeholder="Trailer">
</div>
<div class="form-group">
    <label for="exampleInputName">Directors</label>
    <input type="text" class="form-control" name="directors" placeholder="Directors">
</div>
<div class="form-group">
    <label for="exampleInputName">Duration</label>
    <input type="text" class="form-control" name="duration" placeholder="Duration">
</div>
<div class="form-group">
    <label for="exampleInputName">Category</label>
    <select name="category">
        
    <?php
                  while($row=mysqli_fetch_assoc($cresult))
                  {
                  ?>
                  <option value="<?php echo $row['cat_id'];?>"><?php echo $row['category'];?></option>
                  <?php
                  }
                  ?>
    </select>
</div>
  <input type="submit" name="btnsubmit" value="Submit" class="btn btn-primary"></input>
</form>
</body>
</html>