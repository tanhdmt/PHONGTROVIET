<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
        <h2> Danh sách người thuê trọ </h2>
        <br>
        	<div>
				<!-- a href="<?php echo base_url(); ?>room/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Thêm phòng</a> -->
				<form class="navbar-search pull-right" action="<?php echo base_url('search'); ?>" method="POST">
                	<input type="text" name="customer" id="mySearch" onkeyup="myFunction()" class="search-query" placeholder="Tìm kiếm người thuê trọ">
              	</form>
              	<br>
			</div>
			<br>
			<table id="myTable" class="table table-striped">
				<thead style="background-color: #22a5f8; color:#fff;">
				  <tr>
				    <th style="width: 10%"> Mã phòng </th>
				    <th style="width: 30%"> Người thuê </th>
				    <th style="width: 20%"> Ngày thuê </th>
				    <th style="width: 10%"> Giới tính </th>
				    <th style="width: 15%"> Số điện thoại </th>
				    <th style="width: 15%"> Số CMND </th>				    
				  </tr>
				</thead>
				<tbody>
					<?
                                    if($list_nt){
			          foreach ($list_nt as $rm) {
			            // $emp->username
			        ?>
			          <tr>
			          	<td> <?=$rm->mp ?></td>
			            <td> <?=$rm->TenTV ?> </td> 
			            <td> <?=$rm->NgayThue ?> </td>
			            <td> <?=$rm->GioiTinh ?> </td>
			            <td> <?=$rm->Sdt ?> </td>
			            <td> <?=$rm->CMND ?></td>
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
	th, td{
		text-align: center;
	}
</style>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>