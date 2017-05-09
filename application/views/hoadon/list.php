<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<a href="<?php echo base_url('employee/add'); ?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm hóa đơn</a>
			<br><br>
			<table class="table table-striped table-bordered">
				<thead>
				  <tr>
				    <th> Ngày lập </th>
				    <th> Tổng tiền </th>
				    <th> Đã trả </th>
				    <th> Còn lại </th>
				    <th class="td-actions"> Công cụ </th>
				  </tr>
				</thead>
				<tbody>
				<?
					foreach ($hoadon as $emp) {
						// $emp->username
				?>
				  <tr>
				    <td> <?=$emp->NgayLap ?> </td>
				    <td> <?=$emp->TongTien ?> </td>
				    <td> <?=$emp->DaTra ?> </td>
				    <td> <?=$emp->ConLai ?> </td>
				    <td class="td-actions">
				    	<a href="<?php echo base_url(); ?>employee/edit/<?=$emp->employee_id?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a>
				    	<a href="<?php echo base_url(); ?>employee/delete/<?=$emp->employee_id?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
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