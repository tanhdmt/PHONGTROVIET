<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>register" method="post">
		
			<h1>ĐĂNG KÝ</h1>		
			<?php if(!empty($success_message)) { ?>	
			<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
			<?php } ?>
			<?php if(!empty($error_message)) { ?>	
			<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
			<?php } ?>
			<div class="register-fields">
				<p>Vui lòng cung cấp thông tin của bạn</p>
				<div class="field">
					<label for="tennt">Tên Nhà trọ*</label>
					<input type="text" id="tennt" maxlength="50" autocomplete="off" required name="tennt" value="" placeholder="Nhập tên nhà trọ" class="login tennt-field" />
				</div> <!-- /tennt -->

				<div class="field">
					<label for="username">Username*</label>
					<input type="text" id="username" maxlength="30" autocomplete="off" required name="username" value="" placeholder="Username" class="login tusername-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Mật khẩu*</label>
					<input type="password" id="password" maxlength="30" autocomplete="off" required name="password" value="" placeholder="Nhập mật khẩu" class="login tpassword-field"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="cf-password">Xác nhận lại mật khẩu*</label>
					<input type="password" id="cf-password" maxlength="30" autocomplete="off" required name="cf-password" value="" placeholder="Xác nhận lại mật khẩu" class="login cf-password-field"/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
	
				<button class="button btn btn-success btn-large">Đăng ký</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

<style type="text/css">
	.error-message {
	padding: 7px 28px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 28px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
</style>