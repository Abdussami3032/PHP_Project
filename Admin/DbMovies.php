<?php
include "../connection.php";
$cquery ="SELECT * FROM movie_cat";
$cresult = mysqli_query($conn,$cquery);
$mquery = "SELECT * FROM movies RIGHT JOIN movie_cat ON movies.movie_id =movie_cat.cat_id";
$mresult =mysqli_query($conn,$mquery);
	if (isset($_POST['btnAdd'])) {

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
			header('location:movies.php');
		}else{
            echo("Error description: " . mysqli_error($conn));
		}

		$conn->close();

	}
?>
