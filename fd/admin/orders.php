<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
// session_destroy();
if($user_level == 2){
     echo "<title>".TITLE1."</title>"; 
}else{
   echo "<title>".TITLE5."</title>"; 
}

// $oid_p = base64_decode($_GET['Processing']);
if(isset($_GET['Processing'])):
    $oid_p = base64_decode($_GET['Processing']);
    $q_p = mysqli_query($connect, "UPDATE orders SET status = '4' WHERE o_id = '$oid_p'");
    if(!empty($q_p)):
        $success = "You Just Mark this Order has Proccessing";
    endif;
elseif(isset($_GET['Complete'])): 
  $oid_c = base64_decode($_GET['Complete']);  
    $q_c = mysqli_query($connect, "UPDATE orders SET status = '3' WHERE o_id = '$oid_c'");
    if(!empty($q_c)):
        $success = "You Just Mark this Order has Completed";
    endif;
endif;
?>

 
                <!-- Header Search -->
              
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <div class="bg-image" style="background-image: url('assets/media/photos/photo26@2x.jpg');">
                    <div class="bg-black-op-75">
                        <div class="content content-top content-full text-center">
                            <div class="py-20">
                                <h1 class="h2 font-w700 text-white mb-10"><?= ucwords($ad_user_level);?> Oders</h1>
                                <h2 class="h4 font-w400 text-white-op mb-0">Welcome <?= $ad_firstname;?>,<a class="text-primary-light link-effect" href="<?=base_url('');?>orders.php"> Here are the full record sales</a>.</h2>
                            </div>
                        </div>
                    </div>
                </div>
               

               
                <div class="bg-body-light border-b">
                    <div class="content py-5 text-center">
                        <nav class="breadcrumb bg-body-light mb-0">
                            <a class="breadcrumb-item" href="be_pages_ecom_dashboard.html"><?= ucwords($ad_user_level);?></a>
                            <span class="breadcrumb-item active">Oders</span>
                        </nav>
                    </div>
                </div>




                <div class="content">
                    
                    <div class="row gutters-tiny">

                        <?php 
                            $allcnt = mysqli_query($connect,"SELECT * FROM orders");
                            $all_num = mysqli_num_rows($allcnt);
                            $pendindcnt = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '1'");
                            $pendind_num = mysqli_num_rows($pendindcnt);
                            $cancelcnt = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '2'");
                            $cancel_num = mysqli_num_rows($cancelcnt);
                            $completecnt = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '3'");
                            $complete_num = mysqli_num_rows($completecnt);


                            $allcnt1 = mysqli_query($connect,"SELECT * FROM orders WHERE status = 1");
                            $all_num1 = mysqli_num_rows($allcnt1);
                            $pendindcnt1 = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '1'");
                            $pendind_num1 = mysqli_num_rows($pendindcnt1);
                            $cancelcnt1 = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '2'");
                            $cancel_num1 = mysqli_num_rows($cancelcnt1);
                            $completecnt1 = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '3'");
                            $complete_num1 = mysqli_num_rows($completecnt1);

                        ?>
                       
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-sun" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-spinner fa-spin text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?=$pendind_num;?>">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Pending</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-cherry" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-times text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?=$cancel_num;?>">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Canceled</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        

                        
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-lake" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-check text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?=$complete_num;?>">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Completed</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        

                        <?php 
                            if($user_level == 1):
                                echo '<div class="col-md-6 col-xl-3">
                                            <a class="block block-rounded block-transparent bg-gd-dusk" href="javascript:void(0)">
                                                <div class="block-content block-content-full block-sticky-options">
                                                    <div class="block-options">
                                                        <div class="block-options-item">
                                                            <i class="fa fa-archive text-white-op"></i>
                                                        </div>
                                                    </div>
                                                    <div class="py-20 text-center">
                                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="'.$all_num.'">0</div>
                                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">All</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>';
                            elseif($user_level == 2):
                                echo '<div class="col-md-6 col-xl-3">
                                            <a class="block block-rounded block-transparent bg-gd-dusk" href="javascript:void(0)">
                                                <div class="block-content block-content-full block-sticky-options">
                                                    <div class="block-options">
                                                        <div class="block-options-item">
                                                            <i class="fa fa-archive text-white-op"></i>
                                                        </div>
                                                    </div>
                                                    <div class="py-20 text-center">
                                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="'.$all_num1.'">0</div>
                                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Available Order</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>';

                            endif;

                        ?>
                        
                      
                    </div>
                    

                    <!-- Orders -->
                    <div class="content-heading">
                       
                        <div class="dropdown float-right mr-5">
                           
                           
                        </div>
                       
                        <?php
                            if($user_level==1):
                                echo 'Orders ('.$all_num.')';
                            elseif($user_level==2):
                                 echo 'Orders ('.$all_num1.')';
                            endif;
                        ?>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-content bg-body-light">
                            <!-- Search -->
                             <?php
                            if (isset($success)) { ?>
                                <div class="js-notify btn btn-lg btn-success" data-type="success" data-icon="fa fa-check" style="padding: 30px; margin-left: 40%;"><?=$success?></div>

                                <!-- <div class=" btn btn-sm btn-alt-success" data-type="success" data-icon="fa fa-check" data-message="<?=$_SESSION['success']?>"><?=$_SESSION['success']?></div> -->


                                <script type="text/javascript">
                                    Codebase.helpers('notify', {
                                        align: 'right',             // 'right', 'left', 'center'
                                        from: 'top',                // 'top', 'bottom'
                                        type: 'info',               // 'info', 'success', 'warning', 'danger'
                                        icon: 'fa fa-info mr-5',    // Icon class
                                        message: '<?=$_SESSION['success']?>'
                                    });                                                            

                                </script>
                              
                        <?php }?>
                            <!-- END Search -->
                        </div>
                        <div class="block-content">
                            <!-- Orders Table -->
                            <table class="table table-bordered table table-striped table-vcenter js-dataTable-full-pagination">
                               
                                    <?php
                                        if($user_level == 1):
                                            require "oa.php";
                                        elseif($user_level == 2):
                                            require "os.php";
                                        endif;
                                    ?>                           
                                
                            </table>
                                                     
                        </div>
                    </div>                   
                </div>
              

            </main>
         
        </div>
        

               <script src="assets/js/codebase.core.min.js"></script>

                <script src="assets/js/codebase.app.min.js"></script>

        
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    
        <script src="assets/js/pages/be_tables_datatables.min.js"></script>
        </body>
</html>