<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>thanhvien/edit/<?=$tv->MaTV?>/<?=$tv->MaPhong?>" method="post">
		
			<h1>Cập nhật thông tin thành viên</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="employee_username">Tên thành viên:</label>
					<input type="text" id="tentv" name="tentv" required value="<?=$tv->TenTV?>" placeholder=""/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Số điện thoại:</label>
					<input type="text" id="sdt" name="sdt" value="<?=$tv->Sdt?>" placeholder=""/>
				</div> <!-- /password -->

				<div class="field">
					<label for="employee_firstname">Số CMND:</label>
					<input type="text" id="cmnd" name="cmnd" value="<?=$tv->CMND?>" placeholder=""/>
				</div> <!-- /field -->

				<div class="field">
					<label for="department_id">Giới tính:</label>
					<select id="gioitinh" name="gioitinh">
						<option value="Nam" <? if($tv->GioiTinh=="Nam") { echo "selected"; } ?>>Nam</option>
						<option value="Nữ" <? if($tv->GioiTinh=="Nữ") { echo "selected"; } ?>>Nữ</option>
					</select>
				</div> <!-- /field -->
				
				<!-- <div class="field">
					<label for="department_id">Chức vụ:</label>
					<select id="chucvu" name="chucvu">
						<option value="DD" <? if($tv->ChucVu=="DD") { echo "selected"; } ?>>Người đại diện</option>
						<option value="TV" <? if($tv->ChucVu=="TV") { echo "selected"; } ?>>Thành viên</option>
					</select>
				</div>  -->
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Lưu</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>