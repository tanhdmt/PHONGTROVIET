<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>phi/add" method="post">
		
			<h1>Thêm phí mới</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="department_name">Tên phí:</label>
					<input type="text" id="tenphi" name="tenphi" required value="" maxlength="30" placeholder=""/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="department_budget">Đơn giá:</label>
					<input type="text" id="dongia" name="dongia" required value="" maxlength="11" placeholder=""/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Thêm</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>