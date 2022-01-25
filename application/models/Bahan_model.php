<?php
    class Bahan_model extends CI_MODEL{
        function add($data,$limit){
            if($this->db->insert('bahan',$data)){
                $id_bahan = $this->db->insert_id();

                $data_stok=array(
                    'id_bahan' => $id_bahan,
                    'jumlah' => 0,
                    'limit' => $limit
                );
                if($this->db->insert('stok',$data_stok)){
                    return TRUE;

                }else{
                    return FALSE;
                }
            };
        }
        function get_satuan(){
            $this->db->select('*');
            $this->db->from('satuan');
            $data=$this->db->get();
            return $data;
        }
        function get_bahan(){
            // return $this->db->query("SELECT * FROM bahan");

            $this->db->select('bahan.kode_bahan,bahan.nama_bahan,satuan.satuan');
            $this->db->from('bahan');
            $this->db->join('satuan', 'satuan.id_satuan=bahan.id_satuan');
            $this->db->order_by('bahan.kode_bahan','ASC');
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