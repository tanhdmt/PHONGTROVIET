<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>room/chothue/<?=$thue->MaPhong?>" method="post">
		
			<h1>Cho thuê phòng</h1>		
<? if(isset($error)) {?>
			<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Error!</strong> <?=$error?>
            </div>
<? } ?>

			<div class="add-fields">

				<div class="field">
					<label for="ten">Tên người thuê:</label>
					<input type="text" id="nguoithue" name="nguoithue" required value="" maxlength="50" placeholder=""/>
				</div> 
				
				<div class="field">
					<label for="ngaythue">Ngày thuê phòng:</label>
					<input type="date" id="ngaythue" name="ngaythue" value = "<?php echo date('Y-m-d',strtotime(date("Y-m-d"))) ?>" placeholder=""/>
					<!-- <i icon="icon-dollar"></i> -->
				</div> 

				<div class="field">
					<label for="ghichu">Ghi chú:</label>
					<input type="text" id="ghichu" name="ghichu" value="" placeholder="" maxlength="200" style="height: 50px;"/>
				</div> 

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Lưu</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>