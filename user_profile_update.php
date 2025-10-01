<?php include'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Update Profile : Ayurved</title>
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
							<li class="active"><a href="#">Update Profile</a></li>
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
						<h2>Update Your Profile</h2>
						<p>Please update form to continued</p>
						<form class="form" method="post">
							<?php 
							     $user_query=mysqli_query($connect,"select * from tbl_user where fld_user_email='".$_SESSION['email']."' ")or die (mysqli_error($connect));

							    $fetch=mysqli_fetch_array($user_query);
							    extract($fetch);

							  ?>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Name<span>*</span></label>
										<input type="text" class="form-control" name="user_name" value="<?php echo $fetch['fld_user_name'];?>" required=""> 
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Email<span>*</span></label>
										<input type="email" class="form-control" name="user_email" placeholder="Enter Email" required="" value="<?php echo $fetch['fld_user_email'];?>"> 
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Date Of Birth<span>*</span></label>
										<input type="date" value="<?php echo $fetch['fld_user_dob'];?>" class="form-control" name="user_dob" required=""> </div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Mobile Number<span>*</span></label>
								 		<input type="text" value="<?php echo $fetch['fld_user_mobileno'];?>" class="form-control" name="user_mobileno"  maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}"  maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required=""> </div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Address<span>*</span></label>
										<textarea class="form-control" name="user_address" placeholder="Enter Address" required=""><?php echo $fetch['fld_user_address'];?></textarea>
									</div>
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
			$adsf="update tbl_user set 
            fld_user_name='".$user_name."',
            fld_user_email='".$user_email."',
            fld_user_dob='".$user_dob."',
            fld_user_mobileno='".$user_mobileno."',
            fld_user_address='".$user_address."'
            where fld_user_id='".$_SESSION['id']."'";  
      
            $update=mysqli_query($connect,$adsf) or die(mysqli_error($connect));
             
            if($update)
            {
               echo '<script type="text/javascript">';
               echo " alert('Profile Updated Successfully');";
               echo 'window.location.href = "user_dashboard.php";';
               echo '</script>';
      
            }
            else
            {
               echo '<script type="text/javascript">';
               echo "alert('Not Update');";
               echo '</script>';
            }       
    }
?>