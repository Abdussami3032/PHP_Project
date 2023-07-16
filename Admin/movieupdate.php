<?php 
include "../connection.php";
	$id = $_GET['id'];
	$ssql = "SELECT * FROM `movies`WHERE `movie_id`='$id'";
	$sresult = mysqli_query($conn,$ssql);
    $srow=mysqli_fetch_assoc($sresult);
    $cquery="SELECT * From `movie_cat`";
    $cresult=mysqli_query($conn,$cquery);
    
        if (isset($_POST['update'])) {
		
            $Movie_title= $_POST['movie_title'];
            if(!empty($_FILES['cover']['name']))
           {
             echo "Uploaded";
             if(is_uploaded_file($_FILES['cover']['tmp_name']))
             {
              $Cover=addslashes(file_get_contents($_FILES['cover']['tmp_name']));
            $Description =$_POST['description'];
            $Relase_Date = $_POST['relase-date'];
            $Trailer=$_POST['tralier'];
            $Director=$_POST['directors'];
            $Duration=$_POST['duration'];
            $Category=$_POST['category'];
             
            $sql = "UPDATE `movies` SET `movie_title`='$Movie_title',`Cover`='$Cover',`description`='$Description',`relase_date`='$Relase_Date',`trailer`='$Trailer',`director`='$Director',`duration`='$Duration',`cat_id`='$Category' WHERE movie_id='$id'";
            $result = mysqli_query($conn,$sql);
             }
            }
             else{
                 echo "not uploded";
             }
            if ($result) {
                header('location:movies.php');
            }else{
                echo "Error:" . $sql . "<br>" . $conn->error;
            }
            
        }
	

?>
<!DOCTYPE html>
<html>
<title>Movie update</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<h2>Movie update</h2>

<form  method="POST" enctype="multipart/form-data">
  <div class="form-group">
  <label for="exampleInputName">movie_title</label>
  <input type="text" class="form-control" name="movie_title" placeholder="Movie Title" value="<?php echo $srow['movie_title']; ?>">
		    <input type="hidden" name="movie_id" value="<?php echo $srow['movie_id']; ?>">
</div>
<div class="form-group">
    <label>Cover</label>
    <input type="file" class="form-control" name="cover" id="fileToUpload" placeholder="Cover">
</div>
<div class="form-group">
    <label for="exampleInputName">Description</label>
    <input type="text" class="form-control" name="description" placeholder="Description" value="<?php echo $srow['description']; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Relase Date</label>
    <input type="text" class="form-control" name="relase-date" placeholder="Relase Date"value="<?php echo $srow['relase_date']; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Trailer</label>
    <input type="text" class="form-control" name="trailer" placeholder="Trailer" value="<?php echo $srow['trailer']; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Directors</label>
    <input type="text" class="form-control" name="directors" placeholder="Directors"value="<?php echo $srow['director']; ?>">
</div>
<div class="form-group">
    <label for="exampleInputName">Duration</label>
    <input type="text" class="form-control" name="duration" placeholder="Duration" value="<?php echo $srow['duration']; ?>">
</div>

<div class="form-group">
    <label for="exampleInputName">Category</label>
    <select name="category">
        
    <?php
                  while($row=mysqli_fetch_assoc($cresult))
                  {
                  ?>
                  <option value="<?php echo $row['cat_id'];?>"><?php echo $row['category'];?></option>
                  <?php
                  }
                  ?>
    </select>
</div>
  <input type="submit" name="update" value="Submit" class="btn btn-primary"></input>
</form>
</body>