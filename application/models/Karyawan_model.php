<?php
    class Karyawan_model extends CI_MODEL{
        function get_karyawan(){
            $this->db->select('user.nama,akses.akses,user.id_user');
            $this->db->from('user');
            $this->db->join('akses_user','akses_user.id_user=user.id_user');
            $this->db->join('akses','akses.id_akses=akses_user.id_akses');
            $data=$this->db->get();
            return $data;
        }
    }
?>