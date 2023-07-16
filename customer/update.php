<?php
include "../connection.php";
$id =$_GET['id'];
$query ="SELECT * FROM `customer` WHERE `cust_id`='$id'";
$result =mysqli_query($conn,$query);
$row =mysqli_fetch_row($result);
if(isset($_POST['Update']))
{
   
    $CustomerName = $_POST['name'];
    $CustomerEmail = $_POST['email'];
    $CustomerPassword = $_POST['password'];
    $CustomerContact = $_POST['contact'];
    $query="UPDATE `customer` SET `cust_name`='$CustomerName',`cust_email`='$CustomerEmail ',`cust_password`='$CustomerPassword',`cust_contact_no`='$CustomerContact' WHERE `cust_id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:customer.php');
    }
    else
    {
        echo "<script>alert('Error :".mysqli_error($conn)."') </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Update Customer</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form method="POST">
<div class="form-group">
    <label for="exampleInputName">Customer Name</label>
    <input type="text" class="form-control" name="name" placeholder="Customer Name">
    <br>
    <label for="exampleInputName">Customer Email</label>
    <input type="email" class="form-control" name="email" placeholder="Customer Email">
    <br>
    <label for="exampleInputName">Customer Password</label>
    <input type="password" class="form-control" name="password" placeholder="Customer Password">
    <br>
    <label for="exampleInputName">Customer Contact Number</label>
    <input type="text" class="form-control" name="contact" placeholder="Customer Contact Number">
    <br>
</div>
  <input type="submit" name="Update" value="Update" class="btn btn-primary"></input>
</form>
</body>
</html>