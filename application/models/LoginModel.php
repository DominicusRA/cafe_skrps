<?php
    class LoginModel extends CI_MODEL{
        function cek_login($username,$password){
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where($username);
            $this->db->where($password);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                return FALSE;
            } else {
                return $query->result();
            }
        }
        function cek_session(){
            // return $this->session->userdata('nama');
            if($this->session->userdata('nama')){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        // function add($username,$password,$user){

        //     $cek_akun=$this->db->query("SELECT count(*) AS jumlah FROM user");
        //     // $cek=$cek_akun->row()->jumlah;
        //     if($cek_akun->row()->jumlah<5){
        //         $cek=0;
        //     }else{
        //         $cek=$cek_akun->row()->jumlah;
        //     }

        //     if($cek==0){
        //         $data = array(
        //             'username'	=> 	$username,
        //             'pass' 	=>	$password,
        //             'user' => $user
        //         );
        //       $this->db->insert('user',$data);
        //     }  
        // }
    }
?>