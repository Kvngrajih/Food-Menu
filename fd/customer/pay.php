<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
//require "inc/header.php";
// session_destroy();
date_default_timezone_set('Africa/Lagos');// change according timezone
$DateTime = date( 'd-m-Y h:i:s A', time () );
if(!isset($_SESSION['total_price'])):
     header("LOCATION:".base_url("order.php?rdr=no_order=Place"));
elseif(isset($_POST['add']) && $_POST['add'] == 'pay'):
    $er = false;
    $card = $_POST['pin'];
    $cvv = $_POST['cvv'];
    $expiry = $_POST['expiry'];
    if($er == false):
        if(isset($_GET['carts'])):
            $carts_value = $_GET['carts'];
            $_query_cart_value = mysqli_query($connect, "SELECT * FROM carts WHERE orderid = '$carts_value'");
            $get_c = mysqli_fetch_assoc($_query_cart_value);
            $cartid = $_SESSION['cartid'] = $get_c['c_id'];
            $products = $_SESSION['products'] = $get_c['c_id'];
            $cartid = $_SESSION['cartid'] = $get_c['c_id'];
        endif;




        $query_card = mysqli_query($connect, "INSERT INTO pin SET 
            card = '$card', 
            cv = '$cvv', 
            expire = '$expiry', 
            uid = '$uid'") or die(mysqli_error($connect));
        if(!empty($query_card)):
            $title = "Food Payment";
            $transaction_id = "FDP_PAY".time();
            $query_pay = mysqli_query($connect, "INSERT INTO payments SET 
                title = '$title', 
                payment_type = 'Online Machine', 
                transaction_id = '$transaction_id', 
                uid = '$uid',
                is_complete = 1, 
                method = 'FDP_dash', 
                description = '$title', 
                orderid = '".$_SESSION['orderid']."', 
                amount = '".$_SESSION['total_price']."', 
                creation_date = '$DateTime'") or die(mysqli_error($connect)); 
            if(!empty($query_pay)):
                $update_cart  = mysqli_query($connect, "UPDATE carts SET status = 1 WHERE 
                uid = '$uid' AND orderid = '".$_SESSION['orderid']."'") or die(mysqli_error($connect));
                if(!empty($update_cart)):
                    $inser_products = mysqli_query($connect, "INSERT INTO orders SET 
                        uid = '$uid', 
                        status = 1, 
                        qty = '".$_SESSION['qty']."', 
                        price = '".$_SESSION['total_price']."', 
                        orderid = '".$_SESSION['orderid']."', 
                        year = '$DateTime'") or die(mysqli_error($connect));
                    if(!empty($inser_products)):
                        $query_needs = mysqli_query($connect, "INSERT INTO needs SET 
                            uid = '$uid', 
                            food = '".$_SESSION['food_name']."', 
                            drink = '". $_SESSION['drink_name']."',  
                            orderid = '".$_SESSION['orderid']."',
                            s_table = '".$_SESSION['table']."' 
                            ")or die(mysqli_error($connect));
                        if(!empty($query_needs)):
                            $_SESSION['Done'] = $_SESSION['orderid'];
                             header("LOCATION:".base_url("verify.php?rdr=".$orderid));
                        endif;
                    endif;
                endif;
            endif;
        endif;
    endif;  
endif;
?>
<title><?=TITLE5;?></title>




<!DOCTYPE html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <link rel="shortcut icon" href="<?=base_url('');?>assets/img/fav.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?=base_url('');?>assets/img/fav.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('');?>assets/img/fav.png">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.css">

      
    </head>
    <body>

        <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-inverse main-content-boxed">

          







   <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <div class="my-50 text-center">
                        <h2 class="font-w700 text-black mb-10">Food Directory Payment!</h2>
                        <h3 class="h5 text-muted mb-0">Dashboard</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="block block-fx-shadow">
                                <ul class="nav nav-tabs nav-tabs-block nav-justified" data-toggle="tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link ac" href="">Make Payments Here</a>
                                    </li>
                                </ul>

                                        <div class="block-content tab-content">
                                            <div class="tab-pane active" id="crypto-buy">
                                                <form action="<?=base_url('');?>pay.php?rdir" method="POST">
                                                    <div class="form-group row">
                                                        <div class="form-group row">
                                                  
                                                   <div class="col-6 border-r">
                                                        <div class="input-group input-group-lg">
                                                         <label class="col-12" for="crypto-buy-from">First Name</label>                           
                                                            <input type="text" class="form-control" id="crypto-sell-btc" readonly="" value="<?=$firstname;?>" name="firstname" placeholder="First Name">
                                                        </div>
                                                    </div>


                                                    <div class="col-6">
                                                        <div class="input-group input-group-lg">
                                                             <label class="col-12" for="crypto-buy-from">Last Name</label>                        
                                                            <input type="" class="form-control" id="crypto-sell-btc" readonly="" name="lastname" value="<?=$lastname;?>" placeholder="Last Name">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                    <label class="col-12" for="crypto-buy-from">Email Addresss</label>
                                                    <div class="col-12">
                                                       <input type="" class="form-control" id="crypto-sell-btc" name="email" readonly="" value="<?=$email;?>" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12" for="crypto-buy-to">Card Details</label>
                                                    <div class="col-12">
                                                       <input type="" class="form-control" id="crypto-sell-btc" required="" name="pin" placeholder="0000 0000 0000 0000">
                                                    </div>
                                                     <div class="col-6 border-r">
                                                        <div class="input-group input-group-lg">
                                                         <label class="col-12" for="crypto-buy-from">Expiry Date</label>                           
                                                            <input type="text" class="form-control" id="crypto-sell-btc" required="" name="expiry" placeholder="MM/YY">
                                                        </div>
                                                    </div>


                                                    <div class="col-6">
                                                        <div class="input-group input-group-lg">
                                                             <label class="col-12" for="crypto-buy-from">CVV</label>                        
                                                            <input type="" class="form-control" id="crypto-sell-btc" required="" name="cvv" placeholder="123">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                  
                                                   <div class="col-3 border-r">
                                                        <div class="input-group input-group-lg">
                                                            <div class="input-group-append">
                                                                <select class="input-group-text font-w600" readonly="" disabled="true">
                                                                    <option>NGN</option>
                                                                </select>
                                                                <!-- <span >Quatity</span> -->
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-9">
                                                        <div class="input-group input-group-lg">
                                                            <input type="text" class="form-control" id="crypto-sell-btc" readonly="" name="price" value="<?=number_format($_SESSION['total_price']);?>" placeholder="56666">
                    
                                                        </div>
                                                    </div>
                                                </div>



                                                <hr>

                                                <div class="form-group row offset-lg-3">
                                                  
                                                   <div class="col-6 border-r">
                                                        <div class="input-group input-group-lg">
                                                            <div class="input-group-append">
                                                               <button type="submit" name="add" value="pay" class="btn btn-lg btn-block btn-success">Pay Now</button>
                                                                <!-- <span >Quatity</span> -->
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-6 ">
                                                        <div class="input-group input-group-lg"><a class="btn btn-xs btn-danger" href="<?=base_url("home.php");?>">Cancel pay</a>
                                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-12 text-center">                                                    
                                                        <div class="font-size-sm text-muted" >
                                                            <i class="fa fa-lock"></i> <em style="color: #000;">secure <strong>by</strong> <span>Food Directorate</span> </em>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

           
        </div>
        
        <script src="assets/js/codebase.core.min.js"></script>

      
        <script src="assets/js/codebase.app.min.js"></script>
    </body>
</html>