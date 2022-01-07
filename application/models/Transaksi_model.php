<?php
    class Transaksi_model extends CI_MODEL{
        function get_jumlah_penjualan_bulan(){

            $this->db->select('menu_nota.jumlah');
            $this->db->from('menu_nota');
            $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
            $this->db->where('menu_nota.id_menu', $data_menu['id_menu']);
            $this->db->where('MONTH(nota.tanggal)',date('m', strtotime('-'.$bulan.' month')));
            $this->db->where('YEAR(nota.tanggal)',date('Y'));
            $result=$this->db->get();

            echo $result
            ;
        }
    }
?>