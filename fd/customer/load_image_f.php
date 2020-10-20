<?php
include'connection/function.php';
                               
                                       
if(!empty($_POST["food_load"])){

	 $get_food_image = mysqli_query($connect, "SELECT img, price FROM products  WHERE id = '".$_POST["food_load"]."' ");
	 while( $f_image = mysqli_fetch_assoc($get_food_image)){?>
	 	<img src="../<?=$f_image["img"];?>">
	  <?php	}
} 
 

 if(!empty($_POST["drink_load"])){

	 $get_drink_image = mysqli_query($connect, "SELECT img FROM products  WHERE type = 'Drink' AND  id = '".$_POST["drink_load"]."' ");
	 while( $d_image = mysqli_fetch_assoc($get_drink_image)){?>
	 	<img src="../<?=$d_image["img"];?>">
	 	<!-- <?=$d_image["img"];?> -->
	  <?php	}
}                                       
                             
                                 

?>
