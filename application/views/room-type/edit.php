<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
            <form action="<?php echo base_url(); ?>room-type/edit/<?=$room_type->MaLoaiPhong?>" method="post">
		
			<h1>Cập nhật loại phòng</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="room_type">Loại phòng:</label>
					<input type="text" id="type" name="type" required value="<?=$room_type->TenLoaiPhong?>" placeholder="" readonly/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="room_price">Giá phòng:</label>
					<input type="number" min="1" id="price" name="price" required value="<?=$room_type->GiaPhong?>" placeholder=""/>
					<i icon="icon-dollar"></i>
				</div> <!-- /field -->

				<!--div class="field">
					<label for="room_quantity">Quantity:</label>
					<input type="number" min="1" id="quantity" name="quantity" value="<?=$room_type->room_quantity?>" placeholder="Quantity"/>
				</div--> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Lưu</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>
