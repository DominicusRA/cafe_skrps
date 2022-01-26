<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('dashboard_model');
		$this->load->model('login_model');
    }
	public function index()
	{
		if($this->login_model->cek_session()){

            $data['penjualan_menu']=$this->dashboard_model->get_penjualan_menu();
			$data['penjualan_bulan']=$this->dashboard_model->get_penjualan_bulan();
			// $data['penjualan']=$this->dashboard_model->get_penjualan();
			$this->load->view('dashboard/dashboard',$data);

        }else{
            $this->load->view('login/login');
        }
	}
}
