<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $cquery ="SELECT * FROM movie_cat";
 $cresult = mysqli_query($conn,$cquery);
 $mquery = "SELECT * FROM movies JOIN movie_cat ON movies.cat_id=movie_cat.cat_id where movies.movie_status='active'";
 $mresult =mysqli_query($conn,$mquery);
 ?>

<title>Movies</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Movies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Movies</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-12">
           <form method="post" enctype="multipart/form-data" action="DbMovies.php">
           <div class="form-group">
    <label for="exampleInputName">Movie-Title</label>
    <input type="text" class="form-control" name="movie-title" placeholder="Movie-title">
</div>
<div class="form-group">
    <label>Cover</label>
    <input type="file" class="form-control" name="cover" id="fileToUpload" placeholder="Cover">
</div>
<div class="form-group">
    <label for="exampleInputName">Description</label>
    <input type="text" class="form-control" name="description" placeholder="Description">
</div>
<div class="form-group">
    <label for="exampleInputName">Relase Date</label>
    <input type="date" class="form-control" name="relase-date" placeholder="Relase Date">
</div>
<div class="form-group">
    <label for="exampleInputName">Trailer</label>
    <input type="text" class="form-control" name="trailer" placeholder="Trailer">
</div>
<div class="form-group">
    <label for="exampleInputName">Directors</label>
    <input type="text" class="form-control" name="directors" placeholder="Directors">
</div>
<div class="form-group">
    <label for="exampleInputName">Duration</label>
    <input type="text" class="form-control" name="duration" placeholder="Duration">
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
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Add Movies" name="btnAdd">
            </div>
           </form>
          </div>
        </div>
      </div>
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Movie Id</th>
                    <th>Movie Title</th>
                    <th>Movie Cover</th>
                    <th>Movie Description</th>
                    <th>Relase Date</th>
                    <th>trailer</th>
                    <th>Directors</th>
                    <th>Duration</th>
                    <th>Category</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
while($mrow=mysqli_fetch_assoc($mresult))
{
?>
                  <tr>
                     <td><?php echo $mrow['movie_id']; ?></td>
					           <td><?php echo $mrow['movie_title']; ?></td>
					           <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($mrow['Cover'])?>" width="100px"height="100px"/></td>
					          <td><?php echo $mrow['description']; ?></td>
                    <td><?php echo $mrow['relase_date']; ?></td>
                    <td><?php echo $mrow['trailer']; ?></td>
                    <td><?php echo $mrow['director']; ?></td>
                    <td><?php echo $mrow['duration']; ?></td>
                    <td><?php echo $mrow['category'];?></td>
                    <td><a class="btn btn-info" href="movieupdate.php?id=<?php echo $mrow['movie_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="moviedelete.php?id=<?php echo $mrow['movie_id']; ?>">Expire</a></td>
                  </tr>
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Movie Id</th>
                    <th>Movie Title</th>
                    <th>Movie Cover</th>
                    <th>Movie Description</th>
                    <th>Relase Date</th>
                    <th>trailer</th>
                    <th>Directors</th>
                    <th>Duration</th>
                    <th>Category</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php
 include('footer.php');

 ?>