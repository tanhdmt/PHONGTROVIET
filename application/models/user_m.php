<?php

class User_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function check_login($username, $password)
    {
        $query = $this->db->from('nhatro')->where('Username', $username)->where('Password', $password)->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
            // $row->customer_id
            // $row->customer_username
            // $data[0]->customer_id
//            var_dump($row);
        }
        if(count($data))
            return $data;
        return false;
    }

    function check_user($username)
    {
        $query = $this->db->get_where('nhatro', array('Username' => $username));
        return $query->result();
    }

    function check_user1($username, $olduser)
    {
        $query = $this->db->query('select * from nhatro where Username=\''.$username.'\' and Username <> \''.$olduser.'\'');
        return $query->result();
    }

    function check_oldpass($username, $pass)
    {
        $query = $this->db->get_where('nhatro', array('Username' => $username, 'Password' => $pass));
        return $query->result();
    }

    function get_user($mant)
    {
        $query = $this->db->get_where('nhatro', array('MaNT' => $mant));
        return $query->result();
    }

    function update_user($mant, $username, $password, $tennt)
    {
        $data = array('Username' => $username, 'Password' => $password, 'TenNT' => $tennt);

        $this->db->where('MaNT', $mant);
        $this->db->update('nhatro', $data); 
    }


     function update_user2($mant, $username, $tennt)
    {
        $data = array('Username' => $username, 'TenNT' => $tennt);

        $this->db->where('MaNT', $mant);
        $this->db->update('nhatro', $data); 
    }

    function add_user($username, $password, $tennt, $diachi, $sdt, $soluongphong, $vido, $kinhdo)
    {
        $data = array('Username' => $username, 'Password' => $password, 'TenNT' => $tennt, 'DiaChi' => $diachi, 'SDT' => $sdt, 'SoLuongPhong' => $soluongphong, 'ViDo' => $vido, 'KinhDo' => $kinhdo);
        $this->db->insert('nhatro', $data);
        return $this->db->affected_rows();
    }

    
}


// SELECT * FROM employee WHERE employee_username = '$username' AND employee_password = '$password'

// $username = admin\' or 1=1--
// $password = 12345

// SELECT * FROM employee WHERE employee_username = 'admin' or 1=1--' AND employee_password = '12345'

// $restoran_name = "Cihad'in Yeri"

// SELECT * FROM restorans WHERE restoran_name = '$restoran_name'
// SELECT * FROM restorans WHERE restoran_name = 'Cihad'in Yeri'