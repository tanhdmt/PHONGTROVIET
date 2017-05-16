<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>login" method="post">
		
			<h1>ĐĂNG NHẬP</h1>		
			
			<div class="login-fields">
				<?
				if(@$error) {
				?>
				<div class="alert"><button type="button" class="close" data-dismiss="alert">×</button>Username hoặc password bị sai</div>
				<? } ?>
				<p>Vui lòng cung cấp thông tin của bạn</p>
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" maxlength="30" autocomplete="off" required name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" maxlength="30" autocomplete="off" required name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Giữ luôn đăng nhập</label>
				</span>
									
				<button class="button btn btn-success btn-large">Đăng nhập</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<div class="login-extra">
	<p><a href="<?php echo base_url('register'); ?>">Bạn chưa có tài khoản?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="/forget">Khôi phục mật khẩu</a>
	</p>
</div> <!-- /login-extra -->
