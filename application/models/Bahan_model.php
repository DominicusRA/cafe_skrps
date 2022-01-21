<?php
    class Bahan_model extends CI_MODEL{
        function add($data){
            if($this->db->insert('bahan',$data)){
            return TRUE;
            };
        }
        function get_bahan(){
            // return $this->db->query("SELECT * FROM bahan");

            $this->db->select('bahan.kode_bahan,bahan.nama_bahan,satuan.satuan');
            $this->db->from('bahan');
            $this->db->join('satuan', 'satuan.id_satuan=bahan.id_satuan');
            $data=$this->db->get();
            return $data;
        }
        function get_code(){
            return $this->db->query("SELECT kode_bahan FROM bahan ORDER BY kode_bahan DESC LIMIT 1");
        }
        function delete_bahan($data){
            // $count = $this->db->query("SELECT count(id_bahan) FROM resep WHERE id_bahan = $data");
            $query = $this->db->get_where('resep', $data);
            if($query->num_rows()==0){
                return $this->db->delete('bahan', $data);
            }
        }
    }
?>