<?php
function check_login(){
  if(strlen($_SESSION['admin'] && $_SESSION['aid']) ==0){
    header("Location:" .base_home()."?rdir=no_entry_session_not_set");
        exit();
  }

  if(!isset($_SESSION['admin']) && !isset($_SESSION['aid'])):
    header("Location:" .base_home("").'?rdir=warning_is_not_session!');
    exit();

  elseif(isset($_SESSION['admin']) && isset($_SESSION['aid'])):
      $user_level = preg_replace('#[^a-zA-Z]#i', '', $_SESSION['admin']);       
      $aid = preg_replace('#[^0-9]#i', '', $_SESSION['aid']);
  endif;

  if(!isset($_SESSION['admin']) && !isset($_SESSION['aid'])){
    $check_admin = mysqli_query($connect, sprintf("SELECT id, user_level FROM admin WHERE user_level = '".$_SESSION['admin']."' AND id = '".$_SESSION['aid']."'"));
      $check_admin_result = mysqli_num_rows($check_admin);
        if($check_admin_result ==0){
          header("Location:" .base_home('')."?rdir=no_entry_invalid_id1");
          exit();
        }
  } 

}
// Datas
  $query_admin_data = mysqli_query($connect, sprintf("SELECT * FROM admin WHERE user_level = '".$_SESSION['admin']."' AND id = '".$_SESSION['aid']."'")) or die(mysqli_error($connect));
  $get_data_ad = mysqli_fetch_assoc($query_admin_data);
  $avartar = $get_data_ad['avartar'];
  $email_ad = $get_data_ad['email'];
  $ad_firstname = $get_data_ad['firstname'];
  $ad_lastname = $get_data_ad['lastname'];
  $user_level = $get_data_ad['user_level'];
  if($get_data_ad['user_level']==1):
    $ad_user_level = "Administrator";
  elseif ($get_data_ad['user_level']==2):
    $ad_user_level = "Staff";
  endif;


?>