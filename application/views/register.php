<div class="account-container">
	
	<div class="content clearfix">
		
		<form id="register" action="<?php echo base_url(); ?>register" method="post">
		
			<h1>ĐĂNG KÝ</h1>		
			<div class="register-fields">
				<p>Vui lòng cung cấp thông tin của bạn</p>
				<div class="field">
					<label for="tennt">Tên Nhà trọ*</label>
					<input type="text" id="tennt" maxlength="50" required name="tennt" placeholder="Nhập tên nhà trọ" class="login tennt-field" onblur="check()" />
				</div> <!-- /tennt -->

				<div class="field">
					<label for="username">Username*</label>
					<input type="text" id="username" maxlength="30" required name="username" placeholder="Username" class="login username-field" onblur="check()"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Mật khẩu*</label>
					<input type="password" id="password" maxlength="30" autocomplete="off" required name="password" value="" placeholder="Nhập mật khẩu" class="login password-field" onblur="check()"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="cf-password">Xác nhận lại mật khẩu*</label>
					<input type="password" id="cf-password" maxlength="30" autocomplete="off" required name="repass" value="" placeholder="Xác nhận lại mật khẩu" class="login password-field" onblur="check()"/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
	
				<button class="button btn btn-success btn-large" type="submit">Đăng ký</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

<script type="text/javascript">
	$(document).ready(function(){
    $.validator.addMethod("checkUserName", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"POST",
                async: false,
                url: "<?php echo site_url('register/check_username'); ?>", // script to validate in server side
                data: {username: value},
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
    $("#register").validate({
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
          password:{
            required: true,
            minlength: 8,
            maxlength: 30
          },
          repass:{
            required: true,
            minlength: 8,
            maxlength: 30,
            equalTo: '#password'
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
            password: { 
              required: "Mật khẩu không được bỏ trống" ,
              minlength: "Tối thiểu 8 kí tự",
              maxlength: "Mật khẩu tối đa 30 kí tự"
            },
            repass: { 
              required: "Không được bỏ trống" ,
              minlength: "Tối thiểu 8 kí tự",
              maxlength: "Mật khẩu tối đa 30 kí tự",
              equalTo: "Mật khẩu không khớp"
            }
        },
	    submitHandler: function (form) {
	        $("#modal_thongbao_2").modal('show');
	        $('#btnSubmit').click(function () {
	            form.submit();
	       });
	    }

    });
    
  });
	function check()
    {
    	$("#register").valid();
    }

</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_thongbao_2" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-thongbao2-title">Thông báo</h3>
            </div>
            <div class="modal-body form">
                <h4><i class="icon-foursquare icon-2x" style="color: #66ff33;"></i> Đăng ký thành công</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="btnSubmit">OK</button>
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
