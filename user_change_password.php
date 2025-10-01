<?php include'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Update Password : Ayurved</title>
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
							<li><a href="user_dashboard.php">User Dashboard<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">Update Password</a></li>
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
						<h2>Welcome To Cartridgewala</h2>
						<p>Update Password</p>
						<form class="form" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Old Password<span>*</span></label>
										<input type="password" name="old_password" placeholder="Enter Old Password" required="required"> 
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>New Password<span>*</span></label>
										<input type="password" name="new_password" placeholder="Enter New Password" required="required"> </div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Retype New Password<span>*</span></label>
										<input type="password" name="retype_password" placeholder="Enter Re-type New Password" required="required"> </div>
								</div>
								<div class="col-12">
									<div class="form-group login-btn">
										<button class="btn" name="update" type="submit">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include'footer.php';?>


<?php
    if(isset($_POST['update'])) 

    {
     extract($_POST);
     $updt = 'select * from tbl_user where fld_user_password="'.$_POST['old_password'].'" and fld_user_email ="'.$_SESSION['email'].'"';

    $res=mysqli_query($connect,$updt);

    if(mysqli_num_rows($res)>0)
    {

        if(strlen($_POST['new_password'])>=5 )
          {
              if($_POST['new_password']==$_POST['retype_password'])
              {
                $query1='update tbl_user set fld_user_password="'.$_POST['new_password'].'" where fld_user_email ="'.$_SESSION['email'].'" ';   
                  $res=mysqli_query($connect,$query1);

                  echo '<script type="text/javascript">';
                  echo 'alert("password changed Successfully !!!! ");';
                  echo 'window.location.href = "user_logout1.php";';
                  echo '</script>';
              }
              else
              {
              echo '<script type="text/javascript">';
              echo 'alert(" password is not matched...try again !!!! ");';
              echo 'window.location.href = "user_change_password.php";';
              echo '</script>';
              }
          }
          else
          {
              echo '<script type="text/javascript">';
              echo 'alert("password length not match");';
              echo 'window.location.href = "user_change_password.php";';
              echo '</script>';
          }
    } 
    else
    {
        echo '<script type="text/javascript">';
        echo 'alert("Old password is not matched...try again ");';
        // $query1;
        echo 'window.location.href = "user_change_password.php";';
        echo '</script>';
               

    }
    }
?>