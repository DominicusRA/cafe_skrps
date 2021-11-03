<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('stok_model');
		$this->load->model('login_model');
    }
	public function index()
	{
		// $this->load->view('stok/dashboard');

		if($this->login_model->cek_session()){

            $data['bahan']=$this->stok_model->get_bahan();
            $this->load->view("stok/dashboard",$data);

        }else{
            $this->load->view('login/login');
        }
	}
}
