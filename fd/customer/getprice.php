<?php
include'connection/function.php';
                                       
if(!empty($_POST["food_load"])){

	 $get_food_price = mysqli_query($connect, "SELECT price FROM products  WHERE id = '".$_POST["food_load"]."' ");
	 while($food_price = mysqli_fetch_assoc($get_food_price)){?>
	 	<option value="<?=$food_price;?>"><?=$food_price;?></option>
	  <?php	}
} 
                                 
                                      
  
?>