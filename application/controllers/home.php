<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function check_login() {
        if (UID){
            redirect("welcome");
        }
    }

    public function get_nhatro()
    {
    	$nhatro = $this->restaurant_m->getNhatro1();
    	echo(json_encode($nhatro));
    }

    public function get_nhatro_quan()
    {
    	$maquan = $this->input->post('quanid');
    	$ntquan = $this->restaurant_m->getNhatro2($maquan);
    	echo(json_encode($ntquan));
    }

    public function list_quan()
	{
		$matinh = $this->input->post('id');

		$tinh = $this->restaurant_m->getQuan($matinh);
		$tinh_select = '';
		$tinh_select .= '<option value="">Chọn Quận/Huyện</option>';
		foreach ($tinh as $t) {
			$tinh_select .= '<option value="'.$t->districtid.'">'.$t->type.' '.$t->name.'</option>';
			//echo $tinh_select;
		}
		
		echo(json_encode($tinh_select));
	}
	public function get_detail($mant)
	{
		$detail=$this->restaurant_m->getChitietNt($mant);
		echo(json_encode($detail[0]));
	}
	public function get_khuvuc()
	{
		$maquan = $this->input->post('quanid');
		$quan = $this->restaurant_m->getToadoquan($maquan);
		echo(json_encode($quan[0]));
	}

    public function index() {
        $this->check_login();

		// $imageArr = $this->restaurant_m->getImage(UID);
		// if(!empty($imageArr[0]->HinhAnh)){
		// 	$images = explode(",", $imageArr[0]->HinhAnh);
		// 	//echo $imageArr[0];
		// }
        $nhatro = $this->restaurant_m->getNhatro1();
        $tinh = $this->restaurant_m->getTinh();
        $viewdata = array('nhatro' => $nhatro, 'tinh' => $tinh);

        // if ($this->input->post("username") && $this->input->post("password")) {
        //     $username = $this->input->post("username");
        //     $password = $this->input->post("password");
        //     if ($user = $this->user_m->check_login($username, $password)) {
        //         $this->user_l->login($user);
        //         redirect(base_url() . "welcome/index");
        //     } else {
        //         $viewdata["error"] = true;
        //     }
        // }

        $data = array('title' => 'Homepage - PHÒNG TRỌ VIỆT', 'page' => 'home');
        $this->load->view('header', $data);
        $this->load->view('home', $viewdata);
        $this->load->view('footer');
    }

    public function logout() {
        $this->user_l->logout();
	redirect('/');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */