<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $cquery ="SELECT * FROM halls where halls.hall_status='active'";
 $cresult = mysqli_query($conn,$cquery);
 
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $(document).on('click','#btnEdit',function(){
        var id=$(this).val();
        var row=$(this).closest('tr');
        $('#id').val(row.find("td:eq(0)").text());
        $('#name').val(row.find("td:eq(1)").text());
        $('#no_of_seat').val(row.find("td:eq(2)").text());
        $('#Insert').hide();
        $('#Edit').show();
      });
    });
</script>
<title>Halls</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halls</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Halls</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-body row">
          <div class="col-12">
          <form action="Dbhalls.php" method="POST">
          <input type="hidden" class="form-control" name="id" id="id" placeholder="Category">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="name">
</div>
<div class="form-group">
    <label for="exampleInputName">No_of_seat</label>
    <input type="text" class="form-control" name="no_of_seat" id="no_of_seat" placeholder="no_of_seat">
</div>
  <input type="submit" name="submit" value="Submit" class="btn btn-primary"></input>
  <input type="submit" name="Edit" id="Edit" value="Edit" class="btn btn-primary" style="display:none;"></input>
</form>
          </div>
        </div>
      </div>
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Halls Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Hall Id</th>
                    <th>Hall Name</th>
                    <th>Number Of Seats</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
while($row=mysqli_fetch_assoc($cresult))
{
?>
                  <tr>
                  <td><?php echo $row['hall_id']; ?></td>
                  <td><?php echo $row['hall_name']; ?></td>
                  <td><?php echo $row['hno_of_seats']; ?></td>
                  <td><button class="btn btn-info" id="btnEdit" value=<?php echo $row['hall_id']; ?>>Edit</button>&nbsp;<a class="btn btn-danger" href="halldelete.php?id=<?php echo $row['hall_id']; ?>">Expire</a></td>
                  </tr>
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Hall Id</th>
                    <th>Hall Name</th>
                    <th>Number Of Seats</th>
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