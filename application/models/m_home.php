<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_home extends CI_Model {
    public function tambahUser($data,$table){
		$this->db->insert($table,$data);
	}
    
    function cek_user($table,$where){
		return $this->db->get_where($table,$where);
	}
    
    function cek_barang(){
        return $this->db->get('t_barang');
    }
}

//SELECT t_upload.id, t_login.nama, t_upload.gambar,t_upload.caption,t_upload.tgl_upload
//FROM t_upload 
//INNER JOIN t_login ON t_upload.id_user = t_login.id;
