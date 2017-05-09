<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="span4">
      <div class="wrap">
        <a href="<?php echo base_url(); ?>hoadon/info/<?=$daidien->MaPhong?>" class="element btn btn-success btn-large" style="float:"><i class="icon-money"></i>  Danh sách Hóa đơn</a>
        <!-- <a href="<?php echo base_url(); ?>customer/add/reservation" class="element btn btn-primary btn-large"><i class="icon-gear"></i>  Cài đặt phí</a> -->
      </div>
        <div class="account-container">
          
          <div class="content">
            
            
              <h1><span>Thông tin</span>
              <a href="<?php echo base_url(); ?>room/edit1/<?=$daidien->MaPhong?>" class="btn btn-large btn-primary pull-right"><i class="btn-icon-only icon-cog"> </i></a>
              </h1>   

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
          <h4 class="ten"><?=$daidien->TenTV?></h4>
        </div> <!-- /field -->

        <div class="field">
          <label for="customer_TCno"><i class="icon-phone"></i> Số điện thoại:</label>
          <h4 class="ten">0<?=$daidien->Sdt?></h4>
        </div> <!-- /field -->
        
        <div class="field">
          <label for="customer_TCno"><i class="icon-calendar"></i> Ngày thuê phòng:</label>
          <h4 class="ten"><?=$daidien->NgayThue?></h4>
        </div> <!-- /field -->

        <div class="field">
          <label for="customer_TCno"><i class="icon-group"></i> Số thành viên trong phòng:</label>
          <h4 class="ten"><?=$daidien->SoNguoi?></h4>
        </div> <!-- /field -->
        
        <div class="field">
          <label for="customer_TCno"><i class="icon-tag"></i> Loại phòng:</label>
          <h4 class="ten"><?=$daidien->LoaiPhong?></h4>
        </div> <!-- /field -->

        <div class="field">
          <label for="customer_TCno"><i class="icon-time"></i> Ngày trả phòng:</label>
          <h4 class="ten"><?=$daidien->NgayTra?></h4>
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
<div class="account-container">
  <div class="content">
    <h3 class="ghichu"><i class="icon-info-sign"></i> Ghi chú</h3>
    <h4 class="ten"><?=$ghichu->GhiChu?></h4>
  </div>
</div>


</div>
<style type="text/css">.wrap{display: table;}.element{width:50%;display:table-cell;}.ghichu{padding-bottom:10px;}.account-container{margin-top: 10px;margin-bottom:10px;padding-bottom: 15px;}.ten{padding-left: 15px; color:#3470d1;}.field{margin-bottom: 7px;}</style>
      <div class="span7">
      <a href="<?php echo base_url(); ?>thanhvien/add/<?=$thanhvien[0]->MaPhong?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm thành viên</a>
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
                                    if($thanhvien){
          foreach ($thanhvien as $rm) {
            // $emp->username
        ?>
          <tr>
            <td> <?=$rm->TenTV ?> </td> 
            <td> <?=$rm->Sdt ?> </td>
            <td> <?=$rm->CMND ?> </td>
            <td> <?=$rm->GioiTinh ?> </td>
            <td class="td-actions">
              <a href="<?php echo base_url(); ?>thanhvien/edit/<?=$rm->MaTV?>/<?=$rm->MaPhong?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a>
              <a href="<?php echo base_url(); ?>thanhvien/delete/<?=$rm->MaTV?>/<?=$rm->MaPhong?>" onclick="return confirm('Bạn có muốn xóa?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
            </td>
          </tr>
        <? }} ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
