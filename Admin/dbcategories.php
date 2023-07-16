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

if(isset($_POST['Edit']))
{
$id =$_POST['id'];
$category = $_POST['category'];

    $query="UPDATE `movie_cat` SET `category`='$category' WHERE `cat_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:categories.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>