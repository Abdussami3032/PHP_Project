<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $hquery ="SELECT * FROM `halls`";
$hresult = mysqli_query($conn,$hquery);
$mquery = "SELECT * FROM movies ";
$mresult =mysqli_query($conn,$mquery);
$squery = "SELECT * FROM screening ";
$sresult =mysqli_query($conn,$squery);
$query="SELECT * FROM `screening` JOIN movies on screening.movie_id=movies.movie_id JOIN halls on screening.hall_id=halls.hall_id where screening.screening_stauts='active'";
$result=mysqli_query($conn,$query);
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $(document).on('click','#btnEdit',function(){
        var id=$(this).val();
        var row=$(this).closest('tr');
        $('#id').val(row.find("td:eq(0)").text());
        $('#movie_id').val(row.find("td:eq(1)").text());
        $('#hall_id').val(row.find("td:eq(2)").text());
        $('#appt').val(row.find("td:eq(3)").text());
        $('#date').val(row.find("td:eq(4)").text());
        $('#Insert').hide();
        $('#Edit').show();
      });
    });
</script>
<title>Screening</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Screening</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Screening</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-12">
          <form method="post" action="Dbscreen.php">
          <input type="hidden" class="form-control" name="id" id="id" placeholder="Cast">
<label for="exampleInputName">Movie Id</label>
    <select name='movie_id'id='movie_id'>
    <?php
    while($mrow=mysqli_fetch_assoc($mresult))
                  {
                  ?>
                  <option value="<?php echo $mrow['movie_id'];?>"><?php echo $mrow['movie_title'];?></option>
                  <?php
                  }
                  ?>
                  </select>
    <br>
    <label for="exampleInputName">Hall Id</label>
    <select name='hall_id'id='hall_id'>
    <?php
    while($hrow=mysqli_fetch_assoc($hresult))
                  {
                  ?>
                    <option value="<?php echo $hrow['hall_id'];?>"><?php echo $hrow['hall_name'];?></option>
                  <?php
                  }
                  ?>
                  </select>
<br>
        <label for="appt">Select a time:</label>
        <input type="time" id="appt" name="appt" class="form-control">
                <br>
        <label>Enter date: </label>
        <input type="date" name="date" id="date" class="form-control"/>
        <br>
       
        <input type="submit" value="Add screening" name="btnAdd"/>
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
                    <th>Screening Id</th>
                    <th>Movie Title</th>
                    <th>Hall Name</th>
                    <th>Timings</th>
                    <th>Show Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                  while($row=mysqli_fetch_assoc($result))
{
?>
    <tr>
        <td><?php echo $row['screening_id'];?></td>
        <td value="<?php echo $row['movie_id'];?>"><?php echo $row['movie_title'];?></td>
        <td value="<?php echo $row['hall_id'];?>"><?php echo $row['hall_name'];?></td>
        <td><?php echo $row['timings'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><button class="btn btn-success" id="btnEdit" value=<?php echo $row['screening_id'];?>>Edit</button><a href="screeningdelete.php?id=<?php echo $row['screening_id'];?>" class="btn btn-danger">Delete screening</a></td>
    </tr>
<?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Screening Id</th>
                  <th>Movie Title</th>
                    <th>Hall Name</th>
                    <th>Timings</th>
                    <th>Show Date</th>
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