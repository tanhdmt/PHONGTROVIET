<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>room/add" method="post">
		
			<h1>Thêm phòng mới</h1>		
<? if(isset($error)) {?>
			<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Error!</strong> <?=$error?>
            </div>
<? } ?>

			<div class="add-fields">

				<!-- <div class="field">
					<label for="maphong">Mã phòng:</label>
					<input type="number" min="1" id="maphong" name="maphong" required value="" placeholder=""/>
				</div> <!-- /field --> 
				
				<!-- <div class="field">
					<label for="ngaythue">Ngày thuê phòng:</label>
					<input type="date" id="ngaythue" name="ngaythue" placeholder=""/>
					<i icon="icon-dollar"></i>
				</div> 

				<div class="field">
					<label for="nguoithue">Tên người thuê:</label>
					<input type="text" id="nguoithue" name="nguoithue" value="" placeholder=""/>
				</div> 

				
				<div class="field">
					<label for="songuoi">Số người trong phòng:</label>
					<input type="number" min="0" id="songuoi" name="songuoi" required value="" value="" placeholder=""/>
				</div>  -->

				<!-- <div class="field">
					<label for="giaphong">Giá phòng:</label>
					<input type="number" min="0" id="giaphong" name="giaphong" required value="" value="" placeholder=""/>
				</div> <!-- /field --> 
				<div class="field">
					<label for="loai">Chọn loại phòng:</label>
					<select id="loaiphong" name="loaiphong">
					<?
						foreach ($loaiphong as $lp) {
							?>
							<option value="<?=$lp->MaLoaiPhong?>"><?=$lp->TenLoaiPhong?></option>
							<?
						}
					?>
					</select>
				</div> <!-- /field -->
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Thêm phòng</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>