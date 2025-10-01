<?php include'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Wishlist : Ayurved</title>
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
							<li class="active"><a href="#">Wishlist</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		$view = mysqli_query($connect,"select p.*,w.* from tbl_product p,tbl_wishlist w where p.fld_product_id=w.fld_product_id and w.fld_wishlist_status=0 and w.fld_user_id='".$_SESSION['id']."' group by w.fld_wishlist_id  order by w.fld_wishlist_id asc") or die (mysqli_error($connect));
	?>
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
	          <div class="col-lg-3 mb-4">
	            <div class="account-sidebar">
	              <h6 class="sidebar-title">DASHBOARD</h6>
	              <div class="sidebar-list">
	                <a href="order_list.php" class="active">
	                	<?php 
	                        $query_sprofile2="select * from tbl_order_add where fld_user_id='".$_SESSION['id']."' order by fld_order_id desc";
	                        $view_sprofile2=mysqli_query($connect,$query_sprofile2);
	                    ?>
	                  <i class="far fa-shopping-bag"></i> Orders <span><?php echo mysqli_num_rows($view_sprofile2) ?></span>
	                </a>
	                <a href="wishlist_view.php">
	                	<?php 
	                        $query_wishlist="select * from tbl_wishlist where fld_user_id='".$_SESSION['id']."' order by fld_wishlist_id desc";
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
	              <div class="account-content">
	                  <h4 class="account-content-title"><i class="far fa-heart"></i> My Wishlist</h4>
	                  <div class="account-content-table">
	                      <div class="row">
	                      	<?php 
				              while ($fetch=mysqli_fetch_array($view))
				              {
				                  extract($fetch);
				                   $view_photo = mysqli_query($connect,"select * from tbl_product_photo where fld_product_id='".$fetch['fld_product_id']."' order by fld_product_photo_id desc") or die (mysqli_error($connect));
				                   $fetch_photo=mysqli_fetch_array($view_photo);
				          ?>

								<div class="col-lg-12">
									<div class="shopping-cart-single bg-white">
										<div class="row">
											<div class="col-lg-2"><a href="product_details.php?prod_id=<?php echo $fetch['fld_product_id'];?>"> <img src="images/product/<?php echo $fetch_photo['fld_product_photo'];?>" alt=""></a> </div>
											<div class="col-lg-10 my-auto">
												<div class="d-flex justify-content-between cart-title">
													<a href="product_details.php?prod_id=<?php echo $fetch['fld_product_id'];?>"><h6><?php echo $fetch['fld_product_name'];?></h6></a>
													<a href="wishlist_delete.php?del_id=<?php echo $fetch['fld_wishlist_id'];?>">
														<i class="fal fa-times"></i>
													</a> </div>
												<div class="d-flex justify-content-between mt-4">
													<div class="cart-price my-auto"><del> &#8377; <?php echo $fetch['fld_product_price']; ?></del> <b>&#8377; <?php echo $fetch['fld_product_final_price']; ?></b> 
													</div>
													
												</div>
											</div>
										</div>
									</div>
								</div>
						<?php }?>
	                      </div>
	                  </div>
	              </div>
	          </div>
			</div>
		</div>
	</div>

	<?php include'footer.php';?>
