

<?php 
// @session_start();
require("inc/header.php"); 
// require("connection/function.php"); 
session_destroy();
?>


<div class="landingimage courier bgimage" style="background-image: url(img/bg.jpg);"><div class="inner"><div class="wdth">

	<div class="topvh">

		<div class="col40 left">

			<h1>Welcome Back</h1>

			<h3>To our Online Food Directorate Management System.</h3>

			<p><a href="#" class="button">Contact Us</a></p>

		</div>

		<div class="col40 right">

			<div class="frm">
				<!-- Forget User  -->
				<form action="index.php?reset=ok" method="post" id="forform" style="display: none;">

					<h2 class="title">Forget Passowrd?</h2>

					<p>

						<input placeholder="Email" type="text" name="emailaddr">

					</p>

					<p>

						<input type="submit" class="button" value="Recover Password">

					</p>

					<p class="byproceeding">

						Already have an account? <a href="javascript:;" id="login">Login</a>

					</p>

				</form>

				<!-- End Forget User -->


				<!-- Forget Admin  -->
				<form action="index.php?reset=ok" method="post" id="forformAd" style="display: none;">

					<h2 class="title">Forget Passowrd?</h2>

					<p>

						<input placeholder="Email" type="text" name="emailaddr">

					</p>

					<p>

						<input type="submit" class="button" value="Recover Password">

					</p>

					<p class="byproceeding">

						Already have an account? <a href="javascript:;" id="login">Login</a>

					</p>

				</form>

				<!-- End Forget Admin -->


				<!-- Login  user-->

				<form action="<?=base_url('');?>config.php?log=in" method="post" id="logform" style="display: none;">

					<h2 class="title">Login With Your Phone Number</h2>

					<p>

						<input placeholder="Insert Your Phone Number" type="text" name="phone">

					</p>


					<p>

						<input type="submit" name="phn" class="button" value="Log In">

					</p>

					<p class="byproceeding">

						Not have an account? <a href="javascript:;" id="register">Register</a>

					</p>

					<p class="byproceeding" style="margin-top: 5px;">

						Forgot Password? <a href="javascript:;" id="forgot">Recover</a>

					</p>

				</form>

				<!-- End of Login User -->



				<!-- Admin Login  -->

				<form action="<?=base_url('');?>config.php?log=in" method="POST" id="logformAd" style="display: none;">

					<h2 class="title">Admin Login</h2>

					<p>

						<input placeholder="Email" type="text" name="email">

					</p>

					<p>

						<input placeholder="Password" type="password" name="password">

					</p>

					<p>

						<input type="submit" name="adlog" class="button" value="Log In">

					</p>

					<p class="byproceeding">

						Not have an account? <a href="javascript:;" id="register">Register</a>

					</p>

					<p class="byproceeding" style="margin-top: 5px;">

						Forgot Password? <a href="javascript:;" id="forgotAd">Recover</a>

					</p>

				</form>


				<!-- End of Admin Login -->


				<script>

				$(document).ready(function(){

					$("input#phne").inputmask();

				});

				</script>




				<!-- Register Page -->

				<form action="<?=base_url('');?>config.php?reg=ok" method="POST" id="regform">

					<h2 class="title">Register Now</h2>

					<p>

						<span class="left col50" style="position: relative;"><input placeholder="First Name" type="text" name="firstname"></span>

						<span class="right col50"><input placeholder="Last Name" type="text" name="lastname"></span>

						<span class="clear" style="display: block;"></span>

					</p>

					<p>

						<span class="left col50" style="position: relative;"><input placeholder="Email" type="email" name="emailaddr"></span>

						<span class="right col50"><input placeholder="Phone" type="text" name="phone" id="phne" data-inputmask="'lagos': 'phone'"></span>

						<span class="clear" style="display: block;"></span>

					</p>

					<p>
						
						<span class="left col60">

							<span class="left col50" style="position: relative;"><select name="city">

			                    <option value="">City</option>
			                    <?php $query_get = mysqli_query($connect, "SELECT * FROM location");
			                     while ($get = mysqli_fetch_assoc($query_get)) {?>
			                    	<option value="<?=$get['city'];?>"><?=$get['city'];?></option>
			                    <?php } ?>
								
			                   
			                </select>
			                </span>

							<span class="right col50" style="position: relative;">
								<select name="state">

				                    <option value="">State</option> 

				                    
									<?php $query_get = mysqli_query($connect, "SELECT * FROM location");
									while ($get = mysqli_fetch_assoc($query_get)) {?>
			                    	<option value="<?=$get['state'];?>"><?=$get['state'];?></option>
			                    <?php } ?>		                   

				                </select>
				            </span>

							<span class="clear" style="display: block;"></span>

						</span>

						<span class="right col40"><select name="country">

							<option value="">Country</option>

							<?php $query_get = mysqli_query($connect, "SELECT * FROM location");
							 while ($get = mysqli_fetch_assoc($query_get)) {?>
			                    	<option value="<?=$get['country'];?>"><?=$get['country'];?></option>
			                    <?php } ?>

						</select></span>

						<span class="clear" style="display: block;"></span>

					</p>

					<p>

						<input placeholder="What address will you normally start your shift?" type="text" name="addrtostart">

					</p>

					<p>

						<textarea name="howuhear" placeholder="How did you hear about the food courier position?"></textarea>

					</p>

					<p>

						<input type="submit" name="reg" class="button" value="Get Started">

					</p>

					<p class="byproceeding">

						Already have an account? <a href="javascript:;" id="login">User Login</a>  ||  
						 <a href="javascript:;" id="loginAd">Admin</a>

					</p>

				</form>

				<!-- End of Register -->

			</div>

		</div>

		

		<div class="clear"></div>

	</div>

