<?php
    class Bahan_model extends CI_MODEL{
        function add($data){
            if($this->db->insert('bahan',$data)){
            return TRUE;
            };
        }
        function get_pembelian(){
            return $this->db->query("SELECT * FROM bahan");
        }
        function get_code(){
            return $this->db->query("SELECT kode_bahan FROM bahan ORDER BY kode_bahan DESC LIMIT 1");
        }
        function delete_bahan($data){
            return $this->db->delete('bahan', $data);
        }
    }
?>