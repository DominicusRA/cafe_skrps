<?php
    class Kasir_model extends CI_MODEL{
        function get_menu(){
            return $this->db->query("SELECT * FROM menu");
        }
    }
?>