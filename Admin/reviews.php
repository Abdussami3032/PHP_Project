<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $query="SELECT * FROM `review` join customer on customer.cust_id=review.cust_id  join movies on movies.movie_id=review.movie_id ";
$result=mysqli_query($conn,$query);
 
 ?>

<title>Reviews</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reviews</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Reviews</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Review Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Review Id</th>
                    <th>Customer Name</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Movie Title<th>
                  </tr>
                  </thead>
                  <tbody>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>
                  <tr>
                  <td><?php echo $row['review_id'];?></td>
        <td><?php echo $row['cust_id'];?></td>
        <td><?php echo $row['review'];?></td>
        <td><?php echo $row['rating'];?></td>
        <td><?php echo $row['movie_id'];?></td>
    </tr>
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Review Id</th>
                    <th>Customer Name</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Movie Title<th>
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