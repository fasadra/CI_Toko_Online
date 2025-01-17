<?php

class Model_kategori extends CI_Model{
    public function data_anjing(){
        return $this->db->get_where("tb_barang", array('kategori' => 'anjing'));
    }
    
    public function data_kucing(){
        return $this->db->get_where("tb_barang", array('kategori' => 'kuing'));
    }

    public function data_monyet(){
        return $this->db->get_where("tb_barang", array('kategori' => 'pakaian monyet'));
    }

    public function data_pakaian_anak_anak(){
        return $this->db->get_where("tb_barang", array('kategori' => 'pakaian anak anak'));
    }

    public function data_peralatan_olahraga(){
        return $this->db->get_where("tb_barang", array('kategori' => 'peralatan olahraga'));
    }

}