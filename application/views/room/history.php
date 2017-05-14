<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<!-- <a href="<?php echo base_url(); ?>room/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm phòng</a>
			<br><br> -->
			<h2> Danh sách người từng thuê phòng</h2>
			<br>
			<table class="table table-striped ">
        <thead style="background-color: #22a5f8; color:#fff;">
          <tr>
            <th> Tên người thuê </th>
            <th> Số điện thoại </th>
            <th> Số CMND </th>
            <th> Giới tính </th>
            <th> Ngày thuê </th>
            <th> Ngày trả phòng </th>
          </tr>
        </thead>
        <tbody>
        <?
                                    if($his){
          foreach ($his as $rm) {
            // $emp->username
        ?>
          <tr>
            <td> <?=$rm->TenTV ?> </td> 
            <td> <?=$rm->Sdt ?> </td>
            <td> <?=$rm->CMND ?> </td>
            <td> <?=$rm->GioiTinh ?> </td>
            <td> <?=$rm->NgayThue ?></td>
            <td> <?=$rm->NgayTra ?></td>
          </tr>
        <? }} ?>
        </tbody>
      </table>
		</div>
	  </div>
	</div>
  </div>
</div>
<style type="text/css">
	table{counter-reset:section;}
	.count:before
	{
	counter-increment:section;
	content:counter(section);
	}

</style>
