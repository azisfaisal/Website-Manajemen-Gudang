<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
    
    function __construct(){
        parent::__construct();      
        
        $this->load->model('m_gudang');

    }
    
    public function index(){
        $data['barang'] = $this->m_gudang->tampilBarang()->result();
        $data['barangCount'] = $this->m_gudang->tampilBarang()->num_rows();
        $data['listBarang'] = $this->m_gudang->cekBarang()->result();
        $this->load->view('v_gudang',$data);
    }
    
    public function cekStok($id){
        //update status_gudang
        $where = array(
            't_pesan.id' => $id
        );
        
        $data = array(
            'status_barang' => 1
        );
        
        $this->m_gudang->updateStatus($where,$data,'t_pesan');
        
        //mengambil id_user
        $cekUser = $this->m_gudang->cekUser('t_pesan',$where)->result();
        foreach($cekUser as $cu){
            $id_user = $cu->id_user;
            $id_barang = $cu->id_barang;
            $kuantitas = $cu->kuantitas;
        }
 
        
        //mengambil banyak status_gudang
        $where2 = array(
            't_pesan.id_user' => $id_user
        );
        
        $cek = $this->m_gudang->cekStok($where2)->result();
        foreach($cek as $c){
            $total_item = $c->total_item;
            $total_status = $c->status;
        }
        
        //mengambil stok
        $where3 = array(
            'id' => $id_barang
        );
        $cekStok = $this->m_gudang->cekUser('t_barang',$where3)->result();
        foreach($cekStok as $cs){
            $stok = $cs->stok;
            $harga = $cs->harga;
        }
        
        if($kuantitas > $stok){
            $kuantitas = $stok;
            $total_harga = $kuantitas * $harga;
            $data3 = array(
                'kuantitas' => $kuantitas, 
                'total_harga' => $total_harga
            );
            
            $this->m_gudang->updateStatus($where,$data3,'t_pesan');
        }
        
        //update stok
        $data2 = array(
            'stok' => $stok - $kuantitas
        );
        $this->m_gudang->updateStatus($where3,$data2,'t_barang');

        if($total_item == $total_status){
            $cekHarga = $this->m_gudang->cekHarga($where2)->result();
            foreach($cekHarga as $ch){
                $total = $ch->total;
                $item = $ch->kuantitas;
            }
            
            $where4 = array(
                'id' => $id_user
            );
            $data4 = array(
                'total_harga' => $total,
                'total_item' => $item,
                'status' => 2
            );
            $this->m_gudang->updateStatus($where4,$data4,'t_user');
        }
        redirect('Gudang');
    }

    
}
