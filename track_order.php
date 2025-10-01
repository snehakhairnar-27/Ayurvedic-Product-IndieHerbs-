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
 
        $query_sprofile2="select * from tbl_order_add where fld_user_id='".$_SESSION['id']."' order by fld_order_id desc";
        $view_sprofile2=mysqli_query($connect,$query_sprofile2);
?>
    <section class="shop section">
      <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4">
              <div class="account-sidebar">
                <h6 class="sidebar-title">DASHBOARD</h6>
                <div class="sidebar-list">
                  <a href="order_list.php" class="active">
                    
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
            <?php
            if(isset($_GET['tid']))
              {

                    $query_sprofile2="select * from tbl_order_add where fld_user_id='".$_SESSION['id']."' and fld_order_id='".$_GET['tid']."' order by fld_order_id desc";
                    $view_sprofile2=mysqli_query($connect,$query_sprofile2);
                    $fetch_track=mysqli_fetch_array($view_sprofile2); 
                    $status = $fetch_track['fld_order_status'];
            ?>
            <div class="col-lg-9">
              <div class="account-content">
                <h4 class="account-content-title"><i class="far fa-shopping-bag"></i> Track Order</h4>
                <div class="order-track">
                <div>
                <div class="mb-3">
                  <div class="mb-4 mt-4">
                    <h6 class="text-uppercase">Tracking Order No - <?php echo $fetch_track['fld_invoice_no']?></h6>
                  </div>
                  <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                    <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> <?php echo $fetch_track['fld_order_status']?></div>
                    
                  </div>
                  <div class="mt-5">
                    <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
              <?php if($status == 'Confirmed Order')
                {
              ?>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-shopping-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                      </div>
                      <div class="step">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-cog"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                      </div>
                      <div class="step">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-truck"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                      </div>
                      <div class="step">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                      </div>
              <?php }
                else if($status == 'Processing Order'){
              ?>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-shopping-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                      </div>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-cog"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                      </div>
                      <div class="step">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-truck"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                      </div>
                      <div class="step">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                      </div>
              <?php }
                else if($status == 'Product Dispatched'){
              ?>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-shopping-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                      </div>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-cog"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                      </div>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-truck"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                      </div>
                      <div class="step">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                      </div>
              <?php }
                else if($status == 'Product Delivered'){
              ?>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-shopping-cart"></i></div>
                        </div>
                        <h4 class="step-title">Confirmed Order</h4>
                      </div>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-cog"></i></div>
                        </div>
                        <h4 class="step-title">Processing Order</h4>
                      </div>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-truck"></i></div>
                        </div>
                        <h4 class="step-title">Product Dispatched</h4>
                      </div>
                      <div class="step completed">
                        <div class="step-icon-wrap">
                          <div class="step-icon"><i class="fal fa-home"></i></div>
                        </div>
                        <h4 class="step-title">Product Delivered</h4>
                      </div>
                <?php }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
<?php }?>
    <?php include'footer.php';?>
