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
$squery ="SELECT * FROM `screening`";
$sresult = mysqli_query($conn,$squery);
$mquery = "SELECT * FROM `screening` RIGHT JOIN movie on screening.screening_id=movie.movie_id RIGHT JOIN halls on screening.screening_id=halls.hall_id";
$mresult =mysqli_query($conn,$mquery);
if(!$sresult)
{
    echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
}
?>

<a href="insert.php" class="btn btn-success">Add Screening</a>
<table class="table table-bordered">
    <tr>
        <th>screening Id </th>
        <th>movie Id</th>
        <th>Hall Id</th>
        <th>Date</th>
        <th>Time</th>

        <th>Action</th>
    </tr>
<?php
while($row=mysqli_fetch_assoc($sresult))
{
?>
    <tr>
        <td><?php echo $row['screening_id'];?></td>
        <td><?php echo $row['movie_id'];?></td>
        <td><?php echo $row['hall_id'];?></td>
        <td><?php echo $row['timings'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><a href="edit.php?id=<?php echo $row['screening_id'];?>" class="btn btn-success">Edit screening</a><a href="delete.php?id=<?php echo $row['screening_id'];?>" class="btn btn-danger">Delete screening</a></td>
    </tr>
<?php } ?>
</table>
</body>
</html>