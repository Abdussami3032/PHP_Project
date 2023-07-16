<?php
include ("../connection.php");
if(isset($_POST['Insert']))
{
    $category = $_POST['category'];

    $query="INSERT INTO `movie_cat`(`category`) VALUES ('$category')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:categories.php');
    }
    else
    {
        echo "<script>alert('Error =".mysqli_error($conn)."')";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Add Movie Category</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputName">Category</label>
    <input type="text" class="form-control" name="category" placeholder="Category">
    <br>
  <input type="submit" name="Insert" value="Insert" class="btn btn-primary"></input> 
</form>
</body>