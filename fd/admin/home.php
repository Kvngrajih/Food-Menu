<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
// session_destroy();
if($user_level == 2){
    header("LOCATION: ".base_url('')."homes.php");
}
?>



 <title><?=TITLE1;?></title>
            <!-- Main Container -->
            <main id="main-container">
               
                
                <div class="bg-image" style="background-image: url('assets/media/photos/photo26@2x.jpg');">
                    <div class="bg-black-op-75">
                        <div class="content content-top content-full text-center">
                            <div class="py-20">
                                <h1 class="h2 font-w700 text-white mb-10"><?= ucwords($ad_user_level);?> Dashboard</h1>
                                <h2 class="h4 font-w400 text-white-op mb-0">Welcome <?= $ad_firstname;?>,<a class="text-primary-light link-effect" href=""> you have some pending stuffs here!</a>.</h2>
                            </div>
                        </div>
                    </div>
                </div>
               

               
                <div class="bg-body-light border-b">
                    <div class="content py-5 text-center">
                        <nav class="breadcrumb bg-body-light mb-0">
                            <a class="breadcrumb-item" href="be_pages_ecom_dashboard.html"><?= ucwords($ad_user_level);?></a>
                            <span class="breadcrumb-item active">Dashboard</span>
                        </nav>
                    </div>
                </div>
            

               
                <div class="content">

                      
                    <?php


                        if($user_level == 1):
                            $qcu = mysqli_query($connect, "SELECT * FROM users");
                             $qcur = mysqli_num_rows($qcu);
                            $orc = mysqli_query($connect, "SELECT * FROM orders");
                             $orcr = mysqli_num_rows($orc);
                             $paysum = mysqli_query($connect, "SELECT SUM(price) FROM orders");
                             $paysumr = mysqli_fetch_assoc($paysum);
                             $pendingp = mysqli_query($connect, "SELECT SUM(price) FROM orders WHERE status = '1'");
                             $pendingpr = mysqli_fetch_assoc($pendingp);
                             $cancelp = mysqli_query($connect, "SELECT SUM(price) FROM orders WHERE status = '2'");
                             $cancelpr = mysqli_fetch_assoc($cancelp);
                             $completep = mysqli_query($connect, "SELECT SUM(price) FROM orders WHERE status = '3'");
                             $completepr = mysqli_fetch_assoc($completep);


                                        
                            echo '<div class="row gutters-tiny">
                       
                        <div class="col-md-6 col-xl-4">
                            <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-area-chart text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="'.array_sum($paysumr).'" data-before="NGN">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Earnings</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        

                        <!-- Orders -->
                        <div class="col-md-6 col-xl-4">
                            <a class="block block-rounded block-transparent bg-gd-dusk" href="'.base_url("").'orders.php">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-archive text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="'.$orcr.'">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Orders</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                       

                        
                        <div class="col-md-6 col-xl-4">
                            <a class="block block-rounded block-transparent bg-gd-sea" href="'.base_url("").'members.php">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-users text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">                                        
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="'.$qcur.'">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">New Customers</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        

                       
                    </div>';


                    elseif($user_level == 2):
                         $orc = mysqli_query($connect, "SELECT * FROM orders");
                             $orcr = mysqli_num_rows($orc);
                        echo '<div class="row gutters-tiny">
                        
                       

                        
                        <div class="col-md-6 col-xl-12">
                            <a class="block block-rounded block-transparent bg-gd-dusk" href="">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-archive text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="'.$orcr.'">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Orders</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                                               
                        
                       
                    </div>';
                     else:
                        session_destroy();
                        header("LOCATION:".base_home('?rdir=invalid'));

                    endif;



                    ?>
                    

                    


                        <div class="row gutters-tiny">
                        
                        <div class="col-md-12">
                            <div class="block block-rounded block-mode-loading-refresh">
                                <div class="block-header">
                                    <h3 class="block-title">
                                        Earnings
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full bg-body-light text-center">
                                    <div class="row gutters-tiny">
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">All</div>
                                            <div class="font-size-h3 font-w600">NGN<?=array_sum($paysumr);?></div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Profit</div>
                                            <div class="font-size-h3 font-w600 text-success">NGN<?=array_sum($completepr);?></div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Lost Profit</div>
                                            <div class="font-size-h3 font-w600 text-danger">NGN<?=array_sum($cancelpr);?></div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>                  

                        
                        
                    </div>


                     <div class="row gutters-tiny">

                    <div class="col-xl-6">
                            <h2 class="content-heading">Latest Orders</h2>
                            <div class="block block-rounded">
                                <div class="block-content">
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 100px;">ID</th>
                                                <th>Status</th>
                                                <th class="d-none d-sm-table-cell">Customer</th>
                                                <th class="text-right">Price</th>
                                            </tr>
                                        </thead>
                                        <?php 


                                        ?>
                                        <tbody>
                                             <?php 
                                        $order_list = mysqli_query($connect, "SELECT * FROM orders INNER JOIN users ON orders.uid = users.id LIMIT 8");
                                        while($q_order = mysqli_fetch_assoc($order_list)){?>

                                    <tr>
                                        <td>
                                            <a class="font-w600"><?=$q_order['orderid'];?></a>
                                        </td>
                                        <td>
                                            <?php 
                                                if($q_order['status'] == 1):
                                                    echo'<span class="badge badge-warning">Pending</span>';
                                                elseif($q_order['status'] == 2):
                                                    echo'<span class="badge badge-danger">Canceled</span>';
                                                elseif($q_order['status'] == 3):                                                  
                                                    echo'<span class="badge badge-success">Completed</span>';
                                                elseif($q_order['status'] == 4):                                                  
                                                    echo'<span class="badge badge-lg badge-info">Proccessing</span>';
                                                endif;
                                            ?>
                                        </td>
                                        
                                        
                                        <td class="d-none d-sm-table-cell">
                                            <a><?=$q_order['firstname'].' '.$q_order['lastname'];?></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">NGN<?=$q_order['price'];?></span>
                                        </td>
                                    </tr> 
                                    <?php }?> 
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                      
                       <div class="col-xl-6">
                            <h2 class="content-heading">Latest Register</h2>
                            <div class="block block-rounded">
                                <div class="block-content">
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <th class="d-none d-sm-table-cell" style="width: 100px;">ID</th>
                                                <th>Customers</th>
                                                <th class="text-center">Number</th>
                                                <th class="d-none d-sm-table-cell text-center">Refer</th>
                                                <th class="d-none d-sm-table-cell text-center">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                            $cnt=1;
                                               $query_user_las = mysqli_query($connect, "SELECT * FROM users  ORDER BY `users`.`year` DESC LIMIT 8");
                                                while($query_user_lasr = mysqli_fetch_assoc($query_user_las)){?>

                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">UID.<?=$cnt;?></a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html"><?=$query_user_lasr['firstname'].' '.$query_user_lasr['lastname'];?> </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href=""><?=$query_user_lasr['phone'];?></a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href=""><?=$query_user_lasr['howuhear'];?></a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-danger">
                                                        <?=$query_user_lasr['year'];?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $cnt++; }?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        </div>
            
                    
                   
                        
                        
                       

                        
                       
                    
                    
                </div>



          








            </main>          
        </div>


   <!-- END Page Container -->

        <script src="assets/js/codebase.core.min.js"></script>

        <script src="assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_ecom_dashboard.min.js"></script>
