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
							<li class="active"><a href="#">User Login</a></li>
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
						<h2>Welcome To Ayurved</h2>
						<p>Login with email & password</p>
						<form class="form" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Email<span>*</span></label>
										<input type="email" name="user_email" placeholder="Enter User Email" required="required"> 
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Password<span>*</span></label>
										<input type="password" name="user_password" placeholder="Enter Password" required="required"> </div>
								</div>
								<div class="col-12">
									<div class="form-group login-btn">
										<button class="btn" name="login" type="submit">Submit</button>
									</div>
								</div>
								<p>Don't have an account? <a href="user_register.php">Register.</a></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include'footer.php';?>


<?php

    if(isset($_POST['login']))
    {
        extract($_POST);

        $email=mysqli_real_escape_string($connect,$_POST['user_email']);
        $password=mysqli_real_escape_string($connect,$_POST['user_password']);
        
        $log=mysqli_query($connect,"select * from tbl_user where fld_user_email='$email' and fld_user_password='$password'") or die (mysqli_error($connect));
            
        if(mysqli_num_rows($log)>0)
        {	
        	$fetch=mysqli_fetch_array($log);
	        $_SESSION['id']=$fetch['fld_user_id'];
	        $_SESSION['email']=$fetch['fld_user_email'];            
	        
	        echo "<script>";
	        echo "alert('Login Successfull');";
	        echo 'window.location.href="index.php";';
	        echo "</script>";
	   
        }
        else
        {
            echo "<script>";
            echo "alert('Login Failed');";
            echo "</script>";
            
        }
        
    }

?>