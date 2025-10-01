<?php include'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>User Register : Ayurved</title>
	<link rel="icon" type="image/png" href="images/favicon-logo.png">
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/niceselect.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/flex-slider.min.css">
	<link rel="stylesheet" href="assets/css/owl-carousel.css">
	<link rel="stylesheet" href="assets/css/slicknav.min.css">
	<link rel="stylesheet" href="assets/css/default.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css"> 
</head>
	

<body>
	<?php include'header.php';?>
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">User Register</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="shop login section">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 mx-auto">
					<div class="login-form">
						<h2>Create Your Account</h2>
						<p>Please fill all forms to continued</p>
						<form class="form" method="post">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Name<span>*</span></label>
										<input type="text" class="form-control" name="user_name" placeholder="Enter User Name" required=""> 
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Email<span>*</span></label>
										<input type="email" class="form-control" name="user_email" placeholder="Enter Email" required=""> 
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Password<span>*</span></label>
										<input type="password" class="form-control" name="user_password" placeholder="Enter Password" required=""> </div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Date Of Birth<span>*</span></label>
										<input type="date" class="form-control" name="user_dob" required=""> </div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Mobile Number<span>*</span></label>
								 		<input type="text" class="form-control" name="user_mobileno" placeholder="Enter Mobile Number" maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}"  maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required=""> </div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Address<span>*</span></label>
										<textarea class="form-control" name="user_address" placeholder="Enter Address" required=""></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group login-btn">
										<button class="btn" name="submit" type="submit">Create Account</button>
									</div>
								</div>
								<p>Already have an account? <a href="user_login.php">Login.</a></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include'footer.php';?>


    
<?php
	if(isset($_POST['submit']))
	{

	  extract($_POST);

	  $asd1=mysqli_query($connect,"select * from tbl_user where fld_user_email='".$_POST['user_email']."'");
	  $total_record=mysqli_num_rows($asd1);

	  if($total_record==1)
	  {
	      echo '<script type="text/javascript">';
	      echo " alert('Email Exist.');";
	      echo 'window.location.href = "user_register.php";';
	      echo '</script>';
	  }
	  else
	  {

	 	$add="insert into tbl_user(fld_user_name, fld_user_email, fld_user_password, fld_user_dob,  fld_user_mobileno, fld_user_address) 
	     values('$user_name','$user_email','$user_password','$user_dob','$user_mobileno','$user_address')";

	 	$asd = mysqli_query($connect,$add) or die(mysqli_error($connect));
	 
	   	if($asd)
	    {
	    
	      echo '<script type="text/javascript">';
	      echo " alert('User Register Successfully.');";
	      echo 'window.location.href = "user_login.php";';
	      echo '</script>';
	    }
	    else
	    {
	      echo '<script type="text/javascript">';
	      echo " alert('Record not insert.');";
	      echo 'window.location.href = "user_register.php";';
	      echo '</script>';
	    }
	
	  
	}

	}
?>

