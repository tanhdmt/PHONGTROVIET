<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<a href="<?php echo base_url(); ?>room-type/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm loại phòng mới</a>
			<br><br>
			<table class="table table-striped table-bordered">
				<thead>
				  <tr>
				    <th> Loại phòng </th>
				    <th> Giá phòng </th>
				    <th class="td-actions"> Công cụ </th>
				  </tr>
				</thead>
				<tbody>
				<?
                    if(count($room_types) > 0){
					   foreach ($room_types as $rt) {
						  // $emp->username
				?>
				  <tr>
				    <td> <?=$rt->TenLoaiPhong ?> </td>
				    <td> <?=$rt->GiaPhong ?> </td>
				    <td class="td-actions">
                                        <a href="<?php echo base_url(); ?>room-type/edit/<?=$rt->MaLoaiPhong ?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a>
				    	<a href="<?php echo base_url(); ?>room-type/delete/<?=$rt->MaLoaiPhong ?>" onclick="return confirm('Bạn có muốn xóa?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
				    </td>
				  </tr>
				<? } 
                                }?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
  </div>
</div>