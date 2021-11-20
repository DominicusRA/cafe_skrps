<?php
    class Kasir_model extends CI_MODEL{
        function get_menu(){
            return $this->db->query("SELECT * FROM menu");
        }
        function add_cart($data_cart){
            if($this->db->insert_batch('menu_nota',$data_cart)){
                return true;
            }else{
                return false;
            }
        }
    }
?>