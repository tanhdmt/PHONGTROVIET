<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="span4">
        <!-- <a href="<?php echo base_url(); ?>customer/add/reservation" class="btn btn-success btn-large">Add Customer</a>
 -->
        <div class="account-container">
          
          <div class="content">
            
            
            
              <h1>Thông tin</h1>    
<? if(isset($error)) {?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Error!</strong> <?=$error?>
      </div>
<? } ?>
<? if(isset($success)) {?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Success!</strong> <?=$success?>
      </div>
<? } ?>
      <div class="add-fields">

        <div class="field">
          <label for="customer_TCno"><i class="icon-user"></i> Tên người đại diện phòng:</label>
          <h4 class="ten">Dương Tuấn Anh</h4>
        </div> <!-- /field -->

        <div class="field">
          <label for="customer_TCno"><i class="icon-phone"></i> Số điện thoại:</label>
          <h4 class="ten">01672417012</h4>
        </div> <!-- /field -->
        
        <div class="field">
          <label for="customer_TCno"><i class="icon-calendar"></i> Ngày thuê phòng:</label>
          <h4 class="ten">06/05/2017</h4>
        </div> <!-- /field -->

        <div class="field">
          <label for="customer_TCno"><i class="icon-group"></i> Số thành viên trong phòng:</label>
          <h4 class="ten">3</h4>
        </div> <!-- /field -->
        
        <div class="field">
          <label for="customer_TCno"><i class="icon-tag"></i> Loại phòng:</label>
          <h4 class="ten">Phòng VIP</h4>
        </div> <!-- /field -->

        <div class="field">
          <label for="customer_TCno"><i class="icon-time"></i> Ngày trả phòng:</label>
          <h4 class="ten"></h4>
        </div> <!-- /field -->
        <!--div class="field">
          <label for="room_quantity">Quantity:</label>
          <input type="number" min="1" id="quantity" name="quantity" value="" placeholder="Quantity"/>
        </div--> <!-- /field -->

      </div> <!-- /login-fields -->
      
      <!-- <div class="login-actions">
        
        <button class="button btn btn-success btn-large">List Available</button>
        
      </div> <!-- .actions --> 
      
      
      
    
    
  </div> <!-- /content -->
</div> <!-- /account-container -->
</div>
<style type="text/css">.account-container{margin-top: 0px;padding-bottom: 15px;}.ten{padding-left: 15px; color:#3470d1;}.field{margin-bottom: 7px;}</style>
      <div class="span7">
      <a href="<?php echo base_url(); ?>room/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm thành viên</a>
      <br><br>
        <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th> Tên thành viên </th>
            <th> Số điện thoại </th>
            <th> Số CMND </th>
            <th> Giới tính </th>
            <th class="td-actions"> Công cụ </th>
          </tr>
        </thead>
        <tbody>
        <?
                                    if($rooms){
          foreach ($rooms as $rm) {
            // $emp->username
        ?>
          <tr>
            <td> <?=$rm->tentv ?> </td> 
          <td> <?=$rm->sdt ?> </td>
            <td> <?=$rm->cmnd ?> </td>
            <td> <?=$rm->gioitinh ?> </td>
            <td class="td-actions">
              <a href="<?php echo base_url(); ?>room/edit/<?=$rm->maphong?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a>
              <a href="<?php echo base_url(); ?>room/delete/<?=$rm->maphong?>" onclick="return confirm('Bạn có muốn xóa?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
            </td>
          </tr>
        <? }} ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
