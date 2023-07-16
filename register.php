<?php
include('header.php');
	if (isset($_POST['btnsubmit'])) {
        include "connection.php";
		$name= $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$contact_no = $_POST['contactno'];

		$sql = "INSERT INTO `customer`(`cust_name`, `cust_email`, `cust_password`, `cust_contact_no`) VALUES ('$name','$email','$password','$contact_no')";
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}
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
				<h4 class="sub-title text-center">Register</h4>
				<h3 class="hny-title mb-0">Please Fill The form</h3>
			</div>
			<div class="contact-view mt-lg-5 mt-4">
			  <div class="conhny-form-section">
				<form method="post" class="formhny-sec">
						<div class="form-grids">
							<div class="form-input">
								<input type="text" name="name" placeholder="Enter Your Name *" required="" />
							</div>
							<div class="form-input">
								<input type="password" name="password" placeholder="Enter Password " required />
							</div>
							<div class="form-input">
								<input type="email" name="email"  placeholder="Enter Your E-mail *"
									required />
							</div>
							<div class="form-input">
								<input type="text" name="contactno" placeholder="Enter Your Phone Number *"
									required />
							</div>
						</div>
						<div class="submithny text-right mt-4">
                        <input type="submit" name="btnsubmit" value="Register" class="btn btn-primary"></input>
						</div>
					</form>
			  </div>
	  </section>
	  <!-- /contact1 -->
<?php
header('location:index.php');
include('footer.php');
?>
