<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form id="add" action="<?php echo base_url(); ?>thanhvien/add/<?=$mp->MaPhong?>" method="post">
		
			<h1>Thêm thành viên mới</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="employee_username">Tên thành viên:</label>
					<input type="text" id="tentv" name="tentv" maxlength="50" required placeholder="" onkeypress="check()" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Số điện thoại:</label>
					<input type="text" id="sdt" name="sdt" maxlength="11" minlength="10" digits placeholder="" onkeypress="check()"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="employee_firstname">Số CMND:</label>
					<input type="text" id="cmnd" name="cmnd" maxlength="12" minlength="9" digits placeholder="" onkeypress="check()"/>
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
				
				<button id="btnSubmit" class="button btn btn-success btn-large">Thêm</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>
<script type="text/javascript">
	$(document).ready(function(){
    $.validator.addMethod("checkTenTV", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"POST",
                async: false,
                url: "<?php echo site_url('thanhvien/check_tenTV'); ?>", // script to validate in server side
                data: {tentv: value, maphong: <?=$mp->MaPhong?>},
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
        "Đã có tên thành viên này trong phòng."
    );
    $.validator.addMethod("lettersonly", 
    	function(value, element) {
  			return this.optional(element) || /^[a-z]+$/i.test(value);
		}, 
		"Chỉ nhập chữ cái"
	); 
    $("#add").validate({
        rules: {
          tentv:{
            required: true,
            maxlength: 50,
            checkTenTV: true,
            lettersonly: true
          },
          sdt:{
            minlength: 10,
            maxlength: 11,
            digits: true
          },
          cmnd:{
            minlength: 9,
            maxlength: 12,
            digits: true
          }
        },
        messages: {
            tentv: { 
              required: "Tên thành viên không được bỏ trống" ,
              maxlength: "Tên đăng nhập tối đa 50 kí tự" 
            },
            sdt: { 
              minlength: "Tối thiểu 10 kí tự",
              maxlength: "Tối đa 11 kí tự",
              digits: "Số điện thoại không đúng định dạng"

            },
            cmnd: { 
              minlength: "Tối thiểu 9 kí tự",
              maxlength: "Tối đa 12 kí tự",
              digits: "Số chứng minh không đúng định dạng"
            }
        },
        submitHandler: function(form) { // <- pass 'form' argument in
            //$(".submit").attr("disabled", true);
            e.preventDefault(e);
            //form.submit(); // <- use 'form' argument here.
        }

    });
    function check()
    {
    	$("#add").valid();
    }
  });
</script>