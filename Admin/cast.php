<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $mquery ="SELECT * FROM movies";
$mresult = mysqli_query($conn,$mquery);
$caquery = "SELECT * FROM casts JOIN movies ON casts.movie_id =movies.movie_id";
$caresult =mysqli_query($conn,$caquery);
$sql = "SELECT * FROM `casts`";
$result = $conn->query($sql);
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $(document).on('click','#btnEdit',function(){
        var id=$(this).val();
        var row=$(this).closest('tr');
        $('#id').val(row.find("td:eq(0)").text());
        $('#movie-id').val(row.find("td:eq(1)").text());
        $('#casts').val(row.find("td:eq(2)").text());
        $('#Insert').hide();
        $('#Edit').show();
      });
    });
</script>
<title>Cast</title> 
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
          <form action="Dbcast.php" method="POST">
          <input type="hidden" class="form-control" name="id" id="id" placeholder="Cast">
  <div class="form-group">
    <label for="exampleInputName">Movie</label>
    <select name='movie-id' id="movie-id">
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
<div class="form-group">
    <label>Cast</label>
    <input type="text" class="form-control" name="casts" id="casts" placeholder="Cast">
</div>

  <input type="submit" name="btnsubmit" value="Insert" class="btn btn-primary"></input>
  <input type="submit" name="Edit" id="Edit" value="Edit" class="btn btn-primary" style="display:none;"></input>
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
                  <th>Cast id</th>   
		<th>Movie title</th>
		<th>Cast</th>
        <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
while($mrow=mysqli_fetch_assoc($caresult))
{
?>
                  <tr>
                  <td><?php echo $mrow['cast_id']; ?></td>
					        <td value="<?php echo $mrow['movie_id'];?>"><?php echo $mrow['movie_title'];?></td>
                  <td><?php echo $mrow['cast_name']; ?></td>
					<td><button class="btn btn-info" id="btnEdit" value=<?php echo $mrow['cast_id'];?>>Edit</button></a>&nbsp;<a class="btn btn-danger" href="castdelete.php?id=<?php echo $mrow['cast_id']; ?>">Expire</a></td>
					</tr>	
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Cast id</th>   
		<th>Movie title</th>
		<th>Cast</th>
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
