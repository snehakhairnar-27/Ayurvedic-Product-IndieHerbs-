product_details.php code 
<?php include 'config.php';?> 
<?php 
  if(isset($_GET['prod_id']))
  {
    $view_prod = mysqli_query($connect,"SELECT p.*, pc.*, cb.* 
      FROM tbl_product p, tbl_product_category pc, tbl_subcategory cb 
      WHERE p.fld_product_id = '".$_GET['prod_id']."' 
      AND pc.fld_product_category_id = p.fld_product_category_id 
      AND cb.fld_subcategory_id = p.fld_subcategory_id 
      ORDER BY p.fld_product_id DESC") or die (mysqli_error($connect));
      
    $fetch_prod = mysqli_fetch_array($view_prod);     
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buy <?php echo $fetch_prod['fld_product_name'];?> - Ayurved</title>
    <link rel="icon" type="image/png" href="images/favicon-logo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
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
    <?php include 'header.php';?>
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="bread-inner">
              <ul class="bread-list">
                <li><a href="index.php">Home <i class="ti-arrow-right"></i></a></li>
                <li><a href="product_list.php?id=<?php echo $fetch_prod['fld_product_category_id'];?>"><?php echo $fetch_prod['fld_product_category_name'];?><i class="ti-arrow-right"></i></a></li>
                <li><a href="product_sub_list.php?sub_id=<?php echo $fetch_prod['fld_subcategory_id'];?>&category_id=<?php echo $fetch_prod['fld_product_category_id'];?>"><?php echo $fetch_prod['fld_subcategory_name'];?><i class="ti-arrow-right"></i></a></li>
                <li class="active"><a href="#"><?php echo $fetch_prod['fld_product_name'];?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="shop single section">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-12">
            <div class="product-gallery">
              <div class="flexslider-thumbnails">
                <ul class="slides">
                  <?php
                    $view_photo = mysqli_query($connect,"SELECT * 
                      FROM tbl_product_photo 
                      WHERE fld_product_id = '".$fetch_prod['fld_product_id']."' 
                      ORDER BY fld_product_photo_id DESC") or die (mysqli_error($connect));
                    
                    while($fetch_photo = mysqli_fetch_array($view_photo)) {
                  ?>
                  <li data-thumb="images/product/<?php echo $fetch_photo['fld_product_photo'];?>">
                    <img src="images/product/<?php echo $fetch_photo['fld_product_photo'];?>" alt="#">
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-12">
            <div class="product-des">
              <div class="short">
                <h4><?php echo $fetch_prod['fld_product_name'];?></h4>
                <p class="price">
                  <span class="discount">&#8377; <?php echo $fetch_prod['fld_product_final_price']; ?></span>
                  <s>&#8377; <?php echo $fetch_prod['fld_product_price']; ?></s>
                </p>
              </div>
              <div class="product-buy">
                <div class="add-to-cart">
                  <?php if(isset($_SESSION['email'])) { ?>
                    <a class="btn" href="add_cart.php?cart_id=<?php echo $fetch_prod['fld_product_id'];?>">Add to cart</a>
                    <a href="wishlist_add.php?w_id=<?php echo $fetch_prod['fld_product_id'];?>" class="btn min"><i class="fal fa-heart"></i></a>
                  <?php } else { ?>
                    <a class="btn" href="user_login.php">Add to cart</a>
                    <a href="user_login.php" class="btn min"><i class="fal fa-heart"></i></a>
                  <?php }?>
                </div>
                <div class="single-product-info">
                  <p>Category: <a href="#"><?php echo $fetch_prod['fld_product_category_name'];?></a></p>
                  <p>Product Type: <a href="#"><?php echo $fetch_prod['fld_subcategory_name'];?></a></p>
                  <p>Weight: <a href="#"><?php echo $fetch_prod['fld_product_weight'];?></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="product-info">
              <nav class="nav-main">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">Description</button>
                  <button class="nav-link" id="nav-feature-tab" data-bs-toggle="tab" data-bs-target="#nav-feature" type="button" role="tab" aria-controls="nav-feature" aria-selected="false">Feature</button>
                  <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Benefit</button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                  <div class="tab-single">
                    <?php echo $fetch_prod['fld_product_description'];?>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-feature" role="tabpanel" aria-labelledby="nav-feature-tab">
                  <ul>
                    <li><b>Brand:</b> <?php echo $fetch_prod['fld_subcategory_name'];?></li>
                    <li><b>Height:</b> <?php echo $fetch_prod['fld_product_height'];?> cm</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php';?>
  </body>
</html>
<?php } ?>
