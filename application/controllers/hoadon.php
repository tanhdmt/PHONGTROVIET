<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoadon extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function check_login()
	{
		if(!UID)
			redirect("login");
	} 

	public function add($maphong)
	{
		//$viewdata = array();

		$date=date("Y-m-d");
		$count = $this->customer_m->countMonth($maphong, $date);
		if($count[0]->Count == 0){
			$this->customer_m->addHoadon($maphong, $date);
		}
		//  else{
		// 	$_SESSION['Error'] = "You left one or more of the required fields.";
		// }

		redirect("/hoadon/info/".$maphong);
	}

	public function edit($maphong, $nam, $thang, $mahd)
	{
		$hoadon = $this->customer_m->getHoadon($mahd);
		$chiphi = $this->customer_m->get_chiphi(UID);
		$checkd = $this->customer_m->checkDien($maphong, $thang, $nam);
		$checkn = $this->customer_m->checkNuoc($maphong, $thang, $nam);
		//echo $hoadon[0]->TongTien;
		if($this->input->post("moidien") && $this->input->post("moinuoc"))
		{
			$cudien = $this->input->post("cudien");
			$moidien = $this->input->post("moidien");
			$cunuoc = $this->input->post("cunuoc");
			$moinuoc = $this->input->post("moinuoc");
			
			if($checkd[0]->Count == 0)
				$this->customer_m->addDien($maphong, $thang, $nam, $cudien, $moidien);
			else
				$this->customer_m->updateDien($maphong, $thang, $nam, $cudien, $moidien);
			if($checkd[0]->Count == 0)
				$this->customer_m->addNuoc($maphong, $thang, $nam, $cunuoc, $moinuoc);
			else
				$this->customer_m->updateNuoc($maphong, $thang, $nam, $cunuoc, $moinuoc);
			
			$i = 0;
			$datra = $this->input->post("datra");
			$no = $this->input->post("no");
			$datra = $this->input->post("datra");
			$ngaytra = $this->input->post("ngaytra");
			$tongtien = $this->input->post("ttphong") + (($moidien - $cudien)*$this->input->post("dgdien")) + (($moinuoc - $cunuoc)*$this->input->post("dgnuoc"));
			foreach($chiphi as $cp)
			{
				++$i;
				$tongtien += $this->input->post("thanhtien".$i);
			}
			$conlai = $tongtien - $datra + $no;

			$this->customer_m->updateHoadon($mahd, $tongtien, $no, $datra, $conlai, $ngaytra);
			redirect("/hoadon/info/".$maphong);
		}

		
		$data = array('title' => 'Thanh toán - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);

		
		$tienphong = $this->customer_m->getTienphong($maphong);
		$dien = $this->customer_m->getDien($maphong, $thang, $nam);
		$nuoc = $this->customer_m->getNuoc($maphong, $thang, $nam);
		$diencu = $this->customer_m->getDien($maphong, $thang-1, $nam);
		$nuoccu = $this->customer_m->getNuoc($maphong, $thang-1, $nam);
		$hdtruoc = $this->customer_m->getHoadon2($maphong, $thang-1, $nam);
		// $employee = $this->employee_m->getEmployee($employee_id);
		
		$viewdata = array('chiphi' => $chiphi, 'tienphong' => $tienphong[0], 'hoadon' => $hoadon[0], 'dien' => $dien[0], 'nuoc' => $nuoc[0], 'hdtruoc' => $hdtruoc[0], 'diencu' => $diencu[0], 'nuoccu' => $nuoccu[0]);
		$this->load->view('hoadon/edit',$viewdata);

		$this->load->view('footer');
	}

	public function info($maphong)
	{
		$hoadon = $this->customer_m->get_hoadon($maphong);
		$viewdata = array('hoadon' => $hoadon, 'maphong' => $maphong);

		$data = array('title' => 'Danh sách hóa đơn - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);
		$this->load->view('hoadon/info',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */