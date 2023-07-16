<?php
include "../connection.php";
$mquery ="SELECT * FROM movies";
$mresult = mysqli_query($conn,$mquery);
$caquery = "SELECT * FROM casts RIGHT JOIN movies ON casts.cast_id =movies.movie_id";
$caresult =mysqli_query($conn,$caquery);

$id =$_GET['id'];
$query ="SELECT * FROM `casts` WHERE `cast_id`='$id'";
$result =mysqli_query($conn,$query);
$row =mysqli_fetch_row($result);
if(isset($_POST['Update']))
{
   
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
<!DOCTYPE html>
<html>
<title>Update Cast</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
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
    <label>Cast</label>
    <input type="text" class="form-control" name="casts" id="fileToUpload" placeholder="Cast">
    <br>
  <input type="submit" name="Update" value="Update" class="btn btn-primary"></button>
</form>
</body>
</html>