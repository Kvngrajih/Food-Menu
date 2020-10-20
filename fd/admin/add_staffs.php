<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
// session_destroy();
if($user_level == 2){
    header("LOCATION: ".base_url('')."homes.php");
}



date_default_timezone_set('Africa/Lagos');// change according timezone
$DateTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['add_st']) && $_POST['add_st'] == 'staffs'):
    $er = false;
    $fname = mysqli_real_escape_string($connect, ucwords($_POST['fname']));
    $lname = mysqli_real_escape_string($connect, ucwords($_POST['lname']));
    $email = mysqli_real_escape_string($connect, strtolower($_POST['email']));
    $password = $_SESSION['password'] = mysqli_real_escape_string($connect, sanitize(clean(ucwords(strtolower($_POST['password'])))));
    $password = md5(sha1($password)).sha1($password);
    if($er == false):
        $query_reg = mysqli_query($connect, "INSERT INTO admin SET 
            firstname = '$fname', 
            lastname = '$lname', 
            email = '$email', 
            user_level = '2',
            password = '$password' 
            ")or die(mysqli_error($connect));
        if(empty($query_reg)):
            $er = true;
            $_SESSION['errmsg'] = "Fail to Staff";
            // header("LOCATION:". base_url('add_staffs.php'));
        else:
            $er = false;
            $_SESSION['success'] = "Staff Added Complete";
            // header("LOCATION:". base_url('add_staffs.php'));
        endif;
    endif;
endif;
?>
<title><?=TITLE2;?></title>

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <h2 class="content-heading">Submit New Staff Cridentials</h2>
                    <div class="row">

                         <?php
                            if (isset($_SESSION['success'])) { ?>
                                <div class="js-notify btn btn-sm btn-alt-success" data-type="success" data-icon="fa fa-check" style="padding: 30px; margin-left: 40%;"><?=$_SESSION['success']?></div>
                               
                        <?php }?>

                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Add Staffs</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option">
                                            <!-- <i class="si si-wrench"></i> -->
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <form action="<?=base_url('');?>add_staffs.php" method="POST"> 

                                        
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <div class="form-material">
                                                    <input type="text" class="form-control" required="" id="material-gridf" name="fname" placeholder="Firstname">
                                                    <label for="material-gridf">First Name</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-material">
                                                    <input type="text" class="form-control" required="" id="material-gridl" name="lname" placeholder="Lastname">
                                                    <label for="material-gridl">Last Name</label>
                                                </div>
                                            </div>
                                        </div>                                        
                                       
                                         <div class="form-group row">
                                            <div class="col-12">
                                                <div class="form-material">
                                                    <input type="email" class="form-control" required="" id="material-email" name="email" placeholder="Please enter your email">
                                                    <label for="material-email">Email</label>
                                                </div>
                                            </div>
                                        </div>                
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <div class="form-material">
                                                    <input type="text" class="form-control" readonly="" id="material-password" name="password" value="Admin">
                                                    <label for="material-password">Default Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <button type="submit" name="add_st" value="staffs" class="btn btn-success">Submit</button>
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
        
<?php

require "inc/footer.php";


?>