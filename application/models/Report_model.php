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
        function get_data_bahan(){
            $this->db->select('*');
            $this->db->from('bahan');
            $this->db->join('satuan', 'satuan.id_satuan=bahan.id_satuan');
            return $this->db->get();

        }
        function get_data_report($id_report){
            $data=array();
            // echo "<pre>";
            // echo "<br> masuk ke model get data report".$id_report;

            $data_resep_array=array();
            $data_bahan_array=array();

            // buat memori array bahan
            $this->db->select('*');
            $this->db->from('stok');
            $this->db->join('bahan','bahan.id_bahan=stok.id_bahan');
            $this->db->join('satuan', 'satuan.id_satuan=bahan.id_satuan');
            $data['data_stok']=$this->db->get();

            $this->db->select('*');
            $this->db->from('bahan');
            $this->db->join('satuan', 'satuan.id_satuan=bahan.id_satuan');
            $data_bahan=$this->db->get();
            $data['data_bahan']=$data_bahan;
            foreach($data_bahan->result_array() as $data_bahan){
                $data_bahan_array+=array($data_bahan['id_bahan']=>0);
            }

            // echo "ini bagian resep";
            // $this->db->select('*');
            // $this->db->from('resep');
            // $this->db->join('menu','menu.id_menu=resep.id_menu');
            // $this->db->where('id_menu',$id_menu);
            // $data_resep=$this->db->get();
            // foreach($data_resep->result_array() as $data_resep){
            //     print_r($data_resep);
            // }
            // echo "end off resep";

            $this->db->select('*');
            $this->db->from('report_menu');
            $this->db->join('menu', 'menu.id_menu=report_menu.id_menu');
            $this->db->where('id_report',$id_report);
            $data_report=$this->db->get();
            $data['data_report']=$data_report;
            // foreach($bahan->result_array() as $bahan){
            
            // print_r($data_bahan_array);
            foreach($data_report->result_array() as $data_report){
                // echo $data_report['id_menu']."<br>";
                // echo $data_report['nama']."<br>";

                // echo "<br>____________________data report____________________<br> ";
                // print_r($data_report);
                // echo "<br>";

                $this->db->select('*');
                $this->db->from('resep');
                $this->db->join('menu','menu.id_menu=resep.id_menu');
                $this->db->where('resep.id_menu',$data_report['id_menu']);
                $data_resep=$this->db->get();
                // echo "<br>__________data resep__________<br> ";
                foreach($data_resep->result_array() as $data_resep){
                    $get_bahan=$data_bahan_array[$data_resep['id_bahan']];
                    // print_r($data_resep);
                    $jumlah_bahan=0;
                    $jumlah_bahan=$data_report['jumlah_prediksi']*$data_resep['takaran'];
                    if($jumlah_bahan>0){
                        // $get_bahan=+$data_report['jumlah_prediksi']*$data_resep['takaran'];
                        $data_bahan_array[$data_resep['id_bahan']]=$data_bahan_array[$data_resep['id_bahan']]+$jumlah_bahan;
                    }
                    // echo "hasilnya :".$jumlah_bahan."<br>";
                    // echo "array hasilnya :".$data_bahan_array[$data_resep['id_bahan']]."<br>";
                }
                // echo "<br>";
            }
            // print_r($data_bahan_array);
            $data['data_bahan_prediksi']=$data_bahan_array;
            // echo"<br> ini data yang sudah di masukan <br>";
            // print_r($data);
            // echo "</pre>";
            return $data;

        }
        function create_report(){
            $x=array(-4,-3,-2,-1,0,1,2,3,4);
            $x2=array();
            $y=array();

            for($i=0;$i<count($x);$i++){
                array_push($x2,pow($x[$i],2));
            }

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
                $test_bulan=12;
                for($bulan=9;$bulan>=1;$bulan--){
                    // echo $bulan."<br>";
                    // foreach($menu->result_array() as $data_menu){
                    $this->db->select_sum('menu_nota.jumlah');
                    $this->db->from('menu_nota');
                    $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
                    $this->db->where('menu_nota.id_menu', $data_menu['id_menu']);
                    $this->db->where('MONTH(nota.tanggal)',date('m', strtotime('-'.$bulan.' month')));
                    // $this->db->where('MONTH(nota.tanggal)',$test_bulan);
                    $this->db->where('YEAR(nota.tanggal)',date('Y'));
                    // $this->db->where('YEAR(nota.tanggal)','2020');
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
                    $test_bulan--;
                }
                $y+=array($data_menu['id_menu']=>$data_jual);
            }

            // echo "<pre>";
            // echo "y : ";
            // print_r($y);
            // echo "x : ";
            // print_r($x);
            // echo "</pre>";
            
            $xy=array();
            
            $total_y=array();
            $total_xy=array();
            $a=array();
            $b=array();
            $hasil=array();
            // create isi XY //
            foreach($menu->result_array() as $data_menu){
                $data_xy=array();
                $t_y=0;
                for($i=0;$i<9;$i++){
                    array_push($data_xy,$y[$data_menu['id_menu']][$i]*$x[$i]);
                    $t_y+=$y[$data_menu['id_menu']][$i];
                    
                    
                }
                $xy+=array($data_menu['id_menu']=>$data_xy);
                $total_y+=array($data_menu['id_menu']=>$t_y);
                $total_xy+=array($data_menu['id_menu']=>array_sum($xy[$data_menu['id_menu']]));
                $a+=array($data_menu['id_menu']=>$total_y[$data_menu['id_menu']]/count($x));
                $b+=array($data_menu['id_menu']=>$total_xy[$data_menu['id_menu']]/array_sum($x2));
                $hasil+=array($data_menu['id_menu']=>$a[$data_menu['id_menu']]+$b[$data_menu['id_menu']]*5);
                // array_push($hasil,$a[$data_menu['id_menu']]+$b[$data_menu['id_menu']]*5);
                // $hasil=$aa+$bb*5;


            }
            
            //////////////////////////////////////////////////////////////
            // JANGAN DI HAPUS
            // untuk cek proses data
            // echo "<pre>";
            // echo "y : ";
            // print_r($y);
            // echo "xy : ";
            // print_r($xy);
            // echo "X^2 : ";
            // print_r($x2);
            // echo "Total y : ";
            // print_r($total_y);
            // echo "Total xy : ";
            // print_r($total_xy);
            // echo "A : ";
            // print_r($a);
            // echo "B : ";
            // print_r($b);
            // echo "Total x^2 : ".array_sum($x2)."<br>";
            // echo "HASIL : ";
            // print_r($hasil);
            // echo "</pre>";
            // echo count($hasil);
            //////////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////////
            // ini untuk masukan data hasil perhitungan ke database
            $data_header_report=array(
                'periode'=>date('m-Y', strtotime('-1 month')),
                'kode_report'=> "RPT/".date('m',strtotime('-1 month'))."/".date('Y')
            );

            $this->db->select('*');
            $this->db->from('report');
            $this->db->where($data_header_report);
            $this->db->limit(1);
            if($this->db->count_all_results()==0){
                if($this->db->insert('report',$data_header_report)){
                    $id_report = $this->db->insert_id();
                    $i=0;
                    foreach($menu->result_array() as $data_menu){
                        // for ($i = 0; $i < count($hasil); $i++) {
                        $data_hasil[$i]=array(
                            'id_report' => $id_report,
                            'id_bahan' => $data_menu['id_menu'],
                            'jumlah_prediksi' => round($hasil[$data_menu['id_menu']])
                        );
                        // }
                        $this->db->insert('report_menu',$data_hasil[$i]);
                        $i++;
                    }
                }
            }
            //////////////////////////////////////////////////////////////
            // echo "<pre>";
            // print_r($data_hasil);
            // echo "</pre>";
            return true;
        }
        function report_maker(){
            // $ta
            // $tanggal_cek.="asda";

            $this->db->select('*');
            $this->db->from('report');
            $this->db->order_by('periode', 'ASC');
            $this->db->limit(1);
            $tanggal=$this->db->get();

            $this->db->select('*');
            $this->db->from('nota');
            $this->db->order_by('tanggal', 'ASC');
            $this->db->limit(1); 
            $tanggal_nota=$this->db->get();

            foreach($tanggal_nota->result_array() as $data_tanggal){
                // $tanggal_cek.=$data_tanggal['tanggal'];
                $datetime_report_maker = new DateTime($data_tanggal['tanggal']);
                // echo "ini yang di periksa ".$datetime_report_maker."<br>";
                $datetime_report_maker->modify('+5 month');
                $tanggal_cek= $datetime_report_maker->format('Y-m-d');
            }

            echo "ini tanggal yang di cek ".$tanggal_cek."<br>";
            echo "ini tanggal transaksi pertama ".$data_tanggal['tanggal'];

            // for($cek_bulan=0;)
            $datetime_tanggal_cek = new DateTime($tanggal_cek);
            // $cek_bulan=0;
            while(date('m-Y')<$datetime_tanggal_cek->format('m-Y')){
                echo "masuk <br>";
                echo date('m-Y')." >= ";
                echo $datetime_tanggal_cek->format('m-Y');
                // $cek_bulan++;
                $datetime_tanggal_cek->modify('+ 1 month');
                ///////////////////////////////////////////////////////////////////////////////////////
                // $x=array(-4,-3,-2,-1,0,1,2,3,4);
                $x=array(-5,-3,-1,1,3,5);
                $x2=array();
                $y=array();
    
                for($i=0;$i<count($x);$i++){
                    array_push($x2,pow($x[$i],2));
                }
    
                // $this->db->select('*');
                // $this->db->from('menu_nota');
                // $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
                // $this->db->where('nota.id_nota',15);
                // $join=$this->db->get();
    
                // foreach($join->result_array() as $test){
                //     // print_r($test);
                //     // echo "<br>";
                // }
    
    
                $this->db->select('*');
                $this->db->from('menu');
                $menu=$this->db->get();
                
                // di ulang untuk dapat recort per bulan
                foreach($menu->result_array() as $data_menu){
                    // echo $data_menu['id_menu']."<br>";
                    $data_jual=array();
                    $test_bulan=12;
                    // echo "<br>";
                    for($bulan=6;$bulan>=1;$bulan--){
                        $datetime_report = new DateTime($datetime_tanggal_cek->format('Y-m-d'));
                        // echo $bulan."<br>";
                        // foreach($menu->result_array() as $data_menu){
                        $datetime_report->modify('-'.$bulan.' month');
                        $tanggal_cek_m= $datetime_report->format('m')."<br>";
                        $tanggal_cek_Y= $datetime_report->format('Y')."<br>";
                        // echo $tanggal_cek_m;
                        // echo $tanggal_cek_Y;
    
                        $this->db->select_sum('menu_nota.jumlah');
                        $this->db->from('menu_nota');
                        $this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
                        $this->db->where('menu_nota.id_menu', $data_menu['id_menu']);
                        $this->db->where('MONTH(nota.tanggal)',$tanggal_cek_m);
                        // $this->db->where('MONTH(nota.tanggal)',$test_bulan);
                        $this->db->where('YEAR(nota.tanggal)',$tanggal_cek_Y);
                        // $this->db->where('YEAR(nota.tanggal)','2020');
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
                        $test_bulan--;
                    }
                    $y+=array($data_menu['id_menu']=>$data_jual);
                }
    
                // echo "<pre>";
                // echo "y : ";
                // print_r($y);
                // echo "x : ";
                // print_r($x);
                // echo "</pre>";
                
                $xy=array();
                
                $total_y=array();
                $total_xy=array();
                $a=array();
                $b=array();
                $hasil=array();
                // create isi XY //
                foreach($menu->result_array() as $data_menu){
                    $data_xy=array();
                    $t_y=0;
                    for($i=0;$i<6;$i++){
                        array_push($data_xy,$y[$data_menu['id_menu']][$i]*$x[$i]);
                        $t_y+=$y[$data_menu['id_menu']][$i];
                        
                        
                    }
                    $xy+=array($data_menu['id_menu']=>$data_xy);
                    $total_y+=array($data_menu['id_menu']=>$t_y);
                    $total_xy+=array($data_menu['id_menu']=>array_sum($xy[$data_menu['id_menu']]));
                    $a+=array($data_menu['id_menu']=>$total_y[$data_menu['id_menu']]/count($x));
                    $b+=array($data_menu['id_menu']=>$total_xy[$data_menu['id_menu']]/array_sum($x2));
                    $hasil+=array($data_menu['id_menu']=>$a[$data_menu['id_menu']]+$b[$data_menu['id_menu']]*7);
                    // array_push($hasil,$a[$data_menu['id_menu']]+$b[$data_menu['id_menu']]*5);
                    // $hasil=$aa+$bb*5;
    
    
                }
                
                //////////////////////////////////////////////////////////////
                // JANGAN DI HAPUS
                // untuk cek proses data
                // echo "<pre>";
                // echo "y : ";
                // print_r($y);
                // echo "xy : ";
                // print_r($xy);
                // echo "X^2 : ";
                // print_r($x2);
                // echo "Total y : ";
                // print_r($total_y);
                // echo "Total xy : ";
                // print_r($total_xy);
                // echo "A : ";
                // print_r($a);
                // echo "B : ";
                // print_r($b);
                // echo "Total x^2 : ".array_sum($x2)."<br>";
                // echo "HASIL : ";
                // print_r($hasil);
                // echo "</pre>";
                // echo count($hasil);
                //////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////
                // ini untuk masukan data hasil perhitungan ke database
                $data_header_report=array(
                    'periode'=>$datetime_tanggal_cek->format('m-Y'),
                    // 'periode'=>$datetime_tanggal_cek->format('m-Y'),
                    'kode_report'=> "RPT/".$datetime_tanggal_cek->format('m')."/".$datetime_tanggal_cek->format('Y')
                );
                print_r($data_header_report);
                // echo "masuk sini?";
    
                // $this->db->select('*');
                $this->db->select('kode_report');
                $this->db->from('report');
                $this->db->where($data_header_report);
                $this->db->limit(1);
                if($this->db->count_all_results()==0){
                    if($this->db->insert('report',$data_header_report)){
                        $id_report = $this->db->insert_id();
                        $i=0;
                        foreach($menu->result_array() as $data_menu){
                            // for ($i = 0; $i < count($hasil); $i++) {
                            $data_hasil[$i]=array(
                                'id_report' => $id_report,
                                'id_menu' => $data_menu['id_menu'],
                                'jumlah_prediksi' => round($hasil[$data_menu['id_menu']])
                            );
                            // }
                            $this->db->insert('report_menu',$data_hasil[$i]);
                            $i++;
                        }
                    }
                }
                //////////////////////////////////////////////////////////////
                // echo "<pre>";
                // print_r($data_hasil);
                // echo "</pre>";
                // return true;
                unset($y);
                
                unset($y);
                
                unset($xy);
                
                unset($x2);
                
                unset($total_y);
                
                unset($total_xy);
                
                unset($a);
                
                unset($b);
                
                unset($hasil);
                
                // echo count($hasil);
            }

        }
        
    }
?>