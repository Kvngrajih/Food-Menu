<div class="clear"></div>

<footer class="sitefooter"><div class="wdth">
	<div class="subfooter2">
		<div class="left col50">
			<ul>
				<li><a href="#">Our Terms</a></li>
			</ul>
		</div>
		<div class="right col50">
			<ul class="social">
				<li><a href="#"><i class='fa fa-facebook'></i></a></li>
				<li><a href="#"><i class='fa fa-instagram'></i></a></li>
				<li><a href="#"><i class='fa fa-twitter'></i></a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div> <?php //subfooter2 ?>

	<div class="copyright">
		By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content Policies. All trademarks are properties of their respective owners. &copy; <?=date("Y");?> - foodies. All rights reserved.
	</div> 
</div></footer>

<div class="popup" id="page_content"><div class="popup_container">
	<a href="javascript:;" onClick="javascript:jQuery('#page_content').hide();" id="close">&times;</a>
	<div id="page_content_sec">&nbsp;</div>
</div></div>


<?php
	if(isset($_SESSION['success'])) {?>
		<?php echo "<div class='notification'><div class='wdth'><div class='alert alert-success'>".$_SESSION['success']."</div></div></div>";
		?>
		<script>
			setTimeout(function() {
		    	$('.notification').fadeOut();
			}, 5000); 
		</script>

<?php }?>

<?php
	if(isset($_SESSION['errmsg'])) {?>
		<?php echo "<div class='notification'><div class='wdth'><div class='alert alert-error'>".$_SESSION['errmsg']."</div></div></div>";
		?>
		<script>
			setTimeout(function() {
		    	$('.notification').fadeOut();
			}, 5000); 
		</script>

<?php }?>

<?php

unset($_SESSION['success']);
unset($_SESSION['errmsg']);
?>

</body>
</html>