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
        function get_data_karyawan($id_user){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('akses_user','akses_user.id_user=user.id_user');
            $this->db->join('akses','akses.id_akses=akses_user.id_akses');
            $this->db->where('user.id_user',$id_user);
            $data=$this->db->get();
            return $data;
        }
        function get_akses(){
            $this->db->select('*');
            $this->db->from('akses');
            $data=$this->db->get();
            return $data;
        }
        function edit_user($data,$id_user){
            $this->db->where('id_user', $id_user);
            $this->db->update('akses_user', $data['akses_user']);

            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data['user']);
        }
    }
?>