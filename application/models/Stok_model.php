<?php
    class Stok_model extends CI_MODEL{
        function get_bahan(){
            // return $this->db->query("SELECT * FROM stok");

            $this->db->select('*');
            $this->db->from('bahan');
            $this->db->join('stok', 'stok.id_bahan=bahan.id_bahan');
            $this->db->join('satuan', 'satuan.id_satuan=bahan.id_satuan');
            return $this->db->get();
        }
        function get_detail_transaksi($id_bahan){
            $this->db->select('tanggal,jumlah');
            $this->db->from('stok_masuk');
            $this->db->where('id_bahan',$id_bahan);
            return $this->db->get();
        }
        function get_detail_bahan($id_bahan){
            $this->db->select('bahan.nama_bahan,bahan.kode_bahan,satuan.satuan');
            $this->db->from('bahan');
            $this->db->join('stok', 'stok.id_bahan=bahan.id_bahan');
            $this->db->join('satuan', 'satuan.id_satuan=bahan.id_satuan');
            $this->db->where('bahan.id_bahan',$id_bahan);
            return $this->db->get();
        }
        function add_stok($data_stok){
            if($this->db->insert_batch('stok_masuk',$data_stok)){
                for ($i = max(array_keys($data_stok)); $i >= 0; $i--) {
                    print_r($data_stok[$i]);
                    echo "<br>";
    
    
                    $this->db->select('jumlah');
                    $this->db->from('stok');
                    $this->db->where('id_bahan',$data_stok[$i]['id_bahan']);
                    $this->db->limit(1);
                    $jumlah=$this->db->get();
                    foreach($jumlah->result_array() as $jumlah){
                        $jumlah_asli=$jumlah['jumlah'];
                    }

                    $data_update = array(
                        'jumlah' => $jumlah_asli+$data_stok[$i]['jumlah']
                    );
                    $this->db->where('id_bahan', $data_stok[$i]['id_bahan']);
                    $this->db->update('stok', $data_update);
                }
                return true;
            }else{
                return false;
            }
        }
    }
?>