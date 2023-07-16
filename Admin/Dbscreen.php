<?php
include('../connection.php');
$squery ="SELECT * FROM `movie`,`halls`";
$sresult = mysqli_query($conn,$squery);
$mquery = "SELECT * FROM `screening` RIGHT JOIN movie on screening.screening_id=movie.movie_id RIGHT JOIN halls on screening.screenin_id=halls.hall_id";
$mresult =mysqli_query($conn,$mquery);

if(isset($_POST['btnAdd']))
{
    $movie_id=$_POST['movie_id'];
    $hall_id=$_POST['hall_id'];
    $date=$_POST['date'];
    $time=$_POST['appt'];
    

    $query="INSERT INTO `screening`(`movie_id`, `hall_id`, `timings`, `date`) VALUES ('$movie_id','$hall_id','$date','$time')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:screen.php');
    }else{
        echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
    }
}


if(isset($_POST['Edit']))
{
   $id=$_POST['id'];
    $movie_id = $_POST['movie_id'];
    $hall_id = $_POST['hall_id'];
    $timings = $_POST['appt'];
    $date = $_POST['date'];
    $query="UPDATE `screening` SET `movie_id`='$movie_id',`hall_id`='$hall_id',`timings`='$timings',`date`='$date' WHERE `screening_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:screen.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>