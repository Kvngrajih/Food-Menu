<?php
// ini_set('session.gc_maxlifetime',12*60*60);
// ini_set('session.cookie_lifetime',12*60*60);
//echo phpinfo();
		
@session_start();

require 'connection/function.php';
date_default_timezone_set('Africa/Lagos');// change according timezone
$DateTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['reg']) && $_POST['reg'] == 'Get Started'):
	$er = false;
	$fname = mysqli_real_escape_string($connect, ucwords($_POST['firstname']));
	$lname = mysqli_real_escape_string($connect, ucwords($_POST['lastname']));
	$email = mysqli_real_escape_string($connect, strtolower($_POST['emailaddr']));
	$phone = mysqli_real_escape_string($connect, strtolower($_POST['phone']));
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$address = mysqli_real_escape_string($connect, ucwords($_POST['addrtostart']));
	$howuhear = mysqli_real_escape_string($connect, ucwords($_POST['howuhear']));

	if($er == false):
		$orderpin = 'FDP'."/".date("y")."/".strtoupper("UID"."/".'01').rand()*20;
		$query_reg = mysqli_query($connect, "INSERT INTO users SET 
			firstname = '$fname', 
			lastname = '$lname', 
			email = '$email', 
			phone = '$phone', 
			city = '$city', 
			state = '$state', 
			country = '$country', 
			address = '$address', 
			howuhear = '$howuhear', 
			orderpin = '$orderpin',
			year = '$DateTime'")or die(mysqli_error($connect));
		$query_insert_pin = mysqli_query($connect, "INSERT INTO numlog SET 
			phone = '$phone', 
			year = '$DateTime', 
			email = '$email'");
		if(empty($query_insert_pin)):
			$er = true;
			$_SESSION['errmsg'] = "Invalid Registration Action";
			header("LOCATION:". base_url(''));
		else:
			$er = false;
			$_SESSION['success'] = "Registration Complete";
			header("LOCATION:". base_url(''));
		endif;
	endif;
endif;


if(isset($_POST['adlog']) && $_POST['adlog'] == 'Log In'):
	$er = false;
	$email = $_SESSION['email'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower($_POST['email'])))))));
	$password = $_SESSION['password'] = mysqli_real_escape_string($connect, sanitize(clean(ucwords(strtolower(removeBadChars($_POST['password']))))));
	$password = md5(sha1($password)).sha1($password);
	if($er == false):		
		$query_check = mysqli_query($connect, "SELECT email, password FROM admin WHERE email = '$email' AND password = '$password'") or die(mysqli_error($connect));
		$num = mysqli_num_rows($query_check);
		if($num==1):
			
			$query_all = mysqli_query($connect, "SELECT * FROM admin WHERE email = '$email' AND password = '$password'")or die(mysqli_error($connect));
			if(!empty($query_all)):
				$get_all = mysqli_fetch_assoc($query_all);
				if($get_all['user_level'] == 1):
					$_SESSION['admin'] = $get_all['user_level'];
					$_SESSION['aid'] = $get_all['id'];
					$admin = "Administrator";
					$url = rand()*100;
					header("LOCATION:".base_url("fd/admin/home.php?rdir=".base64_encode($url)."'Active=".$admin));
				elseif($get_all['user_level'] == 2):
					$_SESSION['admin'] = $get_all['user_level'];
					$_SESSION['aid'] = $get_all['id'];
					$admin = "Staff";
					$url = rand()*100;
					header("LOCATION:".base_url("fd/admin/orders.php?rdir=".base64_encode($url)."'Active=".$admin));
				endif;
			else:
				$er = false;
				$_SESSION['errmsg'] = "Invalid Login Cridentials";
				header("LOCATION:". base_url(''));
			endif;
		else:
			$er = true;
			$_SESSION['errmsg'] = "Invalid Login Cridentials";
			header("LOCATION:". base_url(''));		
		endif;
	endif;
endif;


if(isset($_POST['phn']) && $_POST['phn'] == 'Log In'):
	$er = false;
	$phone = mysqli_real_escape_string($connect, strtolower($_POST['phone']));
	if($er == false):
		$check_num = mysqli_query($connect, "SELECT phone, email FROM numlog WHERE phone = '$phone'");
		if(!empty($check_num)):
			$get_num = mysqli_fetch_assoc($check_num);
			if($get_num['phone'] == $phone):
				$query_u = mysqli_query($connect, "SELECT * FROM users WHERE phone = '$phone' AND email = '".$get_num['email']."'") or die(mysqli_error($connect));
				if(!empty($query_u)):
					$get_u = mysqli_fetch_assoc($query_u);
					$_SESSION['user'] = $get_u['phone'];
					$_SESSION['uem'] = $get_u['email'];
					$admin = "User";
					$url = rand()*100;
					header("LOCATION:".base_url("fd/customer/home.php?rdir=".base64_encode($url)."'Active=".$admin."=".$get_u['phone']));
				else:
					$er = false;
					$_SESSION['errmsg'] = "Invalid Login Cridentials";
					header("LOCATION:". base_url(''));
				endif;
			else:
				$er = false;
				$_SESSION['errmsg'] = "Invalid Login Cridentials";
				header("LOCATION:". base_url(''));
			endif;
		endif;
	endif;
endif;
?>