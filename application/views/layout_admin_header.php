<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?> | Pemira Online  </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?=base_url()?>css/skins/skin-blue.min.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?=base_url()?>image/cl-circ.png' />
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>O</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Pemira</b>Online  </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
      <?php if($this->session->logged_in){ ?>

        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?=base_url()?>image/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?=$this->session->name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
              <img src="<?=base_url()?>image/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  <?=$this->session->name?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?=base_url()?>admin/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>        
        </ul>
        <?php  } ?>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <?php if($this->session->logged_in){ ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>image/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          </br>
          <p><?=$this->session->name?></p>
        </div>
      </div>
      <?php } ?>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <?php if($this->session->logged_in){ ?>
               <li <?php if($active=="list"){ ?>class="active" <?php }?>><a href="<?=base_url()?>admin/list"><i class="fa  fa-tachometer"></i> <span>List</span></a></li>
               <li <?php if($active=="paslon"){ ?>class="active" <?php }?>><a href="<?=base_url()?>admin/paslon"><i class="fa  fa-tachometer"></i> <span>Paslon</span></a></li>
        <?php }else{ ?>
        <li <?php if($active=="vote"){ ?>class="active" <?php }?>><a href="<?=base_url()?>vote"><i class="fa  fa-tachometer"></i> <span>Vote</span></a></li>
        <li <?php if($active=="result"){ ?>class="active" <?php }?>><a href="<?=base_url()?>result"><i class="fa  fa-tachometer"></i> <span>Result</span></a></li>
        <?php }?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
