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

?>

 
                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form action="be_pages_generic_search.html" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Close Search Section -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <!-- END Close Search Section -->
                                </div>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                   
     
                    <!-- Table Head Default -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Customers Needs</h3>
               
                        </div>
                        <div class="block-content">
                            <table class="table table-vcenter">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">S/N</th>
                                        <th>Customer Name</th>
                                        <th>Food</th>
                                        <th>Drink</th>
                                        <th>Quantity</th>
                                        <th>Sitting Table</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                		
                                	if(!isset($_GET['u'])):
                                		header("LOCATION:".base_url('orders.php?rdir=Access-denie'));			    
									
										// $u = isset($_GET['u']);
										// $io = isset($_GET['io'])										
									endif;
                                	$cnt= '';
                                     echo$n_uid = base64_decode($_GET['u']).'<br>';
                                        echo $n_oi = base64_decode($_GET['oi']);
	                        		   $order_list = mysqli_query($connect, "SELECT * FROM needs JOIN users ON needs.uid = users.id JOIN orders ON needs.uid = orders.uid WHERE orders.orderid = '".$n_oi."' AND needs.n_id= '".$n_uid."' " )or die(mysqli_error($connect));
                                       // print_r($order_list);
									   $q_order = mysqli_fetch_assoc($order_list);?>
	                                     <tr>
	                                        <th class="text-center" scope="row">1<?=$cnt;?></th>
	                                        <td><?=$q_order['firstname'];?></td>
	                                        <td><?=$q_order['food'];?></td>                                      		
	                                        <td><?=$q_order['drink'];?></td>                                      		
	                                        	
                                            <td><?=$q_order['qty'];?></td>
	                                        <td><?=$q_order['s_table'];?></td>
	                                        <td class="d-none d-sm-table-cell">
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

	                                            ?>
	                                        </td>                                        
	                                    </tr> 
                                                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Table Head Default -->                  
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