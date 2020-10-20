<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
if(!isset($_SESSION['Done'])):
    header("LOCATION:".base_url("order.php?rdr=no_order=Place"));
endif;
?>
<!DOCTYPE html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <link rel="shortcut icon" href="<?=base_url('');?>assets/img/fav.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?=base_url('');?>assets/img/fav.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('');?>assets/img/fav.png">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="<?=base_url('');?>assets/css/codebase.css">

      
    </head>
    <body>

        <!-- <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-inverse main-content-boxed"> -->

          



                <div id="page-container" class="main-content-boxed">

                            <main id="main-container">

                                <div class="hero bg-white">
                                    <div class="hero-inner">
                                        <div class="content content-full">
                                            <div class="py-30 text-center">
                                                <div class="display-3 text-success">
                                                    <i class="fa fa-check-circle"></i> Successful
                                                </div>
                                                <h1 class="h2 font-w700 mt-30 mb-10">Hi,  <?=$firstname;?></h1>
                                                <h2 class="h3 font-w400 text-muted mb-50">Your orders payment has been recieved. We will review your order in seconds. Thank</h2>
                                                <a class="btn btn-hero btn-rounded btn-alt-info" href="<?=base_url('');?>">
                                                    <i class="fa fa-arrow-left mr-10"></i> Back Home
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </main>
                        </div>
<?php
unset($_SESSION['Done']);
unset($_SESSION['food']);
unset($_SESSION['drink']);
unset($_SESSION['orderid']);
?>
          <script src="assets/js/codebase.core.min.js"></script>

        <script src="assets/js/codebase.app.min.js"></script>
    </body>
</html>