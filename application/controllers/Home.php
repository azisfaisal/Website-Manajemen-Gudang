<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct(){
		parent::__construct();		
        
        $this->load->model('m_home');

    }
    
	public function index()
	{
        $this->load->view('v_home');
	}
    
    public function tambahUser()
	{
        $username = $this->input->post('nama');
        $tanggal = $this->input->post('tanggal');
        
        $data = array(
            'nama' => $username,
            'tgl_pesan' => $tanggal
        );
        
        $this->m_home->tambahUser($data,'t_user');
        
        $data_session = array(
            'nama' => $username,
            'tgl_pesan' => $tgl_pesan
        );
            
        $this->session->set_userdata($data_session);
        redirect('Home/Pesan');
	}
    
    public function Pesan(){
        $where = array(
            'nama' => $this->session->userdata('nama')
        );
        
        $data['user'] = $this->m_home->cek_user("t_user",$where)->result();
        $data['barang'] = $this->m_home->cek_barang()->result();
        
        $this->load->view('v_pesan',$data);
    }
    

}
