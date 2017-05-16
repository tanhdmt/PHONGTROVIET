<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>thanhvien/add/<?=$mp->MaPhong?>" method="post">
		
			<h1>Thêm thành viên mới</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="employee_username">Tên thành viên:</label>
					<input type="text" id="tentv" name="tentv" maxlength="50" required value="" placeholder=""/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Số điện thoại:</label>
					<input type="text" id="sdt" name="sdt" maxlength="20" value="" placeholder=""/>
				</div> <!-- /password -->

				<div class="field">
					<label for="employee_firstname">Số CMND:</label>
					<input type="text" id="cmnd" name="cmnd" maxlength="9" value="" placeholder=""/>
				</div> <!-- /field -->

				<div class="field">
					<label for="department_id">Giới tính:</label>
					<select id="gioitinh" name="gioitinh">
						<option value="Nam">Nam</option>
						<option value="Nữ">Nữ</option>
					</select>
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Thêm</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>