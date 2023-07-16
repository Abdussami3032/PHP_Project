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
$query="SELECT * FROM `review` right join customer on customer.cust_id=review.review_id right join movies on movies.movie_id=review.review_id ";
$result=mysqli_query($conn,$query);
if(!$result)
{
    echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
}
?>

<a href="reviewAdd.php" class="btn btn-success">Add Review </a>
<table class="table table-bordered">
    <tr>
        <th>Review Id </th>
        <th>Customer Id</th>
        <th>Review</th>
        <th>Rating</th>
        <th>movie_id</th>
        <th>Action</th>
    </tr>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>
    <tr>
        <td><?php echo $row['review_id'];?></td>
        <td><?php echo $row['cust_id'];?></td>
        <td><?php echo $row['Review'];?></td>
        <td><?php echo $row['rating'];?></td>
        <td><?php echo $row['movie_id'];?></td>
        <td><a href="reviewEdit.php?id=<?php echo $row['review_id'];?>" class="btn btn-success">Edit revies</a><a href="reviewDelete.php?id=<?php echo $row['review_id'];?>" class="btn btn-danger">Delete Review</a></td>
    </tr>
<?php } ?>
</table>
</body>
</html>