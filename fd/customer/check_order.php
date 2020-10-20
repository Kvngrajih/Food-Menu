<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
// session_destroy();


if(isset($_GET['cancel'])):
    $oid_p = base64_decode($_GET['cancel']);
    $q_p = mysqli_query($connect, "UPDATE orders SET status = 2 WHERE orderid = '$oid_p' AND uid = '$uid'")or die(mysdqli_error($connect));
    if(!empty($q_p)):
        $success = "Your order has been cancel";
    endif;
endif;
?>

 <title><?=TITLE4;?></title>

 
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

            



                <div class="content">
                    
                    <div class="row gutters-tiny">

                        <?php 
                            
                            $pendindcnt = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '1' AND uid = '$uid' ");
                            $pendind_num = mysqli_num_rows($pendindcnt);
                            $cancelcnt = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '2' AND uid = '$uid'");
                            $cancel_num = mysqli_num_rows($cancelcnt);
                            $completecnt = mysqli_query($connect,"SELECT * FROM orders WHERE Status = '3' AND uid = '$uid'");
                            $complete_num = mysqli_num_rows($completecnt);
                           

                        ?>
                       
                        <div class="col-md-6 col-xl-4">
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
                        
                        <div class="col-md-6 col-xl-4">
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
                        

                        
                        <div class="col-md-6 col-xl-4">
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
                    
                        
                      
                    </div>
                    

                    <!-- Orders -->
                    <div class="content-heading">
                       
                        <div class="dropdown float-right mr-5">
                           
                           
                        </div>
                       
                
                    </div>
                    <div class="block block-rounded">
                        <div class="block-content bg-body-light">
                            <!-- Search -->
                             <?php
                            if (isset($success)) { ?>
                                <div class="js-notify btn btn-lg btn-danger" data-type="success" data-icon="fa fa-check" style="padding: 30px; margin-left: 40%;"><?=$success?></div>

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
                                <thead>
                                    <tr>
                                        <th style="width: 100px;">ID</th>
                                        <th>Status</th>
                                        <th class="d-none d-sm-table-cell">Quatity</th>
                                        <th class="d-none d-sm-table-cell">Customer</th>
                                        <th class="d-none d-sm-table-cell">My Needs</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $order_list = mysqli_query($connect, "SELECT * FROM orders INNER JOIN users ON orders.uid = users.id WHERE orders.uid ='$uid' ORDER BY `orders`.`year` DESC LIMIT 8" );
                                    while($q_order = mysqli_fetch_assoc($order_list)){?>

                                    <tr>
                                        <td>
                                            <a class="font-w600"><?=$q_order['orderid'];?></a>
                                        </td>
                                        <td>
                                            <?php 
                                                if($q_order['status'] == 1):
                                                    echo'<span class="badge  badge-lg badge-warning">Pending</span>';
                                                elseif($q_order['status'] == 2):
                                                    echo'<span class="badge  badge-lg badge-danger">Canceled</span>';
                                                elseif($q_order['status'] == 3):                                                  
                                                    echo'<span class="badge badge-lg badge-success">Completed</span>';
                                                elseif($q_order['status'] == 4):                                                  
                                                    echo'<span class="badge badge-lg badge-info">Proccessing</span>';
                                                endif;
                                                $oid =base64_encode($q_order['orderid']);
                                            ?>
                                        </td>
                                           
                                        <td class="d-none d-sm-table-cell">
                                            <?=$q_order['qty'];?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a><?=$q_order['firstname'].' '.$q_order['lastname'];?></a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="<?=base_url('');?>needs.php?u=<?=base64_encode($q_order['o_id']);?>&&oi=<?=base64_encode($q_order['orderid']);?>" class="btn btn-sm btn-alt-success">Check Your Ordering Items Here</a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">NGN<?=$q_order['price'];?></span>
                                        </td>
                                        <td class="">
                                            <?php
                                                if($q_order['status'] == 1):
                                                    echo '  <a href="'.base_url('').'check_order.php?cancel='.$oid.'">
                                                                <div class="btn btn-sm btn-danger">Cancel Order</div>
                                                            </a>';
                                                elseif($q_order['status'] == 4):
                                                    echo '  <a>
                                                                <div class="btn btn-sm btn-alt-danger">Action Disable Due to Proccessing</div>
                                                            </a> ';
                                                else:
                                                    echo '  <a>
                                                                <div class="btn btn-sm btn-alt-info">Action Disable</div>
                                                            </a> ';
                                                endif;
                                            ?>
                                                                
                                        </td>
                                    </tr> 
                                <?php }?> 
                                </tbody>   
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