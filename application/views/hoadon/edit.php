<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			
				
				<div class="content clearfix">
					
					<form id="formTinhTien" action="<?php echo base_url(); ?>hoadon/edit/<?=$hoadon->MaPhong?>/<?=$hoadon->Nam?>/<?=$hoadon->Thang?>/<?=$hoadon->MaHD?>" method="post">
					<button class="button btn btn-success" onclick="printDiv()"><i class="btn-icon-only icon-print" ></i> In hóa đơn</button>
					<div id="DivIdToPrint">	
						<h2> <?= "Chi tiết hóa đơn tháng ".$hoadon->Thang."/".$hoadon->Nam ?> </h2>
						<br></br>
						<table class="table table-striped ">
							<thead style="background-color: #1396e2; color:#fff;">
							  <tr>
							    <th style="width: 30%; text-align: center;"> Nội dung thanh toán </th>
							    <th style="width: 15%;"> Đơn giá </th>
							    <th style="width: 15%;"> Chỉ số cũ </th>
							    <th style="width: 15%;"> Chỉ số mới </th>
							    <th style="width: 25%;"> Thành tiền </th>
							  </tr>
							</thead>
							<tbody>	
							<?
								$i = 0;
								foreach ($chiphi as $cp) {
									// $emp->username
								++$i;	
							?>
							  <tr>
							    <td style="text-align: center;"> <?=$cp->TenCP ?> </td>
							    
							    <? if(strcasecmp($cp->TenCP, "Điện") == 0) { ?>	
							    	<td> <input type="number" id="dgdien" name="dgdien" value="<?=$cp->DonGia ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/> </td>
							    	<?if(!empty($diencu->ChiSoMoi)) {?>
										<td><input type="number" id="cudien" name="cudien" required value="<?=$diencu->ChiSoMoi ?>" readonly placeholder=""/></td>
										<td><input type="number" min="<?=$diencu->ChiSoMoi ?>" id="moidien" name="moidien" required value="<?=$dien->ChiSoMoi ?>" onblur="tinhDien()" placeholder=""/></td>
									<? } else {?>
										<td><input type="number" id="cudien" name="cudien" required value="0" readonly placeholder=""/></td>
										<td><input type="number" id="moidien" name="moidien" required value="<?=$dien->ChiSoMoi ?>" maxlength="10" placeholder="" onblur="tinhDien()"/></td>
									<?}?>
									
									<td><input type="text" id="thanhtienDien" name="thanhtien" value="<?=$cp->DonGia*($dien->ChiSoMoi-$dien->ChiSoCu) ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/></td>
								<? } else if(strcasecmp($cp->TenCP, "Nước") == 0) {?>
									<td> <input type="number" id="dgnuoc" name="dgnuoc" value="<?=$cp->DonGia ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/> </td>
									<?if(!empty($diencu->ChiSoMoi)) {?>
										<td><input type="number"  id="cunuoc" name="cunuoc" required value="<?=$nuoccu->ChiSoMoi ?>" readonly placeholder=""/></td>
										<td><input type="number"  min="<?=$nuoccu->ChiSoMoi ?>" id="moinuoc" name="moinuoc" required value="<?=$nuoc->ChiSoMoi ?>" placeholder="" onblur="tinhNuoc()"/></td>
									<? } else {?>
										<td><input type="number"  id="cunuoc" name="cunuoc" required value="0" readonly placeholder=""/></td>
										<td><input type="number"  id="moinuoc" name="moinuoc" required value="<?=$nuoc->ChiSoMoi ?>" maxlength="10" placeholder="" onblur="tinhNuoc()"/></td>
									<?}?>
									
									<td> <input type="text" id="thanhtienNuoc" name="thanhtien" value="<?=$cp->DonGia*($nuoc->ChiSoMoi-$nuoc->ChiSoCu) ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/></td>
				    			<? } else {?>
				    				<td> <?=$cp->DonGia ?> </td>
									<td> 0 </td>
							    	<td> 0 </td>
							    	<td> <input type="text" id="<?="thanhtien".$i ?>" name="<?="thanhtien".$i ?>" value="<?=$cp->DonGia ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/> </td>
				    			<? } ?>						    
							  </tr>
							<? } ?>
								<tr>
									<td style="text-align: center;"> Tiền Phòng </td>
									<td> <?=$tienphong->GiaPhong ?> </td>
									<td> 0</td>
									<td> 0</td>
									<td> <input type="text" id="ttphong" name="ttphong" value="<?=$tienphong->GiaPhong ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/> </td>
								</tr>
								<!-- <tr>
									<td> Điện </td>
									<td> 4000</td>
									<td><input type="number" min="0" id="cudien" name="cudien" required value="" placeholder=""/></td>
									<td><input type="number" min="0" id="moidien" name="moidien" required value="" placeholder=""/></td>
									<td> 0</td>
								</tr>
								<tr>
									<td> Nước </td>
									<td> 3000</td>
									<td><input type="number" min="0" id="cunuoc" name="cunuoc" required value="" placeholder=""/></td>
									<td><input type="number" min="0" id="moinuoc" name="moinuoc" required value="" placeholder=""/></td>
									<td> 0</td>
								</tr> -->

							</tbody>
							<tfoot">
			                    <tr>
			                    	<td colspan="4" align="right" style="background-color: lightgrey; text-align: right;" rowspan="1">Tổng cộng: </td>
			                    	<td class="align-right" rowspan="1" colspan="1"><input type="text" id="tongcong" name="tongcong" readonly value="<?=$hoadon->TongTien ?>" placeholder="" style="border:none;border-color: transparent; background-color: transparent;"/> </td>
			                    </tr>
			                    <tr>
			                    	<td colspan="4" align="right" rowspan="1" style="text-align: right;">Nợ tháng trước: </td>
			                    	<td class="align-right" rowspan="1" colspan="1"><input type="text" id="no" name="no" readonly value="<?=$hdtruoc->ConLai ?>" placeholder="" style="border:none;border-color: transparent; background-color: transparent;"/></td>
			                    </tr>
			                    <tr>
									<td style="float: right;"> <button id="btnTratien" name="btnTratien" class="btn btn-success" onclick="showinput()" type="button"> Trả tiền</button></td>
			                    	<td colspan="1" align="right" rowspan="1" style="text-align: right;">Ngày trả: </td>
			                    	<td rowspan="1" colspan="1">
				                    	<? if($hoadon->NgayTra == null || $hoadon->NgayTra == 0) { ?>	
											<input class="form-control" id="ngaytra" name="ngaytra" required readonly type="date" min="<?=$hoadon->NgayLap ?>">
					    				<? } else {?>
											<input class="form-control" id="ngaytra" name="ngaytra" required readonly type="date" min="<?=$hoadon->NgayLap ?>" value="<?php echo date('Y-m-d',strtotime($hoadon->NgayTra)) ?>">
					    				<? } ?>	
			                    		
			                    	</td>
			                    	<td align="right" rowspan="1" colspan="1" style="text-align: right;">Đã trả: </td>
			                    	<td class="align-right" rowspan="1" colspan="1">
			                    	     <input type="number" id="datra" name="datra" readonly value="<?=$hoadon->DaTra ?>" style="width:70%;border:none;border-color: transparent; background-color: transparent;" onblur="tinhConlai()"> 
			                    	     <button name="btnHuy" id="btnHuy" class="btn btn-small btn-success" onclick="hideinput()" style="margin-bottom:9px;display: none;" type="button"><i class="btn-icon-only icon-ok"></i> Trả </button>
			                    	</td>
			                    </tr>
			                    <tr>
			                    	<td colspan="4" align="right" rowspan="1" style="text-align: right;">Còn lại: </td><td class="align-right" rowspan="1" colspan="1"><input type="text" id="conlai" name="conlai" readonly value="<?=$hoadon->ConLai ?>" placeholder="" style="border:none;border-color: transparent; background-color: transparent;"/></td>
			                    </tr>
			                </tfoot>
						</table>
					</div>
						<div class="login-actions">
				
							<a href="<?php echo base_url(); ?>hoadon/info/<?=$hoadon->MaPhong?>" class="button btn btn-success btn-large" style="float: left;"><i class="btn-icon-only icon-chevron-left" ></i> Quay lại Danh sách hóa đơn</a>
							<button id="btnSubmit" name="btnSubmit" class="button btn btn-primary btn-large" type="submit"><i class="btn-icon-only icon-ok" ></i> Tính tiền</button>

						
						</div> <!-- .actions -->	
					</form>
					
				</div> <!-- /content -->
				
			<br>
		</div>
	  </div>
	</div>
  </div>
