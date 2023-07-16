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
    <title>Reviews</title>
</head>
<body>
<?php
include('../connection.php');
$squery ="SELECT * FROM `customer`,`movies`";
$sresult = mysqli_query($conn,$squery);
$mquery = "SELECT * FROM `review` RIGHT JOIN customer on review.review_id=customer.cust_id RIGHT JOIN movie on review.review_id=movies.movie_id";
$mresult =mysqli_query($conn,$mquery);

$Dquery="SELECT * FROM `review`";
$Dresult=mysqli_query($conn,$Dquery);


if(isset($_POST['btnAdd']))
{
    $cust_id=$_POST['cust_id'];
    $review=$_POST['txtreview'];
    $rating=$_POST['txtrating'];
    $movie_id=$_POST['movie_id'];

    $query="INSERT INTO `review`(`cust_id`, `review`, `rating`, `movie_id`) VALUES ('$cust_id','$review','$rating','$movie_id')";

    
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:EmployeeView.php');
    }else{
        echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
    }
}


?>

<form method="post" class="container">
<label for="exampleInputName">Customer Id</label>
    <select name='cust_id'>
    <?php
    while($row=mysqli_fetch_assoc($sresult))
                  {
                  ?>
                  <option value="<?php echo $row['cust_id'];?>"><?php echo $row['cust_name'];?></option>
                  <?php
                  }
                  ?>
                  </select>
    <br>
        <label>Enter reviews : </label>
        <input type="text" name="txtreview" class="form-control"/>
        <br>
        <label>Enter rating: </label>
        <input type="text" name="txtrating" class="form-control"/>
        <br>
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
        <input type="submit" value="Add review" name="btnAdd"/>
    </form>
</body>
</html>





