<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_front extends CI_Model {
    function getUserAll(){
        return $this->db->get('t_user');
    }
    
    function inputUser($data,$table){
		$this->db->insert($table,$data);
	}
    
    function cekUser($table,$where){
		return $this->db->get_where($table,$where);
	}
    
    function cekBarang(){
        return $this->db->get('t_barang');
    }
    
    function cekHarga($table,$where){
		return $this->db->get_where($table,$where);
	}
    
    public function inputTransaksi($data,$table){
		$this->db->insert($table,$data);
	}
    
    function updateStatus($where,$data,$table){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
    
    function listHarga($id){
        $where = array(
            't_pesan.id_user' => $id
        );
        
        $this->db->select('t_barang.nama_barang, t_barang.harga, t_pesan.kuantitas, t_pesan.total_harga');
        $this->db->from('t_barang');
        $this->db->join('t_pesan','t_pesan.id_barang = t_barang.id');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}

//SELECT t_barang.nama_barang, t_barang.harga, t_pesan.kuantitas, t_pesan.total_harga
//FROM t_barang
//INNER JOIN t_pesan ON t_pesan.id_barang = t_barang.id where t_pesan.id_user="27";