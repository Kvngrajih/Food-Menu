<?php
function check_login(){
  if(strlen($_SESSION['uem'] && $_SESSION['user']) ==0){
    header("Location:" .base_home()."?rdir=no_entry_session_not_set");
        exit();
  }

  if(!isset($_SESSION['user']) && !isset($_SESSION['uem'])):
    header("Location:" .base_home("").'?rdir=warning_is_not_session!');
    exit();

    elseif(isset($_SESSION['user']) && isset($_SESSION['uem'])):
        $user_level = preg_replace('#[^a-zA-Z]#i', '', $_SESSION['user']);     
        $aid = preg_replace('#[^0-9]#i', '', $_SESSION['uem']);
  endif;

  if(!isset($_SESSION['user']) && !isset($_SESSION['uem'])){
     $check_user = mysqli_query($connect, sprintf("SELECT email, phone  FROM users WHERE phone = '".$_SESSION['user']."' AND email = '".$_SESSION['uem']."'"));
      $check_user_result = mysqli_num_rows($check_user);
        if($check_admin_result ==0){
          header("Location:" .base_home('')."?rdir=no_entry_invalid_id2");
          exit();
        }
  }   

}
// Datas
  $query_user_data = mysqli_query($connect, sprintf("SELECT * FROM users WHERE phone = '".$_SESSION['user']."' AND email = '".$_SESSION['uem']."'")) or die(mysqli_error($connect));
  $get_data = mysqli_fetch_assoc($query_user_data);
  $uid = $get_data['id'];
  $firstname = $get_data['firstname'];
  $lastname = $get_data['lastname'];
  $avartar = $get_data['avartar'];
  $email = $get_data['email'];
  $phone = $get_data['phone'];
  $address = $get_data['address'];
  $city = $get_data['city'];
  $state = $get_data['state'];
  $country = $get_data['country'];
  $pin = $get_data['orderpin'];
  $session = $_SESSION['user'];

?>