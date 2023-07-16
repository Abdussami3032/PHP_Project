<?php
 session_start();
 if(!isset($_SESSION['admin']))
 {
    header('location:login.php');
 }
 include('header.php');
 include('../connection.php');
 $cquery ="SELECT * FROM movie_cat where cat_status='active'";
 $cresult = mysqli_query($conn,$cquery);
 
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $(document).on('click','#btnEdit',function(){
        var id=$(this).val();
        var row=$(this).closest('tr');
        $('#id').val(row.find("td:eq(0)").text());
        $('#category').val(row.find("td:eq(1)").text());
        $('#Insert').hide();
        $('#Edit').show();
      });
    });
</script>
<title>Categories</title>
    <!-- Main content -->
    <section class="content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-body row">
          <div class="col-12">
          <form method="POST" action="dbcategories.php">
            
  <input type="hidden" class="form-control" name="id" id="id" placeholder="Category">
  <div class="form-group">
    <label for="exampleInputName">Category</label>
    <input type="text" class="form-control" name="category" id="category" placeholder="Category">
    <br>
  <input type="submit" name="Insert"  id="Insert" value="Insert" class="btn btn-primary"></input> 
  <input type="submit" name="Edit" id="Edit" value="Edit" class="btn btn-primary" style="display:none;"></input> 
</form>
          </div>
        </div>
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
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
while($row=mysqli_fetch_assoc($cresult))
{
?>
                  <tr>
                  <td><?php echo $row['cat_id']; ?></td>
                  <td><?php echo $row['category']; ?></td>
                  <td><button class="btn btn-info" id="btnEdit" value=<?php echo $row['cat_id']; ?>>Edit</button><a class="btn btn-danger" href="catdelete.php?id=<?php echo $row['cat_id']; ?>">Expire</a></td>
                  </tr>
                  <?php
}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Category Id</th>
                    <th>Category Name</th>
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