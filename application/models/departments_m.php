<?php

class Departments_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function reseed()
    {
        $this->db->query('ALTER TABLE thanhvien AUTO_INCREMENT 1');
    }

    function get_thanhvien($maphong)
    {
        $query = $this->db->query('select * from thanhvien where MaPhong='.$maphong.' and TinhTrang=\'Đang ở\'');
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;
        return false;
    } 
    function getThanhvien($maphong)
    {
        $query = $this->db->get_where('thanhvien', array('MaPhong' => $maphong));
        return $query->result();
    }

    function getThanhvien2($matv)
    {
        $query = $this->db->get_where('thanhvien', array('MaTV' => $matv));
        return $query->result();
    }

    function get_daidien($maphong){
        $query = $this->db->query('select *, (select count(*) from thanhvien where thanhvien.MaPhong = '.$maphong.' and thanhvien.TinhTrang=\'Đang ở\') as SoNguoi, (select NgayThue from phongtro where MaPhong = '.$maphong.') as NgayThue, (select DuDinhTra from phongtro where MaPhong = '.$maphong.') as NgayTra,(select TenLoaiPhong from loaiphong, phongtro where phongtro.MaLoaiPhong = loaiphong.MaLoaiPhong and phongtro.MaPhong = '.$maphong.') as LoaiPhong FROM `thanhvien` where MaPhong = '.$maphong.' and ChucVu = \'DD\'');
        return $query->result();
    }
    function get_departments()
    {
        $query = $this->db->from('department')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    } 

    function addThanhvien($tentv, $sdt, $cmnd, $gioitinh, $tinhtrang, $maphong, $chucvu)
    {
        $data = array('TenTV' => $tentv, 'Sdt' => $sdt, 'CMND' => $cmnd, 'GioiTinh' => $gioitinh, 'TinhTrang' => $tinhtrang, 'MaPhong' => $maphong, 'ChucVu' => $chucvu);
        $this->db->insert('thanhvien', $data);
        return $this->db->affected_rows();
    }

    function deleteThanhvien($matv)
    {
        $tinhtrang = "Không ở";
        $data = array('TinhTrang' => $tinhtrang);

        $this->db->where('MaTV', $matv);
        $this->db->update('thanhvien', $data); 
    }

    function editThanhvien($matv, $tentv, $sdt, $cmnd, $gioitinh)
    {
        $data = array('TenTV' => $tentv, 'Sdt' => $sdt, 'CMND' => $cmnd, 'GioiTinh' => $gioitinh);

        $this->db->where('MaTV', $matv);
        $this->db->update('thanhvien', $data); 
    }

    function getDepartment($department_id)
    {
        $query = $this->db->get_where('department', array('department_id' => $department_id));
        return $query->result();
    }

    function getGhichu($maphong)
    {
        $query = $this->db->query('select * from phongtro where MaPhong='.$maphong);
        return $query->result();
    }
}
