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
            $x=array(-4,-3,-2,-1,0,1,2,3,4);
            $y=array();

            $this->db->select('*');
            $this->db->from('menu_nota');
            $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
            $this->db->where('nota.id_nota',15);
            $join=$this->db->get();
            foreach($join->result_array() as $test){
                // print_r($test);
                // echo "<br>";
            }


            $this->db->select('*');
            $this->db->from('menu');
            $menu=$this->db->get();
            
            // di ulang untuk dapat recort per bulan
            foreach($menu->result_array() as $data_menu){
                // echo $data_menu['id_menu']."<br>";
                $data_jual=array();
                for($bulan=1;$bulan<=9;$bulan++){
                    // echo $bulan;
                    // foreach($menu->result_array() as $data_menu){
                    $this->db->select_sum('menu_nota.jumlah');
                    $this->db->from('menu_nota');
                    $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
                    $this->db->where('menu_nota.id_menu', $data_menu['id_menu']);
                    // $this->db->where('MONTH(nota.tanggal)',date('m', strtotime('-'.$bulan.' month')));
                    $this->db->where('MONTH(nota.tanggal)',date('m'));
                    $this->db->where('YEAR(nota.tanggal)',date('Y'));
                    $count_jual=$this->db->get();
                    $i=0;
                    foreach($count_jual->result_array() as $data_count_jual){
                        // echo $data_count_jual['jumlah'];
                        // $data_jual=array($data_menu['id_menu']=>(isset($data_count_jual['jumlah']) ? $data_count_jual['jumlah'] : '0'));
                        array_push($data_jual,isset($data_count_jual['jumlah']) ? $data_count_jual['jumlah'] : '0');
                        // array_push($data_jual,(isset($data_count_jual['jumlah']) ? $data_count_jual['jumlah'] : '0'));
                    }
                    // }    
                    // array_push($y,$data_jual);
                }
                $y+=array($data_menu['id_menu']=>$data_jual);
            }

            echo "<pre>";
            echo "y : ";
            print_r($y);
            echo "x : ";
            print_r($x);
            echo "</pre>";
            
            $xy=array();
            $x2=array();
            $ty=array();
            // create isi XY //
            foreach($menu->result_array() as $data_menu){
                $data_xy=array();
                $total_y=0;
                for($i=0;$i<9;$i++){
                    array_push($data_xy,$y[$data_menu['id_menu']][$i]*$x[$i]);
                    $total_y+=$y[$data_menu['id_menu']][$i];
                    
                    
                }
                $xy+=array($data_menu['id_menu']=>$data_xy);
                $ty+=array($data_menu['id_menu']=>$total_y);

            }
            
            for($i=0;$i<count($x);$i++){
                // echo $i;
                // echo$data_jual_all[$i][23]*$x[$i];
                array_push($x2,pow($x[$i],2));
                // echo pow($x[$i],2);


            }

            echo "<pre>";
            echo "xy : ";
            print_r($xy);
            echo "X^2 : ";
            print_r($x2);
            echo "ty : ";
            print_r($ty);
            echo "</pre>";
            echo "Total xy : ".array_sum($xy[23]),"<br>";
            echo "Total x^2 : ".array_sum($x2)."<br>";
            $a=$ty[23]/count($x);
            $b=array_sum($xy)/array_sum($x2); //masih salah
            $hasil=$a+$b*5;
            echo"<br><br>";
            echo "A : ".$a."<br>";
            echo "B : ".$b."<br>";
            echo "Hasil : ".$hasil."<br>";
        }

    }
?>