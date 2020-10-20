<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
// session_destroy();
?>
<title><?=TITLE1;?></title>
            <!-- Main Container -->
            <main id="main-container">
                <?php
                    if(isset($_GET['Delete'])):
                        $oid_p = $_GET['Delete'];
                        $q_p = mysqli_query($connect, "DELETE FROM carts WHERE orderid = '$oid_p'");
                        if(!empty($q_p)):
                            $success = "Your order has been Deleted";
                        endif;
                    endif;
                    $cartsc = mysqli_query($connect, "SELECT * FROM carts WHERE uid = '$uid' AND status = 0");
                     $cartsr = mysqli_num_rows($cartsc);
                     $ordersc = mysqli_query($connect, "SELECT * FROM orders WHERE uid = '$uid'");
                     $ordersr = mysqli_num_rows($ordersc);
                ?>  

                <!-- Hero -->
                <div class="bg-gd-dusk">
                    <div class="bg-black-op-25">
                        <div class="content content-top content-full text-center">
                            <div class="mb-20">
                                <a class="img-link" href="">
                                    <img class="img-avatar img-avatar-thumb" src="<?=base_url('');?>assets/img/avatar.jpg" alt="">
                                </a>
                            </div>
                            <h1 class="h3 text-white font-w700 mb-10">
                                <?=$firstname.' '.$lastname;?> <i class="fa fa-star text-warning"></i>
                            </h1>
                            <h2 class="h5 text-white-op">
                                Your Total Orders <a class="text-primary-light link-effect" href="javascript:void(0)"><?=$ordersr;?> Orders</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Breadcrumb -->
                <div class="bg-body-light border-b">
                    <div class="content py-5 text-center">
                        <nav class="breadcrumb bg-body-light mb-0">
                            <a class="breadcrumb-item" href="">Customers</a>
                            <span class="breadcrumb-item active"><?=$firstname;?></span>
                        </nav>
                    </div>
                </div>
                <!-- END Breadcrumb -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Overview -->
                    <h2 class="content-heading">Overview</h2>
                    <div class="row gutters-tiny">
                         <div class="col-md-12">
                                <a class="block" href="javascript:void(0)">
                                    <div class="block-content block-content-full">
                                        <i class="si si-briefcase fa-2x text-body-bg-dark"></i>
                                        <div class="row py-20">
                                            <div class="col-6 text-right border-r">
                                                <div class="font-size-h3 font-w600"><?=$cartsr;?></div>
                                                <div class="font-size-sm font-w600 text-uppercase text-muted"><i class="si si-basket-loaded fa-2x"></i> In Cart</div>
                                            </div>
                                            <div class="col-6">
                                                <div class="font-size-h3 font-w600"><?=$ordersr;?></div>
                                                <div class="font-size-sm font-w600 text-uppercase text-muted"><i class="si si-bag fa-2x"></i> Orders</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                         </div>
                    <!-- END Overview -->

                     <div class="bg-image" style="background-image: url('assets/media/photos/photo34@2x.jpg');">
                        <div class="bg-white-op-90">
                            <div class="content">
                                <div class="py-50 nice-copy text-center">
                                    <h3 class="font-w700 mb-10">Hi, <a><?=$firstname;?></a>, </h3>
                                    <h4 class="font-w400 text-muted mb-30">Are you not hungry today?</h4>
                                    <a class="btn btn-hero btn-noborder btn-lg btn-rounded btn-success text-uppercase" href="<?=base_url('');?>order.php"><i class="si si-bag"></i> Start Order Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Addresses -->
                    <h2 class="content-heading">Addresses</h2>
                    <div class="row row-deck gutters-tiny">
                        <!-- Billing Address -->
                        <div class="col-md-12">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Billing Address</h3>
                                </div>
                                <div class="block-content">
                                    <div class="font-size-lg text-black mb-5"><?=$firstname.' '.$lastname;?></div>
                                    <address>
                                        <?=$address;?><br>
                                        <i class="fa fa-phone mr-5"></i> <?=$phone;?><br>
                                        <i class="fa fa-envelope-o mr-5"></i> <a href="javascript:void(0)"><?=$email;?></a>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <!-- END Billing Address -->

                    </div>
                    <!-- END Addresses -->

                    <!-- Cart -->
                    <h2 class="content-heading">Cart</h2>
                    <div class="block block-rounded">
                        <div class="block-content">
                            <!-- Products Table -->
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 100px;">ID</th>
                                        <th class="d-none d-sm-table-cell" style="width: 120px;">Status</th>
                                        <th class="d-none d-sm-table-cell" style="width: 120px;">Submitted</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th class="d-none d-md-table-cell">My Name</th>
                                        <th class="d-none d-md-table-cell">Actions</th>
                                        <th class="text-right">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
                                        $order_list = mysqli_query($connect, "SELECT * FROM carts JOIN users ON carts.uid = users.id WHERE carts.uid = '$uid' AND carts.status = 0  ORDER BY `carts`.`year` DESC LIMIT 8 ");
                                        while($q_order = mysqli_fetch_assoc($order_list)){?>

                                    <tr>
                                        <td>
                                            <a class="font-w600"><?=$q_order['orderid'];?></a>
                                        </td>
                                        <td>
                                            <?php 
                                                if($q_order['status'] == 0):
                                                    echo'<span class="badge badge-info">Waiting to Proceed</span>';
                                                endif;
                                            ?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?=$q_order['year'];?>                       
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?=$q_order['products'];?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?=$q_order['qty'];?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a><?=$q_order['firstname'].' '.$q_order['lastname'];?></a>
                                        </td>
                                        <td class="text">
                                            <?php
                                                                                                                          
                                                $query_get_or = mysqli_query($connect, "SELECT * FROM carts WHERE uid = '$uid'");
                                                $o_get = mysqli_fetch_assoc($query_get_or);
                                             ?>
                                           <!-- <a href="<?=base_url('');?>pay.php?carts=<?=$o_get['orderid'];?>" class="btn btn-alt-info">Continue Order</a> -->
                                           <a href="<?=base_url('');?>home.php?Delete=<?=$o_get['orderid'];?>" class="btn btn-alt-danger">Delete Order</a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">NGN<?=$q_order['price'];?></span>
                                        </td>
                                    </tr> 
                                    <?php }?>                                 
                                </tbody>
                            </table>
                            <!-- END Products Table -->
                        </div>
                    </div>
                    <!-- END Cart -->

                    <!-- Past Orders -->
                    <h2 class="content-heading">Rescent Orders</h2>
                    <div class="block block-rounded">
                        <div class="block-content">
                            <!-- Orders Table -->
                            <table class="table table-borderless table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 100px;">ID</th>
                                        <th style="width: 120px;">Status</th>
                                        <th class="d-none d-sm-table-cell" style="width: 120px;">Submitted</th>
                                        <th class="d-none d-sm-table-cell">Qty</th>
                                        <th class="d-none d-sm-table-cell">My Name</th>
                                        <th class="text-right">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $order_list = mysqli_query($connect, "SELECT * FROM orders INNER JOIN users ON orders.uid = users.id WHERE orders.uid = '$uid' ORDER BY `orders`.`year` DESC LIMIT 8");
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
                                                    echo'<span class="badge badge-info">Proccessing</span>';
                                                endif;
                                            ?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?=$q_order['year'];?>                       
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?=$q_order['qty'];?>
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
                            <!-- END Orders Table -->
                        </div>
                    </div>
                    <!-- END Past Orders -->

                </div>

            </main>
               <script src="assets/js/codebase.core.min.js"></script>

        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="assets/js/codebase.app.min.js"></script>
    </body>
</html>