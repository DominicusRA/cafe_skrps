<?php
    class Kasir_model extends CI_MODEL{
        function get_menu(){
            return $this->db->query("SELECT * FROM menu");
        }
        function add_cart($data_cart){
            if($this->db->insert_batch('menu_nota',$data_cart)){
                for ($i = max(array_keys($data_cart)); $i >= 0; $i--) {

                    print_r($data_cart[$i]);

                    $this->db->select('*');
                    $this->db->from('resep');
                    $this->db->where('id_menu',$data_cart[$i]['id_menu']);
                    $data_resep=$this->db->get();

                    foreach($data_resep->result_array() as $data_resep){
                        $this->db->select('jumlah');
                        $this->db->from('stok');
                        $this->db->where('id_bahan',$data_resep['id_bahan']);
                        $this->db->limit(1);
                        $jumlah=$this->db->get();
                        foreach($jumlah->result_array() as $jumlah){
                            $jumlah_asli=$jumlah['jumlah'];
                        }

                        $data_update = array(
                            'jumlah' => $jumlah_asli-$data_resep['takaran']
                        );
                        $this->db->where('id_bahan', $data_resep['id_bahan']);
                        $this->db->update('stok', $data_update);
                    }
                    
                }
                return true;
            }else{
                return false;
            }
        }
        function get_cart($cart){
            // print_r($cart);
            $this->db->select('*');
            $this->db->from('menu');
            $this->db->where_in('id_menu',$cart);
            return $this->db->get();
        }
    }
?>