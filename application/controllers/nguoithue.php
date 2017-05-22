<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nguoithue extends CI_Controller {

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

	public function index()
	{
		$this->check_login();
		
		$list_nt = $this->room_m->listThanhVien(UID);

		$viewdata = array('list_nt' => $list_nt);

		$data = array('title' => 'Danh sách người thuê - PHÒNG TRỌ VIỆT', 'page' => 'nguoithue');
		$this->load->view('header', $data);
		$this->load->view('nguoithue/list',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */