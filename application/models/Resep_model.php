<?php
    class Resep_model extends CI_MODEL{
        function get_bahan(){
            return $this->db->query("SELECT * FROM bahan");
        }
        function get_code(){
            return $this->db->query("SELECT kode_menu FROM menu ORDER BY kode_menu DESC LIMIT 1");
        }
        function add($data,$data_resep){
            if($this->db->insert('menu',$data)){
                return TRUE;
            };
            // $this->db->insert('menu',$data);
            // $this->db->query("SELECT id_menu FROM menu ORDER BY kode_menu DESC LIMIT 1");
            // // $data_resep.=[]
            // $this->db->insert('resep',$data_resep);
        }
        function get_menu(){
            return $this->db->query("SELECT * FROM menu");
        }
        function delete_menu($data){
            return $this->db->delete('menu', $data);
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