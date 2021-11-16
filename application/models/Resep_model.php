<?php
    class Resep_model extends CI_MODEL{
        function get_bahan(){
            return $this->db->query("SELECT * FROM bahan");
        }
        function get_code(){
            return $this->db->query("SELECT kode_menu FROM menu ORDER BY kode_menu DESC LIMIT 1");
        }
        function add_menu($data_resep){
            if($this->db->insert_batch('resep',$data_resep)){
                return true;
            }else{
                return false;
            }
        }
        function get_menu(){
            return $this->db->query("SELECT * FROM menu");
        }
        function delete_menu($data){
            if($this->db->delete('menu', $data)){
                if($this->db->delete('resep', $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
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