<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include "../connection.php";
$cquery ="SELECT * FROM customer";
$cresult = mysqli_query($conn,$cquery);
$squery ="SELECT * FROM screening";
$sresult = mysqli_query($conn,$squery);
$sdquery ="SELECT * FROM seat_detail JOIN seat_type ON seat_detail.seat_type=seat_type.type_id";
$sdresult = mysqli_query($conn,$sdquery);
$tquery="SELECT * FROM tickets";
$tresult=mysqli_query($conn,$tquery);

 ?>

<title>Tickets</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tickets</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Tickets</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-12">
          <form method="POST">
  <div class="form-group">
    <label for="exampleInputName">Customer</label>
    <select name="cust_id">
        
    <?php
                  while($crow=mysqli_fetch_assoc($cresult))
                  {
                  ?>
                  <option value="<?php echo $crow['cust_id'];?>"><?php echo $crow['cust_name'];?></option>
                  <?php
                  }
                  ?>
    </select>
    <br>
<div class="form-group">
    <label for="exampleInputName">Screen</label>
    <select name="screen_id">
        
        <?php
                      while($srow=mysqli_fetch_assoc($sresult))
                      {
                      ?>
                      <option value="<?php echo $srow['screening_id'];?>"><?php echo $srow['screening_id'];?></option>
                      <?php
                      }
                      ?>
        </select>
    <br>
</div>
<div class="form-group">
    <label for="exampleInputName">Seat</label>
    <select name="seat_id">
        
    <?php
                  while($sdrow=mysqli_fetch_assoc($sdresult))
                  {
                  ?>
                  <option value="<?php echo $sdrow['seat_id'];?>"><?php echo $sdrow['seat_name'];?></option>
                  <?php
                  }
                  ?>
    </select>
    <br>
</div>
<div class="form-group">
    <label for="exampleInputName">Number of Seats</label>
    <input type="text" class="form-control" name="no_of_seats" placeholder="Number of Seats">
    <br>
</div>
<div class="form-group">
    <label for="exampleInputName">Date Of Booking</label>
    <input type="date" class="form-control" name="date_of_booking" placeholder="Date Of Booking">
    <br>
</div>
<div class="form-group">
    <label for="exampleInputName">Total Bill</label>
    <input type="text" class="form-control" name="total_bill" placeholder="Total Bill">
    <br>
</div>
  <button type="submit" name="Insert" value="submit" class="btn btn-primary">Insert</button>
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
                    <th>Ticket Id</th>
                    <th>Customer Name</th>
                    <th>Sceen Name</th>
                    <th>Seat Name</th>
                    <th>Number Of Seats</th>
                    <th>Date Of Booking</th>
                    <th>Total Bill</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
while($trow=mysqli_fetch_assoc($tresult))
{
?>
                  <tr>
                  <td><?php echo $trow['ticket_id']; ?></td>
					<td><?php echo $trow['cust_id']; ?></td>
                    <td><?php echo $trow['screen_id']; ?></td>
                    <td><?php echo $trow['seat_id']; ?></td>
                    <td><?php echo $trow['no_of_seat']; ?></td>
                    <td><?php echo $trow['date_of_booking']; ?></td>
                    <td><?php echo $trow['total_bill']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $trow['ticket_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $trow['ticket_id']; ?>">Delete</a></td>
					</tr>	
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Ticket Id</th>
                    <th>Customer Name</th>
                    <th>Sceen Name</th>
                    <th>Seat Name</th>
                    <th>Number Of Seats</th>
                    <th>Date Of Booking</th>
                    <th>Total Bill</th>
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