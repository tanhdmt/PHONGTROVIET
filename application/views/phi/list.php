<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
        	<h2> Danh sách chi phí </h2>	
        	<br>
			<a href="<?php echo base_url(); ?>phi/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm phí mới</a>
			<br><br>
			<table class="table table-striped">
				<thead style="background-color: #22a5f8; color:#fff;">
				  <tr>
				    <th> Tên phí </th>
				    <th> Đơn giá </th>
				    <th class="td-actions"> Công cụ </th>
				  </tr>
				</thead>
				<tbody>
				<?
					foreach ($cp as $dept) {
						// $emp->username
				?>
				  <tr>
				    <td> <?=$dept->TenCP?> </td>
				    <td> <?=$dept->DonGia?> </td>
				    <td class="td-actions">
				    	<a href="<?php echo base_url(); ?>phi/edit/<?=$dept->MaCP?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a>
				    	<a href="<?php echo base_url(); ?>phi/delete/<?=$dept->MaCP?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
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

