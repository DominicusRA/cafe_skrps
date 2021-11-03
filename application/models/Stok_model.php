<?php
    class Stok_model extends CI_MODEL{
        function get_bahan(){
            return $this->db->query("SELECT * FROM bahan");
        }
    }
?>