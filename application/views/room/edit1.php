<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">

		<form action="<?php echo base_url(); ?>room/edit1/<?=$department->MaPhong?>" method="post">
		
			<h1>Cập nhật thông tin phòng</h1>		
<? if(isset($error)) {?>
			<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Error!</strong> <?=$error?>
            </div>
<? } ?>


			<div class="add-fields">
				<div class="field">
					<label for="nguoithue">Người đại diện phòng:</label>
					<select id="nguoithue" name="nguoithue">
					<?
						foreach ($thanhvien as $tv) {
							?>
							<option value="<?=$tv->TenTV?>" <? if($tv->TenTV==$department->NguoiDD) { echo "selected"; } ?>><?=$tv->TenTV?></option>
							<?
						}
					?>
					</select>
				</div> 
				
				<div class="field">
					<label for="ngaythue">Ngày thuê phòng:</label>
					<? if(!empty($department->NgayThue)){?>
						<input type="date" id="ngaythue" name="ngaythue" value = "<?php echo date('Y-m-d',strtotime($department->NgayThue)) ?>" placeholder=""/>
					<? }else {?>
						<input type="date" id="ngaythue" name="ngaythue" placeholder=""/>
					<?}?>
				</div> 

				<div class="field">
					<label for="songuoi">Ghi chú:</label>
					<textarea rows="4" id="ghichu" name="ghichu" value="<?=$department->GhiChu?>" value="" maxlength="200" placeholder=""></textarea>
				</div> 

				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Lưu</button>
				
			</div> <!-- .actions -->			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>
