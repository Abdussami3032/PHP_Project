<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $query = "SELECT * FROM `seat_type`";
$result = mysqli_query($conn,$query);
 
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $(document).on('click','#btnEdit',function(){
        var id=$(this).val();
        var row=$(this).closest('tr');
        $('#id').val(row.find("td:eq(0)").text());
        $('#seat_name').val(row.find("td:eq(1)").text());
        $('#Insert').hide();
        $('#Edit').show();
      });
    });
</script>

<title>Seat Type</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Seat Type</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Seat Type</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-body row">
          <div class="col-12">
          <form method="POST" action="Dbtype.php">
          <input type="hidden" class="form-control" name="id" id="id" placeholder="Type">
  <div class="form-group">
    <label for="exampleInputName">Seat_type</label>
    <input type="text" class="form-control" name="seat_name" id="seat_name" placeholder="seat_type">
    <br>
  <button type="submit" name="Insert" value="submit" class="btn btn-primary">Insert</button>
  <input type="submit" name="Edit" id="Edit" value="Edit" class="btn btn-primary" style="display:none;"></input>
</form>
          </div>
        </div>
      </div>
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Seat Type Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Seat Type Id</th>
                    <th>Seat Type</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>
                  <tr>
                  <td><?php echo $row['type_id']; ?></td>
					<td><?php echo $row['seat_name']; ?></td>
					<td><button class="btn btn-success" id="btnEdit" value=<?php echo $row['type_id'];?>>Edit</button>&nbsp;<a class="btn btn-danger" href="typedelete.php?id=<?php echo $row['type_id']; ?>">Delete</a></td>
					</tr>	
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Seat Type Id</th>
                    <th>Seat Type</th>
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