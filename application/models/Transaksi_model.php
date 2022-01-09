<?php
    class Transaksi_model extends CI_MODEL{
        function get_tanggal_jual(){

            $this->db->select('tanggal');
            $this->db->distinct();
            $this->db->from('menu_nota');
            $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
            $this->db->order_by('tanggal', 'DESC');
            // $this->db->where('menu_nota.id_menu', $data_menu['id_menu']);
            // $this->db->where('MONTH(nota.tanggal)',date('m', strtotime('-'.$bulan.' month')));
            // $this->db->where('YEAR(nota.tanggal)',date('Y'));
            $result=$this->db->get();

            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";

            return $result;
            ;
        }
        function get_detail_jual($tanggal){
            
            $this->db->select('nota.id_nota,menu.nama,menu_nota.jumlah');
            $this->db->from('menu_nota');
            $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
            $this->db->join('menu', 'menu.id_menu=menu_nota.id_menu');
            $this->db->where('nota.tanggal', $tanggal);
            $this->db->order_by('nota.tanggal', 'DESC');
            $result=$this->db->get();
            return $result;

        }
    }
?>