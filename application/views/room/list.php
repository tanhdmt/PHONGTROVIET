<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<a href="<?php echo base_url(); ?>room/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm phòng</a>
			<br><br>
			<table class="table table-striped table-bordered">
				<thead>
				  <tr>
				    <th style="width: 10%;"> Mã phòng </th>
				    <th style="width: 15%;"> Ngày thuê </th>
				    <th style="width: 20%;"> Người thuê </th>
				    <!-- <th> Dự định trả </th> -->
				    <th style="width: 15%;"> Loại phòng </th>
				    <th style="width: 15%;"> Số người ở trong phòng </th>
				    <th style="width: 25%;" class="td-actions"> Công cụ </th>
				  </tr>
				</thead>
				<tbody>
				<?
                                    if($rooms){
					foreach ($rooms as $rm) {
						// $emp->username
				?>
				  <tr>
				    <td class="count"> </td>	
					<td> <?=$rm->ngaythue ?> </td>
				    <? if($rm->tinhtrang != "Trống") { ?>	
						<td> <?=$rm->nguoidd ?></a></td>
					<? } else {?>
						<td> <a href="<?php echo base_url(); ?>room/chothue/<?=$rm->maphong?>" class="btn btn-small btn-primary"> Cho thuê</a></td>
				    <? } ?>
				    <!-- <td> <?=$rm->dudinhtra ?> </td> -->
				    <td> <?=$rm->tenloai ?> </td>
				    <td> <?=$rm->songuoi ?></td>
				    <td class="td-actions">
				    	<a href="<?php echo base_url(); ?>thanhvien/info/<?=$rm->maphong?>"" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i> Thông tin phòng</a>
				    	<a href="<?php echo base_url(); ?>room/edit/<?=$rm->maphong?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-gear"> </i> Sửa</a>
				    	
				    </td>
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
