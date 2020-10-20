

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

        <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-inverse main-content-boxed">

            <nav id="sidebar">
                
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow px-15">
                        <!-- Mini Mode -->
                        <div class="content-header-section sidebar-mini-visible-b">
                            <!-- Logo -->
                            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <!-- <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span> -->
                            </span>
                            <!-- END Logo -->
                        </div>
                        <!-- END Mini Mode -->

                        <!-- Normal Mode -->
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Sidebar -->

                            <!-- Logo -->
                            <div class="content-header-item">
                                <a class="link-effect font-w700" href="<?=base_url('home.php');?>">
                                    <!-- <i class="si si-fire text-primary"></i> -->
                                    <img src="<?=base_url('')?>assets/img/logo.png" style="width: 200px;">
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->

                   
                    <div class="content-side content-side-full content-side-user px-10 align-parent">
                        <!-- Load -->
                       

                         <div class="sidebar-mini-visible-b align-v animated fadeIn">
                                            <img class="img-avatar img-avatar32" src="<?=base_url('');?>assets/img/avatar.jpg" alt="">
                                        </div>
                                    
                                        <div class="sidebar-mini-hidden-b text-center">
                                            <a class="img-link" href="be_pages_generic_profile.html">
                                                <img class="img-avatar" src="<?=base_url('');?>assets/img/avatar.jpg" alt="">
                                            </a>
                                            <ul class="list-inline mt-10">
                                                <li class="list-inline-item">
                                                    <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href=""><?=$firstname;?>
                                                        
                                                    </a>
                                                </li>
                                                
                                                <li class="list-inline-item">
                                                    <a class="link-effect text-dual-primary-dark" href="<?=base_url('');?>logout.php">
                                                        <i class="si si-logout"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                           
                    </div>
                    
                    
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a href="<?=base_url('home.php');?>" class="nav-submenu"><i class="fa fa-dashboard" style="color: #000;"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                            </li>

                                <li class="open">
                                    <ul>

                                        <li>
                                            <a href="<?=base_url('order.php');?>" ><i class="si si-bag " style="color: #fff; margin-left: -43px; "></i><span class="sidebar-mini-hide">Start Order</span></a>
                                        </li>

                                        <li>
                                            <a href="<?=base_url('check_order.php');?>" ><i class="fa fa-archive" style="color: #fff; margin-left: -43px; "></i><span class="sidebar-mini-hide">Check Orders</span></a>
                                        </li>
                                    </ul>
                                </li>                                 
                        </ul>
                    </div>
                   
                </div>
                
            </nav>
          







           
            <header id="page-header">                
                <div class="content-header">                    
                    <div class="content-header-section">
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </div>
                   


            
                    <div class="content-header-section">
                     
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block"><?=$firstname.' '.$lastname;?></span>
                                <i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                                <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">Customers</h5>
                                <a class="dropdown-item" href="">
                                    <i class="si si-user mr-5"></i> Profile
                                </a>

                                <div class="dropdown-divider"></div>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=base_url('');?>logout.php">
                                    <i class="si si-logout mr-5"></i> Sign Out
                                </a>
                            </div>
                        </div>
                        

                    </div>

                </div>
            

                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </header>
          