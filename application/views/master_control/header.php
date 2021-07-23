<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hci Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo site_url('admin/bootstrap/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('admin/bootstrap/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo site_url('admin/bootstrap/css/ionicons.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo site_url('admin/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo site_url('admin/dist/css/skins/_all-skins.min.css');?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo site_url('admin/plugins/iCheck/flat/blue.css');?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo site_url('admin/plugins/morris/morris.css');?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo site_url('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo site_url('admin/plugins/datepicker/datepicker3.css');?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo site_url('admin/plugins/daterangepicker/daterangepicker-bs3.css');?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo site_url('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
     <!-- jQuery 2.1.4 -->
    <script src="<?php echo site_url('admin/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo site_url('admin/plugins/jQueryUI/jquery-ui.min.js');?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo site_url('admin/bootstrap/js/bootstrap.min.js');?>"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo site_url('admin/plugins/jQuery/raphael-min.js');?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo site_url('admin/plugins/sparkline/jquery.sparkline.min.js');?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo site_url('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
    <script src="<?php echo site_url('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo site_url('admin/plugins/knob/jquery.knob.js');?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo site_url('admin/plugins/jQuery/moment.min.js');?>"></script>
    <script src="<?php echo site_url('admin/plugins/daterangepicker/daterangepicker.js');?>"></script>
    <!-- datepicker -->
    <script src="<?php echo site_url('admin/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo site_url('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo site_url('admin/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo site_url('admin/plugins/fastclick/fastclick.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo site_url('admin/dist/js/app.min.js');?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo site_url('admin/dist/js/pages/dashboard.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo site_url('admin/dist/js/demo.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('ckeditor/ckeditor.js');?>"></script>
<script src="<?php echo site_url('admin/js/jquery.multiselect.js');?>"></script>
<link href="<?php echo site_url('admin/js/jquery.multiselect.css');?>" rel="stylesheet" type="text/css">
    <script src="<?php echo site_url('admin/js/jquery.dataTables.min.js');?>"></script>
  <link rel="stylesheet" href="<?php echo site_url('admin/js/jquery.dataTables.min.css');?>">  
    
<script type="text/javascript" language="javascript">
var AdminLTEOptions = {
  enableControlSidebar: false,
}
</script>
</head>
  <body class="skin-blue sidebar-mini wysihtml5-supported">
  <div id="proccedtologin" style="background:rgba(0,0,0,0.4); display:none; position:fixed; width:100%; height:100%; overflow:hidden; z-index:999999999999999; left:0; top:0">
  <div style="position:absolute; width:100%; height:100%; ">
    <div style="background: none repeat scroll 0 0 #FFFFFF; border: 5px solid #666666; left: 38%; position: absolute; top: 45%; width: 325px; text-align:center; padding-top:10px;"><img src="<?php echo site_url('images/ajax-loader.gif');?>" align="middle" />
      <div style="color: #000000; font-size: 12px; font-weight: bold; padding: 5px; text-align:left" id="loginmsg"> </div>
    </div>
  </div>
</div>
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('administrator/index'); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>sonalshreshthakheria</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="<?php echo site_url('images/logo.png') ?>" width="200" alt="logo"/></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" id="showopenclicktoggle">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu1" style="float:right;">
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0px !important; ">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo site_url('images/logo.png');?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">Administrator</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo site_url('images/logo.png');?>" class="img-circle" alt="User Image">
                    <p>
                      Administrator
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('administrator/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo site_url('images/logo.png') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo site_url('administrator/index'); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="ion-person"></i>
                <span>Admin Control</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>

            
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/salesetting'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i> Manage Profile</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/solution'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Solution</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/leader'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Leadership</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/resources'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Resources</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/climate'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Climate Change</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/news'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>News & Media</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/upevent'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Upcoming Event</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/event'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Past Event</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/blog'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Blog</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/comment'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Comment</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/member'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Member Details</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/admin'); ?>" title="Modify Settings"><i class="fa fa-circle-o"></i>Change Password</a></li>
              </ul>
            </li>
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Content Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/banner'); ?>"><i class="fa fa-circle-o"></i>Home Slide Banner</a></li>
                <li><a href="<?php echo site_url('administrator/staticbanner'); ?>"><i class="fa fa-circle-o"></i>Home Static Banner</a></li>
                <li><a href="<?php echo site_url('administrator/pages'); ?>"><i class="fa fa-circle-o"></i> CMS Pages</a></li>
              </ul>
            </li>
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>