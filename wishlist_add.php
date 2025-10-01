<?php 
	include "config.php";
	session_start();


	if(isset($_GET['w_id']))
	{
		$add=mysqli_query($connect,"insert into tbl_wishlist(fld_user_id,fld_product_id)values('".$_SESSION['id']."','".$_GET['w_id']."') ") or die(mysqli_error($connect));


		if($add)
		{
			echo "<script>";
			echo "alert('Product Added In Wishlist');";
			echo "window.location.href='wishlist_view.php';";
			echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('Error');";
			echo "window.location.href='index.php';";
			echo "</script>";
		}
	}
?>