</div></div></div>



<script type="text/javascript">

jQuery(document).ready(function(){

	jQuery("a#forgot").on("click", function(){

		jQuery('form#logform').hide();

		jQuery('form#regform').hide();

		jQuery('form#forform').show();

	});

	jQuery("a#forgotAd").on("click", function(){

		jQuery('form#logformAd').hide();

		jQuery('form#regform').hide();

		jQuery('form#forformAd').show();

	});

	jQuery("a#login").on("click", function(){

		jQuery('form#regform').hide();

		jQuery('form#logform').show();

		jQuery('form#forform').hide();

	});

	jQuery("a#loginAd").on("click", function(){

		jQuery('form#regform').hide();

		jQuery('form#logformAd').show();

		jQuery('form#forform').hide();

	});

	jQuery("a#register").on("click", function(){

		jQuery('form#logform').hide();

		jQuery('form#regform').show();

		jQuery('form#forform').hide();

	});



	jQuery("a#register").on("click", function(){

		jQuery('form#logformAd').hide();

		jQuery('form#regform').show();

		jQuery('form#forform').hide();

	});

});

</script>





<div class="threecol section home1 secprimery" style="border-top: 4px solid #0e8701; border-bottom: 2px solid #0e8701;">
  <div class="wdth">
    <div class="section-title">
      <h2 class="title">Easiest Way To Start</h2>
    </div>
    <ul>
      <li>
        <div class="work-fonts">
          <div class="iconfont"><img src="img/ico1.png" alt="Icon" /></div>
          <!--<i class="fa fa-first-order"></i>--> 
        </div>
        <h4 class="title">Sign up & Get Order Pin</h4>
        <!-- <p>Give us a call or add your contact number so we can get in touch</p> -->
      </li>
      <li>
        <div class="work-fonts">
          <div class="iconfont"><img src="img/ico2.png" alt="Icon" /></div>
        </div>
        <h4 class="title">We will guide you</h4>
        <!-- <p>Our team is there to guide you throughout and provide you all the basic information to get you started</p> -->
      </li>
      
      <li>
        <div class="work-fonts">
          <div class="iconfont"><img src="img/ico4.png" alt="Icon" /></div>
          </i></div>
        <h4 class="title">We Start Receiving Your Orders</h4>
        <!-- <p>We'll install an upcoming order terminal at your restaurant to help you receive and manage new orders</p> -->
      </li>
      <li>
        <div class="work-fonts">
          <div class="iconfont"><img src="img/ico3.png" alt="Icon" /></div>
        </div>
        <h4 class="title">We'll Get Your Food Ready Avalaible On Table</h4>
        <!-- <p>We'll place your order online and make it available to our community</p> -->
      </li>
    </ul>
    <div class="clear"></div>
  </div>
</div>







<?php require("inc/footer.php"); ?>