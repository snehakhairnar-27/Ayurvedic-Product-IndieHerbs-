<?php
  session_start();
?>

<?php

    $query="select * from tbl_my_profile order by fld_id asc ";
    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
    
    $fetch=mysqli_fetch_array($row); 
    if(isset($_SESSION['id']))
      {
        $row1=mysqli_query($connect,"select * from tbl_user where fld_user_id='".$_SESSION['id']."' order by fld_user_id asc ") or die(mysqli_error($connect));
        
        $fetch_user=mysqli_fetch_array($row1);  
      }
?>
                    
<!-- 
    <div class="preloader">
      <div class="preloader-inner">
        <div class="preloader-icon">
          <span></span>
          <span></span>
        </div>
      </div>
    </div> -->
    <header class="header shop">
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
              <div class="top-left">
                <ul class="list-main">
                  <li>
                    <i class="ti-headphone-alt"></i><?php echo $fetch['fld_phone'];?>
                  </li>
                  <li>
                    <i class="ti-email"></i>
                    <a href="#"><?php echo $fetch['fld_email'];?></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
              <div class="right-content">
                <ul class="list-main">
                  <li>
                    <?php 
                      if(isset($_SESSION['email']))
                      {
                    ?>
                    <i class="ti-user"></i>
                    <a href="user_dashboard.php"><?php echo $fetch_user['fld_user_name'];?></a>
                    <?php }
                      else{
                    ?>
                    <i class="ti-user"></i>
                    <a href="#">My Account</a>
                  <?php }?>
                    
                  </li>
                  <li>
                    <?php 
                      if(isset($_SESSION['email']))
                      {
                    ?>
                    <i class="ti-power-off"></i>
                    <a href="user_logout.php">logout</a>
                  <?php }
                  else{
                  ?>
                    <i class="ti-power-off"></i>
                    <a href="user_login.php">Login</a>
                  <?php }?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="middle-inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
              <div class="logo">
                <a href="index.php">
                  <img src="images/<?php echo $fetch['fld_logo'];?>" alt="logo">
                </a>
              </div>
              <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-7 col-md-6 col-12">
              <div class="search-bar-top">
                <div class="search-bar">
                  <form method="post" action="search_product.php">
                    <input name="search_value" id="skills" placeholder="Search Products Here....." type="search">
                    <button class="btnn" type="submit" name="search">
                      <i class="far fa-search"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-12">
              <div class="right-bar">
                <div class="sinlge-bar shopping">
                  <?php 
                      if(isset($_SESSION['email']))
                      {
                    ?>
                     <a href="wishlist_view.php" class="single-icon" title="Wishlist">
                    <i class="fal fa-heart"></i>
                  </a>
                  <?php }
                  else{
                  ?>
                     <a href="#" class="single-icon" title="Wishlist">
                    <i class="fal fa-heart"></i>
                  </a>
                  <?php }?>
                 
                </div>
                <div class="sinlge-bar shopping">
                  
                    <?php 


                      if(isset($_SESSION['id']))
                      {
                        
                        $view_sprofile1=mysqli_query($connect,"select * from tbl_cart where fld_user_id='".$_SESSION['id']."' and fld_product_status='In_cart' order by fld_cart_id desc") or die(mysqli_error($connect));;
                     
                        // $fetch_sprofile1=mysqli_fetch_array($view_sprofile1);
                      ?><a href="cart.php" class="single-icon">
                        <i class="fal fa-shopping-cart"></i>
                       <span class="total-count"><?php echo mysqli_num_rows($view_sprofile1) ?></span></a>
                    <?php }
                    else{
                    ?><a href="#" class="single-icon">
                        <i class="fal fa-shopping-cart"></i>
                      <span class="total-count">0</span></a>
                    <?php }?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-inner  shadow">
        <div class="container">
          <div class="cat-nav-head">
            <div class="row">
              <div class="col-lg-3">
                <div class="all-category">
                  <div class="d-flex">
                    <i class="flaticon-menu cat-heading-icon"></i>
                    <h3 class="cat-heading">CATEGORIES</h3>
                  </div>
                  <ul class="main-category hover-category">
                    <?php 
                        $view1 = mysqli_query($connect,"select * from tbl_product_category where fld_product_category_delete=0 order by fld_product_category_id asc") or die (mysqli_error($connect));

                        while ($fetch1=mysqli_fetch_array($view1))
                        {
                            extract($fetch1);
                    ?>
                    <li>
                      <a href="product_list.php?id=<?php echo $fetch1['fld_product_category_id'];?>">
                        <i class="flaticon-shopping-bag category-icon"></i> <?php echo $fetch1['fld_product_category_name']?> <i class="fal fa-angle-right" aria-hidden="true"></i>
                      </a>
                      <ul class="sub-category">
                        <?php 
                            $view2 = mysqli_query($connect,"select * from tbl_subcategory where fld_product_category_id='".$fetch1['fld_product_category_id']."' and fld_subcategory_delete=0 order by fld_subcategory_id desc") or die (mysqli_error($connect));

                            while ($fetch2=mysqli_fetch_array($view2))
                            {
                                extract($fetch2);
                        ?>
                        <li >
                          <a href="product_sub_list.php?sub_id=<?php echo $fetch2['fld_subcategory_id'];?>&category_id=<?php echo $fetch1['fld_product_category_id'];?>"><?php echo $fetch2['fld_subcategory_name']; ?></a>
                        </li>
                      <?php }?>
                      </ul>
                    </li>
                    <?php }?>
                  </ul>
                </div>
              </div>
              <div class="col-lg-9 col-12">
                <div class="menu-area">
                  <nav class="navbar navbar-expand-lg">
                    <div class="navbar-collapse">
                      <div class="nav-inner">
                        <ul class="nav main-menu menu navbar-nav">
                          <li class="active">
                            <a href="index.php">Home 
                            </a>
                          </li>
                          <li>
                            <a href="about_us.php">About Us 
                            </a>
                          </li>
                           <?php 
                              $view1 = mysqli_query($connect,"select * from tbl_product_category where fld_product_category_delete=0 order by fld_product_category_id asc") or die (mysqli_error($connect));

                              while ($fetch1=mysqli_fetch_array($view1))
                              {
                                  extract($fetch1);
                          ?>
                          <li>
                            <a href="product_list.php?id=<?php echo $fetch1['fld_product_category_id'];?>"><?php echo $fetch1['fld_product_category_name']?> <i class="ti-angle-down"></i>
                            </a>
                            <ul class="dropdown">
                              <?php 
                                  $view2 = mysqli_query($connect,"select * from tbl_subcategory where fld_product_category_id='".$fetch1['fld_product_category_id']."' and fld_subcategory_delete=0 order by fld_subcategory_id desc") or die (mysqli_error($connect));

                                  while ($fetch2=mysqli_fetch_array($view2))
                                  {
                                      extract($fetch2);
                              ?>
                              <li>
                                <a href="product_sub_list.php?sub_id=<?php echo $fetch2['fld_subcategory_id'];?>&category_id=<?php echo $fetch1['fld_product_category_id'];?>"><?php echo $fetch2['fld_subcategory_name'];?></a>
                              </li>
                            <?php }?>
                            </ul>
                          </li>
                          <?php }?>
                          <li>
                            <a href="contact.php">Contact Us</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>