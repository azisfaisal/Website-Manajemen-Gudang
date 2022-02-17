<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_transaksi extends CI_Model {
    function tampilTransaksi(){
        $where = array(
            't_user.status' => 2
        );
        
        return $this->db->get_where('t_user',$where);
    }
    
    function tampilDetail1($table,$where){
        return $this->db->get_where($table,$where);
    }
    
    function tampilDetail2($where){
        $this->db->select('t_pesan.kuantitas,t_pesan.total_harga,t_barang.nama_barang');
        $this->db->from('t_pesan');
        $this->db->join('t_barang','t_barang.id = t_pesan.id_barang ');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function updatePembayaran($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
    function updateDiskon($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
    function cekBarang(){
        return $this->db->get('t_barang');
    }
    
    function cekDiskon($where){
        $this->db->select('t_barang.id, t_barang.diskon, t_pesan.total_harga,t_pesan.id_user');
        $this->db->from('t_pesan');
        $this->db->join('t_barang','t_barang.id = t_pesan.id_barang ');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function cekHarga($where){
        $this->db->select('SUM(total_harga) as total');
        $this->db->from('t_pesan');
        $this->db->where($where);
        return $this->db->get();
    }
    
}
