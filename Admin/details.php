<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $hquery ="SELECT * FROM halls";
 $hresult = mysqli_query($conn,$hquery);
 $squery ="SELECT * FROM seat_type";
 $sresult = mysqli_query($conn,$squery);
 $mquery = "SELECT * FROM seat_detail JOIN halls ON seat_detail.hall_id=halls.hall_id JOIN seat_type on seat_detail.seat_type=seat_type.type_id";
 $mresult =mysqli_query($conn,$mquery);
 $query = "SELECT * FROM `seat_detail` where detail_status='active'";
 $result = mysqli_query($conn,$query);
 ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $(document).on('click','#btnEdit',function(){
        var id=$(this).val();
        var row=$(this).closest('tr');
        $('#id').val(row.find("td:eq(0)").text());
        $('#hall_id').val(row.find("td:eq(1)").text());
        $('#seat_type').val(row.find("td:eq(2)").text());
        $('#price').val(row.find("td:eq(3)").text());
        $('#sno_of_seats').val(row.find("td:eq(4)").text());
        $('#Insert').hide();
        $('#Edit').show();
      });
    });
</script>

<title>Seat Details</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Seat Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Seat Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-12">
          <form method="POST" action="Dbdetails.php">
          <input type="hidden" class="form-control" name="id" id="id" placeholder="Details">
  <div class="form-group">
    <label for="exampleInputName">Hall_id</label>
    <select name="hall_id" id="hall_id">
        
    <?php
                  while($row=mysqli_fetch_assoc($hresult))
                  {
                  ?>
                  <option value="<?php echo $row['hall_id'];?>"><?php echo $row['hall_name'];?></option>
                  <?php
                  }
                  ?>
    </select>
</div>
<div class="form-group">
    <label for="exampleInputName">Seat_type</label>
    <select name="seat_type" id="seat_type">
        
    <?php
                  while($row=mysqli_fetch_assoc($sresult))
                  {
                  ?>
                  <option value="<?php echo $row['type_id'];?>"><?php echo $row['seat_name'];?></option>
                  <?php
                  }
                  ?>
    </select>
</div>
<div class="form-group">
    <label for="exampleInputName">Price</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="price">
</div>
<div class="form-group">
    <label for="exampleInputName">No Of Seats</label>
    <input type="text" class="form-control" name="sno_of_seats" id="sno_of_seats" placeholder="no of seats">
</div>
  <button type="submit" name="Insert" value="submit" class="btn btn-primary">Insert</button>
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
                  <th>Seat id</th>   
		<th>Hall id</th>
		<th>Seat Type</th>
		<th>Price</th>
		<th>No of Seats</th>
		<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
			while ($row = mysqli_fetch_assoc($mresult)) {
                ?>
                  <tr>
                  <td><?php echo $row['seat_id']; ?></td>
					<td value="<?php echo $row['hall_id'];?>"><?php echo $row['hall_name'];?></td>
					<td value="<?php echo $row['type_id'];?>"><?php echo $row['seat_name'];?></td>
					<td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['no_of_seats']?></td>
					<td><button class="btn btn-success" id="btnEdit" value=<?php echo $row['seat_id'];?>>Edit</button>&nbsp;<a class="btn btn-danger" href="detaildelete.php?id=<?php echo $row['seat_id']; ?>">Expire</a></td>
					</tr>	
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Seat id</th>   
		<th>Hall id</th>
		<th>Seat Type</th>
		<th>Price</th>
		<th>No of Seats</th>
		<th>Action</th>
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