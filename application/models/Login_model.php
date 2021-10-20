<?php
    class Login_model extends CI_MODEL{
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
        function add($username,$password){

            
                $data = array(
                    'nama'	=> 'Admin',
                    'username' 	=>	$username,
                    'password' => $password);
              $this->db->insert('admin',$data);
            // }  
        }
    }
?>