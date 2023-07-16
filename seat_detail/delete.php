<?php
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	$query = "DELETE FROM `DELETE FROM `seat_detail` `WHERE `id`='$seat_id'";

	$result = mysqli_query($conn,$query);
	if ($result == TRUE) {
		echo "Record deleted successfully.";
	}else{
		echo "Error:" . $query . "<br>" . mysqli_error($conn);
	}
}

?>