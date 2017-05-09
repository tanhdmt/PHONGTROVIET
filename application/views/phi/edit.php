<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>phi/edit/<?=$cp->MaCP?>" method="post">
		
			<h1>Cập nhật Phí</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="department_name">Tên phí:</label>
					<input type="text" id="tenphi" name="tenphi" required value="<?=$cp->TenCP?>" placeholder="" readonly/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="department_budget">Đơn giá:</label>
					<input type="text" id="dongia" name="dongia" required value="<?=$cp->DonGia?>" placeholder=""/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Lưu</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>