</div>

<style type="text/css">
	input{
		width:100%;
	}
	th{
		text-align: center;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		
	});
	var count = "<?=$i ?>" ;
	var tongcong;
	function tinhDien()
	{
		var tiendien = $('#dgdien').val() * ($('#moidien').val() - $('#cudien').val());
		$('#thanhtienDien').val(tiendien);
		tongcong = tiendien + parseInt($('#thanhtienNuoc').val()) + parseInt($('#ttphong').val());
		for(var i=3; i<=count; i++)
		{
			tongcong = tongcong + parseInt($('#thanhtien'+i+'').val()); 
			//console.log($('#thanhtien'+i+'').val());
		}
		$('#tongcong').val(tongcong);
		var thaydoi = $('#tongcong').val() - parseInt('<?=$hoadon->TongTien ?>');
		$('#conlai').val(parseInt('<?=$hoadon->ConLai ?>') + thaydoi);
	}
	function tinhNuoc()
	{
		var tiennuoc = $('#dgnuoc').val() * ($('#moinuoc').val() - $('#cunuoc').val());
		$('#thanhtienNuoc').val(tiennuoc);
		tongcong += tiennuoc;
		$('#tongcong').val(tongcong);
		var thaydoi = $('#tongcong').val() - parseInt('<?=$hoadon->TongTien ?>');
		$('#conlai').val(parseInt('<?=$hoadon->ConLai ?>') + thaydoi);
	}
	function tinhConlai()
	{
		//Tính Số tiền thay đổi khi cập nhật Tổng cộng
		var thaydoi = $('#tongcong').val() - parseInt('<?=$hoadon->TongTien ?>');
		//Nếu chưa có nợ
		if($('#no').val())
			var conlai = parseInt('<?=$hoadon->ConLai ?>') + thaydoi - parseInt($('#datra').val()) + parseInt($('#no').val());
		else
			var conlai = parseInt('<?=$hoadon->ConLai ?>') + thaydoi - parseInt($('#datra').val());
		$('#conlai').val(conlai);
	}
	function showinput()
	{
		$('#ngaytra').prop('readonly', false);
		$('#datra').prop('readonly', false);
		$('#datra').prop('placeholder', "Nhập số tiền trả");
		$('#datra').val("");
		$('#btnHuy').show();
		$('#btnTratien').hide();
	}
	function hideinput()
	{
		$('#ngaytra').prop('readonly', true);
		$('#datra').prop('readonly', true);
		$('#datra').prop('placeholder', "");
		$('#datra').val($('#tongcong').val() - $('#conlai').val());
		$('#btnHuy').hide();
		$('#btnTratien').show();
	}

	function printDiv() 
	{

	  var divToPrint=document.getElementById('DivIdToPrint');

	  // var newWin=window.open('','Print-Window');

	  // newWin.document.open();

	  // newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

	  // newWin.document.close();

	  // setTimeout(function(){newWin.close();},10);
	  newWin= window.open("");
	  //var myStyle = '<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">';
	   newWin.document.write('<div id="DivIdToPrint">' + $('#DivIdToPrint').html() + '</div>');
	   newWin.print();
	   newWin.close();

	}
</script>