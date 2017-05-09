<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>room-type/add" method="post">
		
			<h1>Thêm loại phòng mới</h1>		
<? if(isset($error)) {?>
			<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Error!</strong> <?=$error?>
            </div>
<? } ?>
			<div class="add-fields">

				<div class="field">
					<label for="room_type">Loại Phòng:</label>
					<input type="text" id="type" name="type" required value="" placeholder="Tên loại phòng"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="room_price">Giá phòng:</label>
					<input type="number" min="1" id="price" name="price" required value="" placeholder="Giá phòng"/>
					<i icon="icon-dollar"></i>
				</div> <!-- /field -->

		
				<!--div class="field">
					<label for="room_quantity">Quantity:</label>
					<input type="number" min="1" id="quantity" name="quantity" value="" placeholder="Quantity"/>
				</div--> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Thêm</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>