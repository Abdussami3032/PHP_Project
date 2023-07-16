<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $cquery ="SELECT * FROM customer";
 $cresult = mysqli_query($conn,$cquery);
 
 ?>

<title>Customer</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customer Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Customer E-mail</th>
                    <th>Customer Contact Number</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
while($row=mysqli_fetch_assoc($cresult))
{
?>
                  <tr>
                  <td><?php echo $row['cust_id']; ?></td>
                  <td><?php echo $row['cust_name']; ?></td>
					<td><?php echo $row['cust_email']; ?></td>
					<td><?php echo $row['cust_contact_no']; ?></td>
                  </tr>
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Customer E-mail</th>
                    <th>Customer Contact Number</th>
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