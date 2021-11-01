<?php
    class Resep_model extends CI_MODEL{
        function get_bahan(){
            return $this->db->query("SELECT * FROM bahan");
        }
        // function get_satuan($data){
        //     // return $this->db->query("SELECT * FROM bahan WHERE id_bahan = ");
        //     $this->db->select('*');
        //     $this->db->from('bahan');
        //     $this->db->where($data);
        //     $query = $this->db->get();
        //     return json_encode($query);
        // }
    }
?>