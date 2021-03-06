<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quimicos!  </title>

    <!-- Bootstrap -->
    <link href="<?=base_url()?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?=base_url()?>Main" class="site_title"><i class="fa fa-paw"></i> <span>Quimicos!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?=$_SESSION['usuario']?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">

                            <li><a href="<?=base_url()?>Main"><i class="fa fa-home"></i> Home </a></li>
                            <?php if ($_SESSION['tipo']=='admin'):?>
                            <li><a href="<?=base_url()?>Usuario"><i class="fa fa-users"></i> Usuarios </a></li>
                            <li><a href="<?=base_url()?>Registros"><i class="fa fa-edit"></i> Registro </a></li>
                            <li><a href="<?=base_url()?>Historial" ><i class="fa fa-table"></i> Historial </a></li>
                            <li><a href="<?=base_url()?>Reportes" ><i class="fa fa-file-excel-o"></i> Reportes </a></li>
                            <?php else:?>
                            <li><a href="<?=base_url()?>Registros"><i class="fa fa-edit"></i> Registro </a></li>
                            <li><a href="<?=base_url()?>Historial" ><i class="fa fa-table"></i> Historial </a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Ayuda</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-windows"></i> Numeros de ayuda</a>
                                <!--                                <ul class="nav child_menu">-->
                                <!--                                    <li><a href="page_403.html">403 Error</a></li>-->
                                <!--                                    <li><a href="page_404.html">404 Error</a></li>-->
                                <!--                                    <li><a href="page_500.html">500 Error</a></li>-->
                                <!--                                    <li><a href="plain_page.html">Plain Page</a></li>-->
                                <!--                                    <li><a href="login.html">Login Page</a></li>-->
                                <!--                                    <li><a href="pricing_tables.html">Pricing Tables</a></li>-->
                                <!--                                </ul>-->
                            </li>
                            <!--                            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>-->
                            <!--                                <ul class="nav child_menu">-->
                            <!--                                    <li><a href="#level1_1">Level One</a>-->
                            <!--                                    </li>-->
                            <!--                                    <li><a>Level One<span class="fa fa-chevron-down"></span></a>-->
                            <!--                                        <ul class="nav child_menu">-->
                            <!--                                            <li class="sub_menu"><a href="level2.html">Level Two</a>-->
                            <!--                                            </li>-->
                            <!--                                            <li><a href="#level2_1">Level Two</a>-->
                            <!--                                            </li>-->
                            <!--                                            <li><a href="#level2_2">Level Two</a>-->
                            <!--                                            </li>-->
                            <!--                                        </ul>-->
                            <!--                                    </li>-->
                            <!--                                    <li><a href="#level1_2">Level One</a>-->
                            <!--                                    </li>-->
                            <!--                                </ul>-->
                            <!--                            </li>-->
                            <!--                            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>-->
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url()?>Welcome/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.jpg" alt=""><?=$_SESSION['usuario']?>
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="javascript:;"> Cambiar contraseña</a>
                                <!--                                <a class="dropdown-item"  href="javascript:;">-->
                                <!--                                    <span class="badge bg-red pull-right">50%</span>-->
                                <!--                                    <span>Settings</span>-->
                                <!--                                </a>-->
                                <!--                                <a class="dropdown-item"  href="javascript:;">Help</a>-->
                                <a class="dropdown-item"  href="<?=base_url()?>Welcome/logout"><i class="fa fa-sign-out pull-right"></i> Salir</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
