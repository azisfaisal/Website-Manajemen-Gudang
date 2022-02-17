<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
    
    function __construct(){
		parent::__construct();		
        
        $this->load->model('m_front');

    }
    
    public function index(){
        $data['user'] = $this->m_front->getUserAll()->result();
        $data['count'] = $this->m_front->getUserAll()->num_rows();
        $this->load->view('v_home',$data);
    }
    
    public function tampilUser(){
        $this->load->view('v_tambahuser');
    }
    
    public function tambahUser(){
        $username = $this->input->post('nama');
        $tanggal = $this->input->post('tanggal');
        
        $data = array(
            'nama' => $username,
            'tgl_pesan' => $tanggal
        );
        
        $this->m_front->inputUser($data,'t_user');
        $data = $this->m_front->cekUser("t_user",$data)->result();
        foreach($data as $d){
            $id = $d->id;
        }
        redirect(base_url('Front/tampilPemesanan/'.$id));
	}
    
    public function tampilPemesanan($id){
        $where = array(
            'id' => $id
        );
        
        $data['user'] = $this->m_front->cekUser("t_user",$where)->result();
        $data['barang'] = $this->m_front->cekBarang()->result();
        $data['list'] = $this->m_front->listHarga($id)->result();
        $data['listCount'] = $this->m_front->listHarga($id)->num_rows();
        
        $this->load->view('v_pesan',$data);
    }
    
    public function tambahPemesanan(){
        $id_user    = $this->input->post('id_user');
        $barang     = $this->input->post('barang');
        $kuantitas  = $this->input->post('kuantitas');
        
        $where = array(
            'nama_barang' => $barang
        );
        
        $cek = $this->m_front->cekHarga("t_barang",$where)->result();
        
        foreach($cek as $c){
            $harga = $c->harga;
            $id_barang = $c->id;
        }
        
        $total = $harga * $kuantitas;
        
         $data = array(
            'id_user' => $id_user,
            'id_barang' => $id_barang,
            'kuantitas' => $kuantitas,
            'total_harga' => $total
        );
        $this->m_front->inputTransaksi($data,'t_pesan');
        
        redirect('Front/tampilPemesanan/'.$id_user);
    }
    
    public function updateStatus(){
        $id_user    = $this->input->post('id_user');
        $nama       = $this->input->post('nama');
        $tgl_pesan  = $this->input->post('tgl_pesan');
        
        $where1 = array(
            'id_user' => $id_user
        );
        
        $cek = $this->m_front->cekHarga("t_pesan",$where1)->result();
        $tot_item = 0;
        foreach($cek as $c){
            $tot_item = $tot_item+$c->kuantitas;
        }
        
        $where2 = array(
            'id' => $id_user
        );
        
        $data = array(
            'nama' => $nama,
            'tgl_pesan' => $tgl_pesan,
            'total_item' => $tot_item,
            'status' => 1
        );
        
        $this->m_front->updateStatus($where2,$data,'t_user');
        redirect('Front');
    }
    
}