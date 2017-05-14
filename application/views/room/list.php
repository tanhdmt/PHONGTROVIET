<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
        <h2> Danh sách các phòng </h2>
        <br>
        	<div>
				<a href="<?php echo base_url(); ?>room/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm phòng</a>
				<form class="navbar-search pull-right" action="<?php echo base_url('search'); ?>" method="POST">
                	<input type="text" name="customer" id="mySearch" onkeyup="myFunction()" class="search-query" placeholder="Tìm kiếm người thuê trọ">
              	</form>
			</div>
			<br>
			<table id="myTable" class="table table-striped">
				<thead style="background-color: #22a5f8; color:#fff;">
				  <tr>
				    <th > Mã phòng </th>
				    <th > Ngày thuê </th>
				    <th > Người thuê </th>
				    <!-- <th> Dự định trả </th> -->
				    <th > Loại phòng </th>
				    <th > Số người ở trong phòng </th>
				    <th  class="td-actions"> Công cụ </th>
				  </tr>
				</thead>
				<tbody>
				<?
                                    if($rooms){
					foreach ($rooms as $rm) {
						// $emp->username
				?>
				  <tr>
				    <td class="count"	> </td>	
				    <? if($rm->tinhtrang != "Trống") { ?>	
						<td> <?=$rm->ngaythue ?> </td>
					<? } else {?>
						<td> </td>
				    <? } ?>
					
				    <? if($rm->tinhtrang != "Trống") { ?>	
						<td> <?=$rm->nguoidd ?></a></td>
					<? } else {?>
						<td> <a href="<?php echo base_url(); ?>room/chothue/<?=$rm->maphong?>" class="btn btn-small btn-primary"> Cho thuê</a></td>
				    <? } ?>
				    <!-- <td> <?=$rm->dudinhtra ?> </td> -->
				    <td> <?=$rm->tenloai ?> </td>
				    <td style="text-align: center;"> <?=$rm->songuoi ?></td>
				    <td class="td-actions">
						
				    	<a href="<?php echo base_url(); ?>room/edit/<?=$rm->maphong?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-gear"> </i> Sửa</a>
				    	<? if($rm->tinhtrang != "Trống") { ?>	
							<a href="<?php echo base_url(); ?>thanhvien/info/<?=$rm->maphong?>"" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i> Thông tin phòng</a>
						<?}?>
				    	<a href="<?php echo base_url(); ?>room/history/<?=$rm->maphong?>" class="btn btn-small btn-warning"><i class="btn-icon-only icon-undo"> </i> Lịch sử thuê</a>
				    	 
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

