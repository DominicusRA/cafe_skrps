<?php
    class Dashboard_model extends CI_MODEL{
        function get_menu(){
            $this->db->select('nama');
            $this->db->from('menu');
            return $this->db->get();
        }
        
    }
?>