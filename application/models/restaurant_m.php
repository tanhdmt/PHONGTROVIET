<?php

class Restaurant_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getNhatro($mant)
    {
        $query = $this->db->get_where('nhatro', array('MaNT' => $mant));
        return $query->result();
        
    } 

    function getNhatro1()
    {
        $query = $this->db->query('select * from (select nhatro.MaNT as maso, TenNT, DiaChi, SDT, SoLuongPhong, TinhThanh, QuanHuyen, ViDo, KinhDo, DienTich, HinhAnh, min(GiaPhong) as GiaPhong FROM `nhatro`, phongtro, loaiphong where nhatro.MaNT=phongtro.MaNT and loaiphong.MaLoaiPhong = phongtro.MaLoaiPhong group by TenNT) t1 left join (select nhatro.MaNT as maso, count(*) as Count from nhatro, phongtro where nhatro.MaNT=phongtro.MaNT and TinhTrang=\'Trống\' group by TenNT) t2 on t1.maso = t2.maso');
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    } 

    function getNhatro2($maquan)
    {
        $query = $this->db->query('select * from (select nhatro.MaNT as ms, TenNT, DiaChi, SDT, SoLuongPhong, TinhThanh, QuanHuyen, ViDo, KinhDo, DienTich, HinhAnh, min(GiaPhong) as GiaPhong FROM `nhatro`, phongtro, loaiphong where nhatro.MaNT=phongtro.MaNT and loaiphong.MaLoaiPhong = phongtro.MaLoaiPhong and QuanHuyen=\''.$maquan.'\' group by TenNT) t1 left join (select nhatro.MaNT as maso, count(*) as Count from nhatro, phongtro where nhatro.MaNT=phongtro.MaNT and TinhTrang=\'Trống\' group by TenNT) t2 on t1.ms = t2.maso');
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    } 

    function getChitietNt($mant)
    {
        $query = $this->db->query('select * from (select nhatro.MaNT as maso, TenNT, DiaChi, SDT, SoLuongPhong, TinhThanh, QuanHuyen, ViDo, KinhDo, DienTich, HinhAnh, MoTa, min(GiaPhong) as GiaPhong FROM `nhatro`, phongtro, loaiphong where nhatro.MaNT=phongtro.MaNT and loaiphong.MaLoaiPhong = phongtro.MaLoaiPhong and nhatro.MaNT='.$mant.' group by TenNT) t1 left join (select nhatro.MaNT as maso, count(*) as Count from nhatro, phongtro where nhatro.MaNT=phongtro.MaNT and TinhTrang=\'Trống\' group by TenNT) t2 on t1.maso = t2.maso');
        return $query->result();
    }
    function getTinh()
    {
        $query = $this->db->from('province')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    } 

    function getQuan($matinh)
    {
        $query = $this->db->get_where('district', array('provinceid' => $matinh));
        return $query->result();
    }

    function getToadoquan($maquan)
    {
        $query = $this->db->query('select districtid, province.provinceid, province.name as Tinh, district.name as Quan, district.type as Type from province, district where province.provinceid = district.provinceid and districtid=\''.$maquan.'\'');
        return $query->result();
    }

    function updateNhatro($mant, $diachi, $sdt, $dientich, $soluong, $tinh, $quan, $mota)
    {
        $data = array('DiaChi' => $diachi, 'SDT' => $sdt, 'DienTich' => $dientich, 'SoLuongPhong' => $soluong, 'TinhThanh' => $tinh, 'QuanHuyen' => $quan, 'MoTa' => $mota);

        $this->db->where('MaNT', $mant);
        $this->db->update('nhatro', $data); 
    }

    function updateToaDo($mant, $vido, $kinhdo)
    {
        $data = array('ViDo' => $vido, 'KinhDo' => $kinhdo);

        $this->db->where('MaNT', $mant);
        $this->db->update('nhatro', $data); 
    }

    function uploadImage($location, $mant)
    {
        $data = array('HinhAnh' => $location);

        $this->db->where('MaNT', $mant);
        $this->db->update('nhatro', $data); 
    }

    function getImage($mant)
    {
        $query = $this->db->query('select HinhAnh from nhatro where MaNT='.$mant);
        return $query->result();
    }

    function datphong($mant, $tennd, $sdt, $ghichu, $ngaydat)
    {
        $data = array('MaNT' => $mant, 'TenNguoiDat' => $tennd, 'SDT' => $sdt, 'GhiChu' => $ghichu, 'NgayDat' =>$ngaydat);
        $this->db->insert('datphong', $data);
        return $this->db->affected_rows();
    }

   
}
