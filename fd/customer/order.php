<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
// session_destroy();
date_default_timezone_set('Africa/Lagos');// change according timezone
$DateTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['add']) && $_POST['add'] == 'tocart'):
    $er = false;
    $food = $_SESSION['food'] = $_POST['food'];
    $drink = $_SESSION['drink'] = $_POST['drink'];
    $qty = $_SESSION['qty'] = $_POST['qty'];
    $table = $_SESSION['table'] = "Table ".$_POST['table'];
    $query_food_price = mysqli_query($connect, "SELECT price, name FROM products WHERE id = '$food'") or die(mysqli_error($connect));
    $get_foodprice = mysqli_fetch_assoc($query_food_price);
    $_SESSION['food_name'] = $get_foodprice['name'];
    $query_drink_price = mysqli_query($connect, "SELECT price, name FROM products WHERE id = '$drink'") or die(mysqli_error($connect));
    $get_drinkprice = mysqli_fetch_assoc($query_drink_price);
    $_SESSION['drink_name'] = $get_drinkprice['name'];
    $allprice = $get_foodprice['price'] + $get_drinkprice['price'];
    $tatal_price = $_SESSION['total_price'] = $allprice * $qty;
    $orderid = $_SESSION['orderid'] = strtoupper("ordId.").rand()*10;
    if($er == false):
        $querycart = mysqli_query($connect, "INSERT INTO carts SET 
            uid = '$uid', 
            products = '".$get_foodprice['name'].'||'.$get_drinkprice['name']."', 
            qty = '$qty', 
            s_table = '$table', 
            price = '$tatal_price', 
            orderid = '$orderid', 
            year = '$DateTime'
            ")or die(mysqli_error($connect));
        if(!empty($querycart)):
            header("LOCATION:".base_url("pay.php?rdr=".$orderid));
        endif;
    endif;
endif;
?>
<title><?=TITLE2;?></title>

<script>
    function food_image(val) {
        $.ajax({
        type: "POST",
        url: "load_image_f.php",
        data:'food_load='+val,
            success: function(data){
                $("#display_food").html(data);
            }
        });
    }
</script>
<script>
    function drink_image(val) {
        $.ajax({
        type: "POST",
        url: "load_image_f.php",
        data:'drink_load='+val,
            success: function(data){
                $("#display_drink").html(data);
            }
        });
    }
</script>

<script>
    function getprice(val) {
        $.ajax({
        type: "POST",
        url: "getprice.php",
        data:'food_load='+val,
            success: function(data){
                $("#display_prices").html(data);
            }
        });
    }
</script>


   <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <div class="my-50 text-center">
                        <h2 class="font-w700 text-black mb-10">Start Your Ordring Now!</h2>
                        <h3 class="h5 text-muted mb-0">Order Dashboard</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="block block-fx-shadow">
                                <ul class="nav nav-tabs nav-tabs-block nav-justified" data-toggle="tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link ac" href="">Products Images</a>
                                    </li>
                                </ul>
                                        <div class="block-content tab-content">
                                            <div class="tab-pane active" id="crypto-buy">
                                                <form action="<?=base_url('');?>order.php?rdir" method="POST">
                                                    <div class="form-group row">
                                                        <div class="col-6">
                                                            <div class="block block-rounded">
                                                                <div class="block-content p-0 overflow-hidden">
                                                                    <a class="img-link">
                                                                        <span id="display_food"></span>
                                                                        
                                                                        <!-- <img class="img-fluid rounded-top" src="<?=base_url('');?>assets/img/picture.jpg" alt=""> -->
                                                                    </a>
                                                                </div>                               
                                                             </div>
                                                        </div>
                                                         <div class="col-6">
                                                            <div class="block block-rounded">
                                                                <div class="block-content p-0 overflow-hidden">
                                                                    <a class="img-link">
                                                                        <span id="display_drink"></span>                                      
                                                                        <!-- <img class="img-fluid rounded-top" src="<?=base_url('');?>assets/img/picture.jpg" alt=""> -->
                                                                    </a>
                                                                </div>                               
                                                             </div>
                                                        </div>
                                                    <label class="col-12" for="crypto-buy-from">Food List</label>
                                                    <div class="col-12">
                                                        <select class="form-control form-control-lg" required="" name="food" id="food_load" onChange="food_image(this.value);" id="crypto-buy-from" size="3">
                                                            <?php
                                                                $query_food = mysqli_query($connect,"SELECT name, id FROM products WHERE type = 'Food'");
                                                                while($get_food = mysqli_fetch_assoc($query_food)){?>                                                    
                                                                     <option value="<?=$get_food['id'];?>"><?=$get_food['name'];?></option>
                                                           <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12" for="crypto-buy-to">Drink List</label>
                                                    <div class="col-12">
                                                        <select class="form-control form-control-lg" required="" name="drink" id="drink_load" onChange="drink_image(this.value);" id="crypto-buy-from" size="3">
                                                           <?php
                                                                $query_food = mysqli_query($connect,"SELECT name, id FROM products WHERE type = 'Drink'");
                                                                while($get_food = mysqli_fetch_assoc($query_food)){?>                                                    
                                                                     <option value="<?=$get_food['id'];?>"><?=$get_food['name'];?></option>
                                                           <?php }?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                  
                                                   <div class="col-5 border-r">
                                                        <div class="input-group input-group-lg">
                                                            <input type="number" class="form-control" max="5" id="crypto-sell-btc" required="" name="qty" placeholder="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text font-w600">Quatity</span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-7">
                                                        <div class="input-group input-group-lg">
                                                            <input type="number" class="form-control" required="" id="crypto-sell-btc" name="table" placeholder="Table ">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text font-w600">Sitting Table</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-12 text-center">                                                    
                                                        <div class="font-size-sm text-muted">
                                                            <i class="fa fa-repeat"></i> <em>Fill Free To Repeat This Transaction Anytime </em>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <button type="submit" name="add" value="tocart" class="btn btn-hero btn-lg btn-block btn-alt-success">Add To Cart</button>
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