<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">		
			<h2> Danh sách hóa đơn</h2>
			<br>
			<button id="btnAdd" onclick="checkMonth()" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm hóa đơn</button>
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
<script type="text/javascript">
	function checkMonth()
	{
		$.ajax({
            type:"POST",
            async: false,
            url: "<?php echo base_url(); ?>hoadon/add/<?=$maphong?>", // script to validate in server side
            data: {},
            success: function(data) {
                if (data==0)
                  $('#modal_thongbao_2').modal('show');
              	else
              		location.reload();
            }
        });
	}        
</script>
<div class="modal fade" id="modal_thongbao_2" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ff4d4d;color: #fff">
                <h3 class="modal-title" id="modal-thongbao2-title">Thông báo</h3>
            </div>
            <div class="modal-body form">
                <h4><i class="icon-warning-sign icon-2x" style="color: #ff4d4d;"></i> Đã có hóa đơn của tháng này</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="btnSubmit">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->