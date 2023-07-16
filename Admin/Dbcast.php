<?php 
include "../connection.php";

	if (isset($_POST['btnsubmit'])) {

		$Movie_id= $_POST['movie-id'];
        $casts= $_POST['casts'];

		$query="INSERT INTO `casts`(`movie_id`, `cast_name`) VALUES('$Movie_id','$casts')";
		$result = mysqli_query($conn,$query);

		if ($result == TRUE) {
			header('location:cast.php');
		}else{
            echo("Error description: " . mysqli_error($conn));
		}

		$conn->close();

	}


	
if(isset($_POST['Edit']))
{
   $id=$_POST['id'];
    $Movie_id= $_POST['movie-id'];
    $casts= $_POST['casts'];
    $query="UPDATE `casts` SET`movie_id`='$Movie_id',`cast_name`='$casts' WHERE `cast_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:cast.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>