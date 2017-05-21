<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			
				
				<div class="content clearfix">
					
					<form action="<?php echo base_url(); ?>hoadon/edit/<?=$hoadon->MaPhong?>/<?=$hoadon->Nam?>/<?=$hoadon->Thang?>/<?=$hoadon->MaHD?>" method="post">
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
										<td><input type="number" min="<?=$diencu->ChiSoMoi ?>" id="moidien" name="moidien" required value="<?=$dien->ChiSoMoi ?>" placeholder=""/></td>
									<? } else {?>
										<td><input type="number" id="cudien" name="cudien" required value="0" readonly placeholder=""/></td>
										<td><input type="number" id="moidien" name="moidien" required value="<?=$dien->ChiSoMoi ?>" maxlength="10" placeholder=""/></td>
									<?}?>
									
									<td><input type="text" id="thanhtien" name="thanhtien" value="<?=$cp->DonGia*($dien->ChiSoMoi-$dien->ChiSoCu) ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/></td>
								<? } else if(strcasecmp($cp->TenCP, "Nước") == 0) {?>
									<td> <input type="number" id="dgnuoc" name="dgnuoc" value="<?=$cp->DonGia ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/> </td>
									<?if(!empty($diencu->ChiSoMoi)) {?>
										<td><input type="number"  id="cunuoc" name="cunuoc" required value="<?=$nuoccu->ChiSoMoi ?>" readonly placeholder=""/></td>
										<td><input type="number"  min="<?=$nuoccu->ChiSoMoi ?>" id="moinuoc" name="moinuoc" required value="<?=$nuoc->ChiSoMoi ?>" placeholder=""/></td>
									<? } else {?>
										<td><input type="number"  id="cunuoc" name="cunuoc" required value="0" readonly placeholder=""/></td>
										<td><input type="number"  id="moinuoc" name="moinuoc" required value="<?=$nuoc->ChiSoMoi ?>" maxlength="10" placeholder=""/></td>
									<?}?>
									
									<td> <input type="text" id="thanhtien" name="thanhtien" value="<?=$cp->DonGia*($nuoc->ChiSoMoi-$nuoc->ChiSoCu) ?>" placeholder="" readonly style="border:none;border-color: transparent; background-color: transparent;"/></td>
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
									<td> <input type="text" id="ttphong" name="ttphong" value="<?=$tienphong->GiaPhong ?>" placeholder="" style="border:none;border-color: transparent; background-color: transparent;"/> </td>
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
			                    	<td class="align-right" rowspan="1" colspan="1"><input type="text" id="tongcong" name="tongcong" value="<?=$hoadon->TongTien ?>" placeholder="" style="border:none;border-color: transparent; background-color: transparent;"/> </td>
			                    </tr>
			                    <tr>
			                    	<td colspan="4" align="right" rowspan="1" style="text-align: right;">Nợ: </td>
			                    	<td class="align-right" rowspan="1" colspan="1"><input type="text" id="no" name="no" value="<?=$hdtruoc->ConLai ?>" placeholder="" style="border:none;border-color: transparent; background-color: transparent;"/></td>
			                    </tr>
			                    <tr>
			                    	<td colspan="2" align="right" rowspan="1" style="text-align: right;">Ngày trả: </td>
			                    	<td rowspan="1" colspan="1">
				                    	<? if($hoadon->NgayTra == null || $hoadon->NgayTra == 0) { ?>	
											<input class="form-control" id="ngaytra" name="ngaytra" type="date" min="<?=$hoadon->NgayLap ?>">
					    				<? } else {?>
											<input class="form-control" id="ngaytra" name="ngaytra" type="date" min="<?=$hoadon->NgayLap ?>" value="<?php echo date('Y-m-d',strtotime($hoadon->NgayTra)) ?>">
					    				<? } ?>	
			                    		
			                    	</td>
			                    	<td align="right" rowspan="1" colspan="1" style="text-align: right;">Đã trả: </td>
			                    	<td class="align-right" rowspan="1" colspan="1"><input type="number" " id="datra" name="datra" value="<?=$hoadon->DaTra ?>"> <!-- <input type="hidden" name="payamount" id="payamount_hidden"> --></td>
			                    </tr>
			                    <tr>
			                    	<td colspan="4" align="right" rowspan="1" style="text-align: right;">Còn lại: </td><td class="align-right" rowspan="1" colspan="1"><input type="text" id="conlai" name="conlai" value="<?=$hoadon->ConLai ?>" placeholder="" style="border:none;border-color: transparent; background-color: transparent;"/></td>
			                    </tr>
			                </tfoot>
						</table>
					</div>
						<div class="login-actions">
				
							<a href="<?php echo base_url(); ?>hoadon/info/<?=$hoadon->MaPhong?>" class="button btn btn-success btn-large" style="float: left;"><i class="btn-icon-only icon-chevron-left" ></i> Quay lại Danh sách hóa đơn</a>
							<button class="button btn btn-primary btn-large"><i class="btn-icon-only icon-ok" ></i> Tính tiền</button>

						
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