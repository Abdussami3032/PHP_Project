<?php
include "../connection.php";
$id =$_GET['id'];
$squery ="SELECT * FROM `screening`";
$sresult = mysqli_query($conn,$squery);
$mquery = "SELECT * FROM `screening` RIGHT JOIN movie on screening.screening_id=movie.movie_id RIGHT JOIN halls on screening.screenin_id=halls.hall_id";
$mresult =mysqli_query($conn,$mquery);
if(isset($_POST['Update']))
{
   
    $movie_id = $_POST['movie_id'];
    $hall_id = $_POST['hall_id'];
    $timings = $_POST['timings'];
    $date = $_POST['date'];
    $query="UPDATE `screening` SET `movie_id`='$movie_id',`hall_id`='$hall_id',`timings`='$timings',`date`='$date' WHERE `screening_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:screening.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Update Screening</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
<div class="form-group">
    <label for="exampleInputName">Movie Id</label>
    <select name='movie_id'>
    <?php
    while($row=mysqli_fetch_assoc($sresult))
                  {
                  ?>
                  <option value="<?php echo $row['movie_id'];?>"><?php echo $row['movie_id'];?></option>
                  <?php
                  }
                  ?>
                  </select>
    <br>
<br>
<label for="exampleInputName">Hall Id</label>
    <select name='hall_id'>
    <?php
    while($row=mysqli_fetch_assoc($sresult))
                  {
                  ?>
                  <option value="<?php echo $row['hall_id'];?>"><?php echo $row['hall_id'];?></option>
                  <?php
                  }
                  ?>
                  </select>
<br>
<div class="form-group">
    <label for="exampleInputName">Timings</label>
    <input type="text" class="form-control" name="timings" placeholder="timings">
</div>
<br>
<div class="form-group">
    <label for="exampleInputName">Date</label>
    <input type="text" class="form-control" name="date" placeholder="Date">
</div>
<br>
  <input type="submit" name="Update" value="Update" class="btn btn-primary"></input>
</form>
</body>
</html>