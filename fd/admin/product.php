<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
// session_destroy();
if($user_level == 2){
    header("LOCATION: ".base_url('')."homes.php");
}

if(isset($_POST['addin']) && $_POST['addin'] == 'product'):
    $er = false;
    $name = $_POST['title'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    $image_name = $_FILES['pimage']['name'];
    $image_type = $_FILES['pimage']['type'];
    $image_size = $_FILES['pimage']['size'];
    $image_tmp  = $_FILES['pimage']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 300;//kb
     $Representgallery_pimage = strtoupper($name."_Product").rand()."_".date("y").".".$image_extension;

        // $destination1 = base_home('upload');
        $destination = '../upload';
        if (empty('pimage')){
            $er = true;
            $errmsg = "Sorry this field is require";
        }else{

            if (!in_array($image_extension, $image_allowed_extention)) {
                $er = true;
                $errmsg = "File not allowed";
            }

            if (!in_array($image_type, $image_allowed_type)) {
                $er = true;
                $errmsg = "Invalid Image type";
            }

            if ($image_size > ($image_allowed_size*1024)){
                $er = true;
                $errmsg = "Sorry Image size should not be less than 1024kb";
            }
        }

    if($er == false):
        $queryinsert = mysqli_query($connect, "INSERT INTO products SET name = '$name', type = '$type', price = '$price', img = 'upload/$Representgallery_pimage'");
         move_uploaded_file($_FILES['pimage']['tmp_name'],"$destination/$Representgallery_pimage");
        if(!empty($queryinsert)):
            $er = false;
            $_SESSION['success'] = "Product Added Complete";
        endif;
    endif;

endif;    
?>
<title><?=TITLE3;?></title>

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <!-- Material Design -->
                    <h2 class="content-heading">Add Products</h2>
                     <?php
                            if (isset($_SESSION['success'])) { ?>
                                <div class="js-notify btn btn-lg btn-success" data-type="success" data-icon="fa fa-check" style="padding: 30px; margin-left: 40%;"><?=$_SESSION['success']?></div>

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
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Static Labels -->
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Products</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <form action="<?=base_url('');?>product.php" method="POST" enctype="multipart/form-data"> 

                                        
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <div class="form-material">
                                                    <input type="text" class="form-control" id="material-gridf" required="" name="title" placeholder="Products Title">
                                                    <label for="material-gridf">product Name</label>
                                                </div>
                                            </div> 
                                            <div class="col-6">
                                                <div class="form-material">
                                                    <input type="file" class="form-control" id="material-gridf" required="" name="pimage" placeholder="Products Title">
                                                    <label for="material-gridf">product Image</label>
                                                </div>
                                            </div>                                           
                                        </div>                                        
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <div class="form-material">
                                                    <select class="form-control" id="material-select" name="type">
                                                        <option required="" >.. Please Select ..</option>
                                                        <option required=""  value="Food">Food</option>
                                                        <option required=""  value="Drink">Drink</option>
                                                    </select>
                                                    <label for="material-select">Product Type</label>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <div class="col-12">
                                                <div class="form-material">
                                                    <input type="number"  class="form-control" required="" id="material-email" name="price" placeholder="e.g 1000">
                                                    <label for="material-email">Price</label>
                                                </div>
                                            </div>
                                        </div>              
                                        
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <button type="submit" name="addin" value="product" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Static Labels -->
                        </div>
                       
                    </div>
                    <!-- END Material Design -->
                </div>
                

            </main>
            
        </div>
        


        <script src="assets/js/codebase.core.min.js"></script>

      
        <script src="assets/js/codebase.app.min.js"></script>
        <script src="assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="assets/js/plugins/es6-promise/es6-promise.auto.min.js"></script>
        <script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_ui_activity.min.js"></script>

        <!-- Page JS Helpers (BS Notify Plugin) -->
        <script>jQuery(function(){ Codebase.helpers('notify'); });</script>
    </body>
</html>

<?php unset($_SESSION['sucess']);?>