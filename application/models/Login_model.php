<?php
class Login_model extends CI_MODEL
{
    function cek_login($username, $password)
    {
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
    function cek_login_v2($username, $password)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('akses_user', 'user.id_user=akses_user.id_user');
        $this->db->join('akses', 'akses_user.id_akses=akses.id_akses');
        $this->db->where($username);
        $this->db->where($password);
        $query = $this->db->get();



        // $this->db->select('*');
        // $this->db->from('admin');
        // $this->db->where($username);
        // $this->db->where($password);
        // $this->db->limit(1);
        // $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    // function cek_session(){
    //     // return $this->session->userdata('nama');
    //     if($this->session->userdata('nama')){
    //         // if($this->session->userdata('akses')=="admin"){

    //         // }
    //         return TRUE;
    //     }else{
    //         return FALSE;
    //     }
    // }
    function get_akses()
    {
        $this->db->select('*');
        $this->db->from('akses');
        return $this->db->get();
    }
    function add($username, $password)
    {


        $data = array(
            'nama'    => 'Admin',
            'username'     =>    $username,
            'password' => $password
        );
        $this->db->insert('admin', $data);
        // }  
    }
    function add_v2($username, $password, $akses)
    {


        $data = array(
            'nama'    => 'Admin',
            'username'     =>    $username,
            'password' => $password
        );
        $this->db->insert('user', $data);

        $id_user = $this->db->insert_id();

        $data_akses = array(
            'id_user'    => $id_user,
            'id_akses'     =>    $akses
        );
        $this->db->insert('akses_user', $data_akses);
        // }  
    }
}
