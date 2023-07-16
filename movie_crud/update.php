<?php 
include "../connection.php";

	if (isset($_POST['update'])) {
		
		$Movie_title= $_POST['movie_title'];
		$Cover = $_POST['cover'];
          move_uploaded_file($_files['img']['name'],"image/".basename($_files['img']['name']));
            $image=$_files['img']['name'];
        $Description =$_POST['description'];
        $Relase_Date = $_POST['relase-date'];
        $Trailer=$_POST['tralier'];
        $Director=$_POST['directors'];
        $Duration=$_POST['duration'];
        $Category=$_POST['category'];

		$sql = "UPDATE `movies` SET `movie_title`=`$Movie_title`,`Cover`=`$Cover`,`description`=`$Description`,`relase_date`=` $Relase_Date`,`trailer`=`$Trailer`,`director`=`$Director`,`duration`=`$Duration`,`cat_id`=`$Category` WHERE 1";
		$result = mysqli_query($conn,$sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}

if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	$sql = "SELECT * FROM `movies`WHERE `id`='$user_id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$Movie_title= $_POST['movie_title'];
		$Cover = $_POST['cover'];
          move_uploaded_file($_files['img']['name'],"image/".basename($_files['img']['name']));
            $image=$_files['img']['name'];
        $Description =$_POST['description'];
        $Relase_Date = $_POST['relase-date'];
        $Trailer=$_POST['tralier'];
        $Director=$_POST['directors'];
        $Duration=$_POST['duration'];
        $Category=$_POST['category'];
		}

	?>
<!DOCTYPE html>
<html>
<title>Booking_Detail update</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<h2>Booking_Detail</h2>

<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputName">Movie_title</label>
	<input type="text" name="movie_title" value="<?php echo $Movie_title; ?>">
		    <input type="hidden" name="movie_id" value="<?php echo $id; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Cover</label>
	<input type="text" name="Cover" value="<?php echo $Cover; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Description</label>
	<input type="text" name="price" value="<?php echo $Description; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Relase_Date</label>
	<input type="text" name="relase-date" value="<?php echo $Relase_Date; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Tralier</label>
	<input type="text" name="tralier" value="<?php echo $Trailer; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Duration</label>
	<input type="text" name="duration" value="<?php echo $Duration; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Category</label>
	<input type="text" name="Category" value="<?php echo $Category; ?>">
</div>
  <button type="submit" name="btnsubmit" value="submit" class="btn btn-primary">Submit</button>
</form>
	<?php
	} else{

		header('Location: view.php');
	}

}
?>