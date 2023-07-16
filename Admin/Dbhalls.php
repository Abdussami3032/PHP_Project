<?php 
include "../connection.php";


	if (isset($_POST['submit'])) {

		$name= $_POST['name'];
		$no_of_seat = $_POST['no_of_seat'];

		$sql = "INSERT INTO `halls`(`hall_name`, `hno_of_seats`) VALUES ('$name','$no_of_seat')";
		$result = $conn->query($sql);

		if ($result == TRUE) {
			header('location:hall.php');
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}

	if(isset($_POST['Edit']))
{
   $id=$_POST['id'];
    $HallName = $_POST['name'];
    $no_of_seats = $_POST['no_of_seats'];
    $query="UPDATE `halls` SET `hall_name`=' $HallName',`hno_of_seats`='$no_of_seats' WHERE `hall_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:hall.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>