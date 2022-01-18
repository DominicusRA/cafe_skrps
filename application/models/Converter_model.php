<?php
    class Converter_model  extends CI_MODEL{
        function add($data){
            if($this->db->insert('bahan',$data)){
            return TRUE;
            };
        }
        function get_bahan(){
            return $this->db->query("SELECT * FROM bahan");
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
        function get(){
            echo date('m-Y', strtotime('-1 month'));;

            $this->db->select('nota.id_nota,nota.tanggal,menu_nota.jumlah,menu.nama,menu.id_menu');
            $this->db->from('menu_nota');
            $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
            $this->db->join('menu', 'menu_nota.id_menu=menu.id_menu');
            $result=$this->db->get();

            // $this->db->select('nota.id_nota,nota.tanggal,menu_nota.jumlah,menu.nama,menu.id_menu');
            // $this->db->from('menu_nota');
            // $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
            // $this->db->join('menu', 'menu_nota.id_menu=menu.id_menu');
            // $this->db->like('tanggal', '2020-10');
            // // $this->db->where();
            // $this->db->order_by('nama', 'ASC');
            // $result=$this->db->get();
            return $result;
        }
    }
?>