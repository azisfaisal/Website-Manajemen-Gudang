<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
    function __construct(){
        parent::__construct();      
        
        $this->load->model('m_transaksi');

    }
    
    public function index(){
        $data['user'] = $this->m_transaksi->tampilTransaksi()->result();
        $data['barang'] = $this->m_transaksi->cekBarang()->result();
        $data['count'] = $this->m_transaksi->tampilTransaksi()->num_rows();
        $this->load->view('v_transaksi',$data);
    }
    
    public function tampilDetail($id){
        $where = array(
            'id' => $id
        );
        
        $where2 = array(
            'id_user' => $id
        );
        
        $data['tampil1'] = $this->m_transaksi->tampilDetail1('t_user',$where)->result();
        $data['tampil2'] = $this->m_transaksi->tampilDetail2($where2)->result();
        $this->load->view('v_detail_transaksi',$data);
    }
    
    public function Pembayaran($id){
        $bayar = $this->input->post('bayar');
        
        $where = array(
            'id' => $id
        );
        
        $cekHarga = $this->m_transaksi->tampilDetail1('t_user',$where)->result();
        foreach($cekHarga as $ch){
            $total_harga = $ch->total_harga;
        }
        
        $kembalian = $bayar - $total_harga;
        $data = array(
            'uang_bayar' => $bayar,
            'kembalian' => $kembalian,
            'status' => 3
        );
        
        print_r($data);
        $this->m_transaksi->updatePembayaran($where,$data,'t_user');
        redirect('Transaksi/tampilDetail/'.$id);
    }

    public function tampilDiskon(){
        $data['barang'] = $this->m_transaksi->cekBarang()->result();
        $this->load->view('v_diskon',$data);
    }
    
    public function tambahDiskon(){
        $barang = $this->input->post('barang');
        $diskon = $this->input->post('diskon');
        
        $where = array(
            'nama_barang' => $barang
        );
        
        $data = array(
            'diskon' => $diskon
        );
        
        $this->m_transaksi->updateDiskon($where,$data,'t_barang');
        
        $cek = $this->m_transaksi->cekDiskon($where)->result();
        
        foreach($cek as $c){
            $total_harga = $c->total_harga;
            $diskon = $c->diskon;
            
            $total_diskon = $diskon/100 * $total_harga;
            $total_harga = $total_harga - $total_diskon;
            
            $data2 = array(
                'total_harga' => $total_harga     
            );
            
            $where2 = array(
                'id_barang' => $c->id
            );
            
            $this->m_transaksi->updateDiskon($where2,$data2,'t_pesan');
            
            $where3 = array(
                'id_user' => $c->id_user
            );
            
            $where4 = array(
                'id' => $c->id_user,
                'status_diskon' => 0
            );
            $tot_harga = $this->m_transaksi->cekHarga($where3)->result();
            
            foreach($tot_harga as $th){
                $data3 = array(
                    'total_harga' => $th->total,
                    'status_diskon' => 1
                );
                $this->m_transaksi->updateDiskon($where4,$data3,'t_user');
            }
            
            
        }
        redirect('Transaksi');
    }
}