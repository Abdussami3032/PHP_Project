<?php
session_start();
if(isset($_POST['btnLogIn']))
{
    include('connection.php');
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="SELECT * FROM `customer` WHERE `cust_email`='$email' && `cust_password`='$password'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
       if(mysqli_num_rows($result)>0)
       {
            $row=mysqli_fetch_assoc($result);
            $_SESSION["customer"]=$row['cust_name'];
            $_SESSION["customerID"]=$row['cust_id'];
           header('location:index.php');
       }
    }else{
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
include('header.php');
?>
<!--/breadcrumbs -->
<div class="w3l-breadcrumbs">
		<nav id="breadcrumbs" class="breadcrumbs">
			<div class="container page-wrapper">
			<a href="index.php">Home</a> » <span class="breadcrumb_last" aria-current="page">Register</span>
			</div>
		</nav>
	</div>
 <!--//breadcrumbs -->
	  <!-- contact1 -->
	  <section class="w3l-contact-1">
		<div class="contacts-9 py-5">
		  <div class="container py-lg-4">
			<div class="headerhny-title text-center">
				<h4 class="sub-title text-center">Login</h4>
				<h3 class="hny-title mb-0">Login Here</h3>
			</div>
			<div class="contact-view mt-lg-5 mt-4">
			  <div class="conhny-form-section">
				<form method="post" class="formhny-sec">
                            <div class="form-input">
								<input type="email" name="email"  placeholder="Enter Your E-mail *"
									required />
							</div>
                            <br>
                            
							<div class="form-input">
								<input type="password" name="password" placeholder="Enter Password " required />
							</div>
						<div class="submithny text-right mt-4">
                        <input type="submit" name="btnLogIn" value="Log-In" class="btn btn-primary"></input>
						</div>
					</form>
			  </div>
	  </section>
	  <!-- /contact1 -->
<?php
include("footer.php");
?>