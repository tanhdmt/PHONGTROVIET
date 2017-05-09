<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">		
			<h2> Danh sách hóa đơn</h2>
			<br>
			<a href="<?php echo base_url(); ?>hoadon/add/<?=$maphong?>" onclick="return confirm('Bạn có muốn thêm hóa đơn?')" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm hóa đơn</a>
			<br><br>

			<table class="table table-striped ">
				<thead style="background-color: #22a5f8; color:#fff;">
				  <tr>
				    <th style="width: 14.3%;"> Tháng lập hóa đơn</th>
				    <th style="width: 14.3%;"> Tổng tiền </th>
				    <th style="width: 14.3%;"> Nợ các tháng trước</th>
				    <th style="width: 14.3%;"> Đã trả </th>
				    <th style="width: 14.3%;"> Còn lại </th>
				    <th style="width: 14.3%;"> Ngày trả </th>
				    <th class="td-actions" style="width: 14.3%;"> Công cụ </th>
				  </tr>
				</thead>
				<tbody>
				<?
					foreach ($hoadon as $emp) {
						// $emp->username
				?>
				  <tr>
				    <td> <?=$emp->Thang ."/". $emp->Nam?> </td>
				    
				     <? if($emp->TongTien != 0) { ?>	
						<td> <?=$emp->TongTien ?> </td>
					<? } else {?>
						<td> <span class="label label-default"> Chưa tính</span></td>
				    <? } ?>
				    <? if($emp->No != 0) { ?>	
						<td> <span class="label label-warning"><?=$emp->No ?> </span></td>
					<? } else {?>
						<td> </td>
				    <? } ?>
				    <td> <?=$emp->DaTra ?> </td>
				    <? 	if($emp->TongTien != 0) {
				    		if($emp->ConLai != 0) { ?>	
								<td> <span class="label label-important"><?=$emp->ConLai ?> </span></td>
							<? } else {?>
								<td> <span class="label label-success">Thanh toán đủ </span></td>
				    		<? } } else {?>
				    			<td> </td>
				    		<?} ?>
				    <td> <?=$emp->NgayTra ?> </td>
				    <td class="td-actions">
					    <? if($emp->TongTien == 0) { ?>	
							<a href="<?php echo base_url(); ?>hoadon/edit/<?=$emp->MaPhong?>/<?=$emp->Nam ?>/<?=$emp->Thang ?>/<?=$emp->MaHD ?>" class="btn btn-small btn-primary"><i class="icon-plus"> </i> Tính tiền</a>
						<? } else {?>
							<a href="<?php echo base_url(); ?>hoadon/edit/<?=$emp->MaPhong?>/<?=$emp->Nam ?>/<?=$emp->Thang ?>/<?=$emp->MaHD ?>" class="btn btn-small btn-primary"><i class="icon-edit"> </i> Sửa</a>
					    <? } ?>
				    </td>
				  </tr>
				<? } ?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
  </div>
</div>