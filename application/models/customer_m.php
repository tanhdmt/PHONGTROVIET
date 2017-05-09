<?php

class Customer_m extends CI_Model {

function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_hoadon($maphong)
    {
        $query = $this->db->query('select MaHD, MaPhong, month(NgayLap) as Thang, year(NgayLap) as Nam, TongTien, DaTra, No, ConLai, NgayTra from hoadon where MaPhong='.$maphong);
        $data = array();

        foreach ($query->result() as $row)
        {
            $data[] = $row;
            // $row->customer_id
            // $row->customer_username
            // $data[0]->customer_id
        }
        if(count($data))
            return $data;
        return false;
    } 

    function get_chiphi($mant)
    {
        $query = $this->db->query('select * from chiphish where MaNT='.$mant);
        $data = array();

        foreach ($query->result() as $row)
        {
            $data[] = $row;
            // $row->customer_id
            // $row->customer_username
            // $data[0]->customer_id
        }
        if(count($data))
            return $data;
        return false;
    }

    function getDien($maphong, $thang, $nam)
    {
        $query = $this->db->get_where('dien', array('MaPhong' => $maphong, 'Thang' => $thang, 'Nam' => $nam));
        return $query->result();
    }

    function getNuoc($maphong, $thang, $nam)
    {
        $query = $this->db->get_where('nuoc', array('MaPhong' => $maphong, 'Thang' => $thang, 'Nam' => $nam));
        return $query->result();
    }

    function getHoadon($mahd)
    {
        $query = $this->db->query('select MaHD, MaPhong, month(NgayLap) as Thang, year(NgayLap) as Nam, NgayLap, TongTien, DaTra, No, ConLai, NgayTra from hoadon where MaHD='.$mahd);
        return $query->result();
    }

    function getHoadon2($maphong, $thang, $nam)
    {
        $query = $this->db->query('select MaHD, MaPhong, month(NgayLap) as Thang, year(NgayLap) as Nam, TongTien, DaTra, No, ConLai, NgayTra from hoadon where MaPhong='.$maphong.' and Month(NgayLap)='.$thang.' and Year(NgayLap)='.$nam);
        return $query->result();
    }

    function addDien($maphong, $thang, $nam, $chisocu, $chisomoi)
    {
        $data = array('MaPhong' => $maphong, 'Thang' => $thang, 'Nam' => $nam, 'ChiSoCu' => $chisocu, 'ChiSoMoi' => $chisomoi);
        $this->db->insert('dien', $data);
        return $this->db->affected_rows();
    }

    function addNuoc($maphong, $thang, $nam, $chisocu, $chisomoi)
    {
        $data = array('MaPhong' => $maphong, 'Thang' => $thang, 'Nam' => $nam, 'ChiSoCu' => $chisocu, 'ChiSoMoi' => $chisomoi);
        $this->db->insert('nuoc', $data);
        return $this->db->affected_rows();
    }

    function updateNuoc($maphong, $thang, $nam, $chisocu, $chisomoi)
    {
        $data = array('ChiSoCu' => $chisocu, 'ChiSoMoi' => $chisomoi);
        $this->db->where('MaPhong', $maphong);
        $this->db->where('Thang', $thang);
        $this->db->where('Nam', $nam);
        $this->db->update('nuoc', $data);
    }

    function updateDien($maphong, $thang, $nam, $chisocu, $chisomoi)
    {
        $data = array('ChiSoCu' => $chisocu, 'ChiSoMoi' => $chisomoi);
        $this->db->where('MaPhong', $maphong);
        $this->db->where('Thang', $thang);
        $this->db->where('Nam', $nam);
        $this->db->update('dien', $data);
    }

    function updateHoadon($mahd, $tongtien, $no, $datra, $conlai, $ngaytra)
    {
        $data = array('TongTien' => $tongtien, 'No' => $no, 'DaTra' => $datra, 'ConLai' => $conlai, 'NgayTra' => $ngaytra);
        $this->db->where('MaHD', $mahd);
        $this->db->update('hoadon', $data);
    }
    function getTienphong($maphong)
    {
        $query = $this->db->query('select * from loaiphong,phongtro where phongtro.MaLoaiPhong = loaiphong.MaLoaiPhong and phongtro.MaPhong = '.$maphong);
        return $query->result();
    }

    function addHoadon($maphong, $ngaylap)
    {
        $data = array('MaPhong' => $maphong, 'NgayLap' => $ngaylap);
        $this->db->insert('hoadon', $data);
        return $this->db->affected_rows();
    } 

    function countMonth($maphong, $date)
    {
        $query = $this->db->query('select count(*) as Count from hoadon where Month(NgayLap) = Month(\''.$date.'\') and MaPhong='.$maphong);
        return $query->result();
    }

    function checkHoadon($maphong, $thang, $nam)
    {
        $query = $this->db->query('select count(*) as Count from hoadon where MaPhong='.$maphong.' and Month(NgayLap)='.$thang.' and Year(NgayLap)='.$nam);
        return $query->result();
    }

    function checkDien($maphong, $thang, $nam)
    {
        $query = $this->db->query('select count(*) as Count from dien where MaPhong='.$maphong.' and Thang='.$thang.' and Nam='.$nam);
        return $query->result();
    }

    function checkNuoc($maphong, $thang, $nam)
    {
        $query = $this->db->query('select count(*) as Count from nuoc where MaPhong='.$maphong.' and Thang='.$thang.' and Nam='.$nam);
        return $query->result();
    }

    // function deletePhi($maphi)
    // {
    //     $this->db->delete('chiphish', array('MaCP' => $maphi));
    //     return $this->db->affected_rows();
    // }

    // function editPhi($maphi, $dongia)
    // {
    //     $data = array('DonGia' => $dongia);

    //     $this->db->where('MaCP', $maphi);
    //     $this->db->update('chiphish', $data); 
    // }

    // function getPhi($maphi)
    // {
    //     $query = $this->db->get_where('chiphish', array('MaCP' => $maphi));
    //     return $query->result();
    // }

    // function getDepartments()
    // {
    //     $query = $this->db->from('department')->get();
    //     $data = array();

    //     foreach ($query->result() as $row)
    //     {
    //         $data[] = $row;
    //         // $row->customer_id
    //         // $row->customer_username
    //         // $data[0]->customer_id
    //     }
    //     if(count($data))
    //         return $data;
    //     return false;
    // }   

}
