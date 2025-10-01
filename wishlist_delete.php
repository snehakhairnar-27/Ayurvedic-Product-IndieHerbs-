<?php
include "config.php";

$delete1=mysqli_query($connect,"update tbl_wishlist set fld_wishlist_status=1 where fld_wishlist_id='".$_GET['del_id']."'") or die(mysqli_error($connect));
        

$back="javascript:history.back()";
  if($delete1)

          {
            echo '<script type="text/javascript">';
            echo "alert('Product Remove');";
            echo 'window.location.href = "wishlist_view.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Error');";
            echo 'window.location.href="wishlist_view.php";';
            echo "</script>";
             
             }

 ?>