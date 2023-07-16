<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
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
        header('location:screening.php');
    }else{
        echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
    }
}


?>

<form method="post">
<label for="exampleInputName">Movie Id</label>
    <select name='movie_id'>
    <?php
    while($row=mysqli_fetch_assoc($sresult))
                  {
                  ?>
                  <option value="<?php echo $row['movie_id'];?>"><?php echo $row['movie_name'];?></option>
                  <?php
                  }
                  ?>
                  </select>
    <br>
    <label for="exampleInputName">Hall Id</label>
    <select name='hall_id'>
    <?php
    while($row=mysqli_fetch_assoc($sresult))
                  {
                  ?>
                  <option value="<?php echo $row['hall_id'];?>"><?php echo $row['hall_name'];?></option>
                  <?php
                  }
                  ?>
                  </select>
<br>
        <label for="appt">Select a time:</label>
        <input type="time" id="appt" name="appt" class="form-control">
                <br>
        <label>Enter date: </label>
        <input type="date" name="date" class="form-control"/>
        <br>
       
        <input type="submit" value="Add screening" name="btnAdd"/>
    </form>
</body>
</html>
