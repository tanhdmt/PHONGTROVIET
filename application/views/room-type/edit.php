<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
            <form action="<?php echo base_url(); ?>room-type/edit/<?=$room_type->MaLoaiPhong?>" method="post" id="form-edit">
		
			<h1>Cập nhật loại phòng</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="room_type">Loại phòng:</label>
					<input type="text" id="type" name="type" required value="<?=$room_type->TenLoaiPhong?>" maxlength="50" placeholder="" readonly/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="room_price">Giá phòng:</label>
					<input type="number" min="1" id="price" name="price" required value="<?=$room_type->GiaPhong?>" maxlength="20" onblur="check()" />
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
<script type="text/javascript">
	$(document).ready(function(){

    $("#form-edit").validate({
        rules: {
          price:{
          	required: true,
            minlength: 4,
            maxlength: 20,
            digits: true
          }
        },
        messages: {
            price: { 
              required: "Giá phòng không được bỏ trống" ,
              minlength: "Tối thiểu 4 kí tự",
              maxlength: "Tối đa 20 kí tự",
              digits: "Giá phòng không đúng định dạng"

            }
        }
    });
    
  });
	function check()
    {
    	$("#form-edit").valid();
    }
</script>