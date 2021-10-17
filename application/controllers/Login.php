<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('loginmodel');
    }
	public function index()
	{
		// $this->load->view('loginview');
		$status = $this->loginmodel->cek_session();
		if($status){
			// echo $status;
            redirect("dashboard");
        }else{
            $this->load->view('loginview');
        }
	}
	public function cek_log()
	{
		$username = $this->input->post("username", TRUE);
        $password = $this->input->post("password", TRUE);
		// $password = md5($password);
		// $username = md5($username);

		$status = $this->loginmodel->cek_login(array('username'=>$username),array('password'=>$password));
		if($status!=FALSE){
            foreach($status as $apps){
                $session_data = array(
                    'nama'=>$apps->nama
				);
                $this->session->set_userdata($session_data);
            }
			redirect("dashboard");
        }else{
            $this->index();
        }
	}
}
