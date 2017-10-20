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
  <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script> 
  <script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery-printme.js"></script>
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
                    <li><a href="#" onclick="setting();return false;">Cài đặt</a></li>
                    <li><a href="<?php echo base_url('login/logout'); ?>">Đăng xuất</a></li>
                  </ul>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=DEPARTMENT_NAME?></a>
                </li>
              </ul>
              <button class="btn btn-success btn-medium pull-right" onclick="danhsachdp()">Đặt phòng <span id="datphong" class="badge" style="background-color: #fff; color: #000"></span></button> 
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
              <li <? if($page == "nguoithue"){ echo 'class="active"'; } ?>><a href="<?php echo base_url('nguoithue'); ?>""><i class="icon-group"></i><span>Danh sách người thuê phòng</span> </a> </li>
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
      <script type="text/javascript">
          var usrname;
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "<?php echo site_url('welcome/get_soluongdp'); ?>",
        dataType: 'json',
        success:function(data){
            $('#datphong').append(data.Count);
        }
    });
    $.validator.addMethod("checkUserName", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"POST",
                async: false,
                url: "<?php echo site_url('welcome/check_username'); ?>", // script to validate in server side
                data: {username: value, deuser:usrname},
                success: function(data) {
                    if (data==1)
                      result = false;
                    else
                      result = true;
                }
            });
            // return true if username is exist in database
            return result; 
        }, 
        "Tên đăng nhập đã tồn tại. Vui lòng nhập tên đăng nhập khác"
    );
    $.validator.addMethod("checkOldPass", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"POST",
                async: false,
                url: "<?php echo site_url('welcome/check_oldpass'); ?>", // script to validate in server side
                data: {oldpass: value, name: usrname},
                success: function(data) {
                    if (data==1)
                      result = true;
                    else
                      result = false;
                }
            });
            // return true if username is exist in database
            return result; 
        }, 
        "Mật khẩu cũ không khớp"
    );
    $("#form2").validate({
        rules: {
          tennt:{
            required: true,
            maxlength: 50
          },
          username:{
            required: true,
            maxlength: 30,
            checkUserName: true
          },
          oldpass:{
            required: true,
            minlength: 8,
            maxlength: 30,
            checkOldPass: true
          },
          newpass:{
            required: true,
            minlength: 8,
            maxlength: 30
          },
          repass:{
            required: true,
            minlength: 8,
            maxlength: 30,
            equalTo: '#newpass'
          }
        },
        messages: {
            tennt: { 
              required: "Tên nhà trọ không được bỏ trống",
              maxlength: "Tên nhà trọ tối đa 50 kí tự" 
            },
            username: { 
              required: "Tên đăng nhập không được bỏ trống" ,
              maxlength: "Tên đăng nhập tối đa 30 kí tự" 
            },
            oldpass: { 
              required: "Mật khẩu cũ không được bỏ trống" ,
              minlength: "Tối thiểu 8 kí tự",
              maxlength: "Mật khẩu tối đa 30 kí tự"
            },
            newpass: { 
              required: "Mật khẩu mới không được bỏ trống" ,
              minlength: "Tối thiểu 8 kí tự",
              maxlength: "Mật khẩu tối đa 30 kí tự"
            },
            repass: { 
              required: "Không được bỏ trống" ,
              minlength: "Tối thiểu 8 kí tự",
              maxlength: "Mật khẩu tối đa 30 kí tự",
              equalTo: "Mật khẩu không khớp"
            },
        },
        submitHandler: function(form) { // <- pass 'form' argument in
            //$(".submit").attr("disabled", true);
            e.preventDefault(e);
            //form.submit(); // <- use 'form' argument here.
        }

    });

  });
  function setting()
  {

    $.ajax({
        type: "GET",
        url: "<?php echo site_url('welcome/show_info'); ?>",
        dataType: 'json',
        success:function(data){
            console.log(data.TenNT);
            $('[name="tennt"]').val(data.TenNT);
            $('[name="username"]').val(data.Username);
            usrname = data.Username;
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Cập nhật tài khoản'); // Set title to Bootstrap modal title
        }
    });
  }
  function showpass()
  {
    $("#pass-form").toggle('show');
  }
  function check()
  {
    $("#form2").valid()
  }

  function save()
  {
    //$("#form2").valid();
    //$("#form2").submit();
    // return false;
    if($("#form2").valid()){
      $('#btnSave').text('đang lưu..'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable 
      // ajax adding data to database
      $.ajax({
          url : "<?php echo site_url('welcome/update_info'); ?>",
          type: "POST",
          data: $('#form2').serialize(),
          dataType: "JSON",
          success: function(data)
          {
              $('#modal_form2').modal('toggle');
              $('#btnSave').text('Lưu'); //change button text
              $('#btnSave').attr('disabled',false); //set button enable 
          }
      });
    }
  }
  function danhsachdp()
  {
    $("#danhsach").empty();
    $.ajax({
        type: "GET",
        url: "<?php echo site_url('welcome/ds_datphong'); ?>",
        dataType: 'json',
        success:function(data){
            $.each( data, function( key, value ) {
                $("#danhsach").append("<tr>\
                  <td>"+value.TenNguoiDat+"</td>\
                  <td>"+value.SDT+"</td>\
                  <td>"+value.NgayDat+"</td>\
                  <td>"+value.GhiChu+"</td>\
                </tr>");              
            });
            $('#modal_list').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Danh sách người đặt phòng'); // Set title to Bootstrap modal title
        }
    });
   
  }
  $.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
  } 
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form2" role="dialog" style="width: 420px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form2" class="form-horizontal">
                    <div class="form-body" style="margin-left: 40px;">
                        <div class="form-group">
                            <label><strong>Tên Nhà trọ</strong></label>
                            <div>
                                <input name="tennt" maxlength="50" class="form-control" type="text" onblur="check()" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><strong>Tên đăng nhập</strong></label>
                            <div>
                                <input name="username" maxlength="30" class="form-control" type="text" onblur="check()" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div>
                                <button type="button" class="btn btn-success" onclick="showpass()"><i class="btn-icon-only icon-key"></i> Đổi mật khẩu</button>
                            </div>
                        </div>
                        <div id="pass-form" style="display: none; margin-top: 10px;">
                          <div class="form-group">
                              <label><strong>Mật khẩu cũ</strong></label>
                              <div>
                                  <input name="oldpass" maxlength="30" minlength="8" class="form-control" onblur="check()" type="password" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label><strong>Mật khẩu mới</strong></label>
                              <div>
                                  <input name="newpass" id="newpass" maxlength="30" minlength="8" class="form-control" onkeypress="check()" type="password" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label><strong>Nhập lại mật khẩu</strong></label>
                              <div>
                                  <input name="repass" maxlength="30" minlength="8" class="form-control" onkeypress="check()" type="password" required>
                              </div>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Lưu</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_list" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Danh sách người đặt phòng</h3>
            </div>
            <div class="modal-body form">
                <table class="table table-striped ">
                  <thead style="background-color: #22a5f8; color:#fff;">
                    <tr>
                      <th style="width: 30%"> Tên người đặt phòng </th>
                      <th style="width: 20%"> Số điện thoại </th>
                      <th style="width: 20%"> Ngày đặt phòng </th>
                      <th style="width: 30%;text-align: center;"> Ghi chú </th>
                      
                    </tr>
                  </thead>
                  <tbody id="danhsach">

                  </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<style type="text/css">
  .error {
    color: #F00;
    background-color: #FFF;
    border-color: #F00;
  }
</style>
<? } ?>
<!-- /subnavbar -->

