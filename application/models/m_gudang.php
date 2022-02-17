<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_gudang extends CI_Model {
    function tampilBarang(){
        $where = array(
            't_user.status' => 1,
            't_pesan.status_barang' => 0
        );
        
        $this->db->select('t_user.nama, t_user.status, t_barang.nama_barang, t_barang.stok, t_pesan.kuantitas,t_pesan.status_barang,t_pesan.id');
        $this->db->from('t_pesan');
        $this->db->join('t_user','t_user.id = t_pesan.id_user');
        $this->db->join('t_barang','t_barang.id = t_pesan.id_barang ');
        $this->db->where($where);
        $this->db->order_by('t_pesan.id','DESC');
        $query = $this->db->get();
        return $query;
    }
    
    function cekBarang(){
        return $this->db->get('t_barang');
    }
    
    function updateStatus($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
    function cekStok($where){
        $this->db->select('SUM(status_barang) as status, COUNT(kuantitas) as total_item');
        $this->db->from('t_pesan');
        $this->db->where($where);
        return $this->db->get();
    }
    
    function cekUser($table,$where){
        return $this->db->get_where($table,$where);
    }
    
    function cekHarga($where){
        $this->db->select('SUM(total_harga) as total, SUM(kuantitas) as kuantitas');
        $this->db->from('t_pesan');
        $this->db->where($where);
        return $this->db->get();
    }
}

//SELECT t_user.nama, t_user.status, t_barang.nama_barang, t_pesan.kuantitas,t_pesan.status_barang
//FROM t_pesan
//INNER JOIN t_user ON t_user.id = t_pesan.id_user
//INNER JOIN t_barang on t_barang.id = t_pesan.id_barang 
//WHERE t_user.status='1' AND t_pesan.status_barang='0';
