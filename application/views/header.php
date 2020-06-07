<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MTN Ethics Quiz Platform - <?php echo $title; ?> - <?php echo $sub_title; ?> ::.</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo base_url('inc/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!--<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo base_url('inc/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('inc/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url('inc/css/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url('inc/css/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url('inc/css/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url('inc/css/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url('inc/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('inc/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('inc/css/style.css') ?>" rel="stylesheet" type="text/css" />
        <link rel="icon" href="<?php echo base_url('inc/img/mtn-logo-nav.svg'); ?>" sizes="16x16" type="image/svg+xml">
		<style type='text/css'>
		.flexigrid div.form-div input[type="text"]
		{
			height:30px !important;
		}
		</style>
		
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url(); ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="<?php echo base_url('inc/img/mtn-logo-nav.svg'); ?>" width="35px"> MTN Ethics Quiz Platform
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $user_fullname; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url('inc/img/'.$user_pic); ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $user_fullname; ?>
                                        <small><?php echo $user_position; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('inc/img/'.$user_pic); ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $user_firstname_only; ?></p>
                            <small><i class="fa fa-circle text-success"></i> <?php echo $user_position; ?></small>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li <?php  if(uri_string()=='admin' || uri_string()=='') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin') ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li <?php  if(uri_string()=='admin/user/add') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin/user/add') ?>">
                                <i class="fa fa-user"></i> <span>Add User</span>
                            </a>
                        </li>
                        <li <?php  if(uri_string()=='admin/user') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin/user') ?>">
                                <i class="fa fa-user"></i> <span>View User(s)</span>
                            </a>
                        </li>
                        <li <?php  if(uri_string()=='admin/question/add') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin/question/add') ?>">
                                <i class="fa fa-plus"></i> <span>Add Q&A</span>
                            </a>
                        </li>
                        <li <?php  if(uri_string()=='admin/question') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin/question') ?>">
                                <i class="fa fa-book"></i> <span>View Q&A</span>
                            </a>
                        </li>
                        <li <?php  if(uri_string()=='admin/quiz') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin/quiz') ?>">
                                <i class="fa fa-question"></i> <span>Review Quiz</span>
                            </a>
                        </li>
                        <li <?php  if(uri_string()=='admin/department') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin/department') ?>">
                                <i class="fa fa-shield"></i> <span>Manage Department</span>
                            </a>
                        </li>
                        <li <?php  if(uri_string()=='admin/reset') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin/reset') ?>">
                                <i class="fa fa-gear"></i> <span>Reset</span>
                            </a>
                        </li>
                        <li <?php  if(uri_string()=='admin/logout') echo  'class="active"'; ?>>
                            <a href="<?php echo base_url('admin/logout'); ?>">
                                <i class="fa fa-sign-out"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>