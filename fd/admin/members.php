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
 <title><?=TITLE4;?></title>

            <!-- Main Container -->
            <main id="main-container">
            	<div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">All Customers <small></small></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell">Email</th>
                                        <th class="d-none d-sm-table-cell">Number</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">User Id</th>
                                        <th class="text-center" style="width: 15%;">Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	$cnt = 1; 
                                	$query_user = mysqli_query($connect, "SELECT * FROM users");
                                	while($get_u = mysqli_fetch_assoc($query_user)){?>

                                    <tr>
                                        <td class="text-center"><?=$cnt;?></td>
                                        <td class="font-w600"><?=$get_u['firstname'].' '.$get_u['lastname'];?></td>
                                        <td class="d-none d-sm-table-cell"><?=$get_u['email'];?></td>
                                        <td class="d-none d-sm-table-cell"><?=$get_u['phone'];?></td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-danger"><?=$get_u['orderpin'];?></span>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" title="View Customer">
                                                <i class="fa fa-user"></i>
                                            </button>
                                        </td>
                                    </tr> 
                                   <?php $cnt++; }?>                               
                                </tbody>
                            </table>
                        </div>
                    </div>




                    <br><br>


                <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">All Staffs <small></small></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell">Email</th>
                                        <!-- <th class="d-none d-sm-table-cell">Number</th> -->
                                        <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">User Id</th> -->
                                        <th class="text-center" style="width: 15%;">Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	$cnt = 1; 
                                	$query_admin = mysqli_query($connect, "SELECT * FROM admin WHERE user_level = '2'");
                                	while($get_a = mysqli_fetch_assoc($query_admin)){?>

                                    <tr>
                                        <td class="text-center"><?=$cnt;?></td>
                                        <td class="font-w600"><?=$get_a['firstname'].' '.$get_a['lastname'];?></td>
                                        <td class="d-none d-sm-table-cell"><?=$get_a['email'];?></td>
                                        
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" title="View Customer">
                                                <i class="fa fa-user"></i>
                                            </button>
                                        </td>
                                    </tr> 
                                   <?php $cnt++; }?>                               
                                </tbody>
                            </table>
                        </div>
                    </div>








            </main>
            
        </div>



                      <script src="assets/js/codebase.core.min.js"></script>

        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_tables_datatables.min.js"></script>

    </body>
</html>