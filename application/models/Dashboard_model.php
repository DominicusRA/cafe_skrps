<?php
    class Dashboard_model extends CI_MODEL{
        function get_penjualan_menu(){
            // $this->db->select('nama');
            // $this->db->from('menu');
            // return $this->db->get();

            $this->db->select('menu.nama');
            $this->db->select_sum('menu_nota.jumlah');
            $this->db->from('menu_nota');
            $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
            $this->db->join('menu', 'menu.id_menu=menu_nota.id_menu');
            // $this->db->where('YEAR(nota.tangal)',date('Y'));
            $this->db->where('YEAR(nota.tanggal)','2021');
            $this->db->group_by('menu.nama');
            $this->db->order_by('jumlah','DESC');
            return $this->db->get();
        }
        function get_penjualan_bulan(){
            $this->db->select('MONTH(tanggal) AS bulan');
            $this->db->select_sum('menu_nota.jumlah');
            $this->db->from('menu_nota');
            $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
            // $this->db->where('YEAR(nota.tangal)',date('Y'));
            $this->db->where('YEAR(nota.tanggal)','2021');
            $this->db->group_by('MONTH(tanggal)', 'DESC');
            return $this->db->get();

        }
        
    }
?>