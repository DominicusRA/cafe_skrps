<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('login_model');
    }
	public function index()
	{
		// $this->load->view('loginview');
		$status = $this->login_model->cek_session();
		if($status){
			// echo $status;
            redirect("dashboard_controler");
        }else{
            $this->load->view('login_view');
        }
	}
	public function cek_log()
	{
		// $username = $this->input->post("username", TRUE);
        // $password = $this->input->post("password", TRUE);
		// $password = md5($password);
		// $username = md5($username);
		$password = md5($this->input->post("password", TRUE));
		$username = md5($this->input->post("username", TRUE));

		$status = $this->login_model->cek_login(array('username'=>$username),array('password'=>$password));
		if($status!=FALSE){
            foreach($status as $apps){
                $session_data = array(
                    'nama'=>$apps->nama
				);
                $this->session->set_userdata($session_data);
            }
			redirect("dashboard_controler");
        }else{
            $this->index();
        }
	}
	public function log_out(){
        $this->session->sess_destroy();
        redirect("login_controler");
	}
	public function register(){
		$this->load->view('register_view');
	}
	public function registeradd(){
		// $username = $this->input->post("username", TRUE);
        // $password = $this->input->post("password", TRUE);
		$password = md5($this->input->post("password", TRUE));
		$username = md5($this->input->post("username", TRUE));

		$this->login_model->add($username,$password);
		redirect('login_controler');
	}
}
