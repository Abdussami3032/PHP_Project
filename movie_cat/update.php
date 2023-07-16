<?php
include "../connection.php";
$id =$_GET['id'];
$query ="SELECT * FROM `movie_cat` WHERE `cat_id`='$id'";
$result =mysqli_query($conn,$query);
$row =mysqli_fetch_row($result);
if(isset($_POST['Update']))
{
   
    $category = $_POST['category'];
    $query="UPDATE `movie_cat` SET `category`='$category' WHERE `cat_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:seats_details.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Update Category</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
<div class="form-group">
    <label for="exampleInputName">Category</label>
    <input type="text" class="form-control" name="category" placeholder="Category">
</div>
  <input type="submit" name="Update" value="Update" class="btn btn-primary"></input>
</form>
</body>
</html>