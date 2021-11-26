<?php
    class Report_model extends CI_MODEL{
        function get_report(){
            
            $this->db->select('*');
            $this->db->from('report');
            $this->db->order_by('periode', 'DESC');
            return $this->db->get();
        }

        function get_new_report(){
            $data=[];
            $date=date('m-Y', strtotime('-1 month'));
            $kode_report= "RPT/".date('m',strtotime('-1 month'))."/".date('Y');

            $this->db->select('*');
            $this->db->from('report');
            $this->db->where('periode', $date);
            $result = $this->db->count_all_results();
            if($result>0){
                return null;
                
            }else{
                $data['kode_report']=$kode_report;
                $data['date']=$date;
                return $data;
            }
        }
        function create_report(){
            $this->db->select('*');
            $this->db->from('menu');
            $menu=$this->db->get();
            foreach($menu->result_array() as $data_menu){
                echo "<br>";
                echo $data_menu['id_menu'];

                // $this->db->select('*');
                $this->db->select_sum('jumlah');
                $this->db->from('menu_nota');
                $this->db->where('id_menu', $data_menu['id_menu']);
                $count_jual=$this->db->get();
                foreach($count_jual->result_array() as $data_count_jual){
                    echo $data_count_jual['jumlah'];
                }
//                 SELECT id FROM things 
//    WHERE MONTH(happened_at) = 1 AND YEAR(happened_at) = 2009
            }
        }

    }
?>