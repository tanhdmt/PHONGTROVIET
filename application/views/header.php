<!DOCTYPE html>
<html>
  <head>
    <title><?=$title?></title>
    <meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
	        rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/pages/dashboard.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/pages/signin.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>js/guidely/guidely.css" rel="stylesheet"> 
  <script src="<?php echo base_url(); ?>js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/fileinput.min.js"></script>

<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.15/datatables.min.js"></script> -->




	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
  </head>
  <body style="margin-bottom: 50px;">
  <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="<?php echo base_url('home'); ?>"><i class="icon-home"></i> <?=MOTEL_NAME?></a>
      <?
        if(UID){?>
          <div class="nav-collapse">
            <ul class="nav pull-right">
               <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-cog"></i> Tài khoản <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  
                </ul>
              </li>  -->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                  class="icon-user"></i> Xin chào Nhà trọ <?=FULLNAME?> (<?=USERNAME?>) <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:;">Cài đặt</a></li>
                    <li><a href="javascript:;">Trợ giúp</a></li>
                    <li><a href="<?php echo base_url('login/logout'); ?>">Đăng xuất</a></li>
                  </ul>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=DEPARTMENT_NAME?></a>
                </li>
              </ul>
              
          </div>
          <!--/.nav-collapse --> 
      <? } else {?>
        <div class="nav-collapse">
            <ul class="nav pull-right">
              <li class="dropdown"><a href="<?php echo base_url(); ?>register" class="btn btn-warning">Đăng ký</a>
              </li> 
            </ul>
            <ul class="nav pull-right">
               <li class="dropdown"><a href="<?php echo base_url(); ?>login" class="btn btn-success">Đăng nhập</a>
              </li> 
            </ul>

                <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                  class="icon-user"></i> Xin chào Nhà trọ <?=FULLNAME?> (<?=USERNAME?>) <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:;">Cài đặt</a></li>
                    <li><a href="javascript:;">Trợ giúp</a></li>
                    <li><a href="<?php echo base_url('login/logout'); ?>">Đăng xuất</a></li>
                  </ul>
                </li> -->
               <!--  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=DEPARTMENT_NAME?></a>
               </li> -->
          </div>
        <?}?>
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<?
  if(UID)
{?>
      <div class="subnavbar">
        <div class="subnavbar-inner">
          <div class="container">
            <ul class="mainnav">
 
              <li <? if($page == "room"){ echo 'class="active"'; } ?>><a href="<?php echo base_url('room'); ?>""><i class="icon-sitemap"></i><span>Danh sách các phòng</span> </a> </li>
              <li <? if($page == "room-type"){ echo 'class="active"'; } ?>><a href="<?php echo base_url('room-type'); ?>""><i class="icon-home"></i><span>Quản lý loại phòng</span> </a> </li>
              <!-- <li <? if($page == "dashboard"){ echo 'class="active"'; } ?>><a href="<?php echo base_url(); ?>"><i class="icon-dashboard"></i><span>Bảng Tin</span> </a> </li> -->
             <!--  <li <? if($page == "employee"){ echo 'class="active"'; } ?>><a href="<?php echo base_url('employee'); ?>"><i class="icon-user"></i><span>Danh sách người thuê trọ</span> </a> </li> -->
              <!-- <li <? if($page == "reservation"){ echo 'class="active"'; } ?>><a href="<?php echo base_url('reservation'); ?>"><i class="icon-list-alt"></i><span>Danh sách các loại phí</span> </a> </li> -->
              <li <? if($page == "phi"){ echo 'class="active"'; } ?>><a href="<?php echo base_url('phi'); ?>"><i class="icon-list-alt"></i><span>Quản lý các loại phí</span> </a> </li>
             <!--  <li <? if($page == "departments"){ echo 'class="active"'; } ?>><a href="<?php echo base_url('departments'); ?>"><i class="icon-file"></i><span>Departments</span> </a> </li> -->
              <li <? if($page == "caidat"){ echo 'class="active"'; } ?>><a href="<?php echo base_url('caidat'); ?>"><i class="icon-info-sign"></i><span>Thông tin nhà trọ</span> </a> </li> 
            </ul>
          </div>
          <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
      </div>
<? } ?>
<!-- /subnavbar -->