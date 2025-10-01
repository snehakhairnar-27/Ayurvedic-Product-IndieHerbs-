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
							<li class="active"><a href="#">User Dashboard</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
  <?php 
     $user_query=mysqli_query($connect,"select * from tbl_user where fld_user_email='".$_SESSION['email']."' ")or die (mysqli_error($connect));

    $fetch=mysqli_fetch_array($user_query);
    extract($fetch);

  ?>
    <section class="shop section">
      <div class="container">
        <div class="row">
         <div class="col-lg-3 mb-4">
              <div class="account-sidebar">
                <h6 class="sidebar-title">DASHBOARD</h6>
                <div class="sidebar-list">
                  <a href="order_list.php" class="active">
                    <?php 
                          $query_sprofile2="select * from tbl_order_add where fld_user_id='".$_SESSION['id']."' and fld_order_delete=0 order by fld_order_id desc";
                          $view_sprofile2=mysqli_query($connect,$query_sprofile2);
                      ?>
                    <i class="far fa-shopping-bag"></i> Orders <span><?php echo mysqli_num_rows($view_sprofile2) ?></span>
                  </a>
                  <a href="wishlist_view.php">
                    <?php 
                          $query_wishlist="select * from tbl_wishlist where fld_user_id='".$_SESSION['id']."' and fld_wishlist_status=0 order by fld_wishlist_id desc";
                          $view_wishlist=mysqli_query($connect,$query_wishlist);
                      ?>
                    <i class="far fa-heart"></i> Wishlist <span><?php echo mysqli_num_rows($view_wishlist) ?></span>
                  </a>
                  <a href="cart.php">
                     <?php 
                          $query_sprofile1="select * from tbl_cart where fld_user_id='".$_SESSION['id']."' and fld_product_status='In_cart' order by fld_cart_id desc";
                          $view_sprofile1=mysqli_query($connect,$query_sprofile1);
                      ?>
                    <i class="far fa-shopping-cart"></i> Cart <span><?php echo mysqli_num_rows($view_sprofile1) ?></span>
                  </a>
                </div>
                <h6 class="sidebar-title mt-4">PROFILE SETTINGS</h6>
                <div class="sidebar-list">
                  <a href="user_profile_update.php">
                    <i class="far fa-user"></i> Profile Update </a>
                  <a href="user_change_password.php">
                    <i class="far fa-lock"></i> Change Password
                  </a>
                </div>
              </div>
            </div>
          <div class="col-lg-9">
            <div class="account-content bg-white pt-0">
              <h4 class="account-content-title">
                <i class="far fa-user"></i> My Profile
              </h4>
              <div class="profile-info">
                <div class="row">
                  <div class="col-lg-5 mb-4">
                    <div class="profile-sidebar">
                      <div class="profile-title">
                        <div>
                          <h6><?php echo $fetch['fld_user_name'];?></h6>
                          <p>Date Of Birth : <span> <?php echo $fetch['fld_user_dob'];?> </span>
                          </p>
                        </div>
                        <div class="profile-status"> PREMIUM USER </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="row">
                      <div class="col-lg-6 mb-4">
                        <div class="profile-widget">
                          <?php 
                            $query_sprofile22="select * from tbl_order_add where fld_user_id='".$_SESSION['id']."' and fld_order_status='Product Delivered' and fld_order_delete=0 order by fld_order_id desc";
                            $view_sprofile22=mysqli_query($connect,$query_sprofile22);
                        ?>
                          <b><?php echo mysqli_num_rows($view_sprofile22) ?></b>
                          <p>Orders Confirm</p>
                        </div>
                      </div>
                      <div class="col-lg-6 mb-4">
                        <div class="profile-widget">
                          <?php 
                              $query_sprofile22="select * from tbl_order_add where fld_user_id='".$_SESSION['id']."' and fld_order_status='Processing Order' and fld_order_delete=0 order by fld_order_id desc";
                              $view_sprofile22=mysqli_query($connect,$query_sprofile22);
                          ?>
                          <b><?php echo mysqli_num_rows($view_sprofile22) ?></b>
                          <p>Orders Process</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile-details">
                <div class="row">
                  <div class="col-lg-3">
                    <p>Name</p>
                    <h6><?php echo $fetch['fld_user_name'];?> </h6>
                  </div>
                  <div class="col-lg-3">
                    <p>Email</p>
                    <h6>
                      <?php echo $fetch['fld_user_email'];?>
                    </h6>
                  </div>
                  <div class="col-lg-3">
                    <p>Pohne</p>
                    <h6><?php echo $fetch['fld_user_mobileno'];?></h6>
                  </div>
                  <div class="col-lg-3">
                    <p>Join Date & Time</p>
                    <h6><?php echo $fetch['fld_user_created_date'];?></h6>
                  </div>
                </div>
              </div>
              <div class="col-12 mt-5">
                <a href="user_profile_update.php" class="profile-btn">Edit Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<?php include'footer.php';?>
