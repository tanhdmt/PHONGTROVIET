<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="<?php echo base_url(); ?>room-type/add" method="post" id="form-add">
		
			<h1>Thêm loại phòng mới</h1>		

			<div class="add-fields">

				<div class="field">
					<label for="room_type">Loại Phòng:</label>
					<input type="text" id="type" name="type" required value="" maxlength="50" placeholder="Tên loại phòng" onblur="check()" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="room_price">Giá phòng:</label>
					<input type="number" min="1" id="price" name="price" required minlength="4" maxlength="20" digits placeholder="Giá phòng" onblur="check()"/><i icon="icon-dollar"></i>
				</div> <!-- /field -->

		
				<!--div class="field">
					<label for="room_quantity">Quantity:</label>
					<input type="number" min="1" id="quantity" name="quantity" value="" placeholder="Quantity"/>
				</div--> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large" type="submit">Thêm</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>
<script type="text/javascript">
	$(document).ready(function(){
    $.validator.addMethod("checkLoaiPhong", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"POST",
                async: false,
                url: "<?php echo site_url('room/check_loaiphong'); ?>", // script to validate in server side
                data: {type: value},
                success: function(data) {
                    if (data==1)
                      result = false;
                    else
                      result = true;
                }
            });
            // return true if username is exist in database
            return result; 
        }, 
        "Đã có loại phòng này"
    );
    $("#form-add").validate({
        rules: {
          type:{
            required: true,
            maxlength: 50,
            checkLoaiPhong: true
          },
          price:{
          	required: true,
            minlength: 4,
            maxlength: 20,
            digits: true
          }
        },
        messages: {
            type: { 
              required: "Tên loại phòng không được bỏ trống" ,
              maxlength: "Tên loại phòng tối đa 50 kí tự" 
            },
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
    	$("#form-add").valid();
    }
</script>