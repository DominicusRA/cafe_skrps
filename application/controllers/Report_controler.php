<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('report_model');
		$this->load->model('login_model');
    }
	public function index()
	{
		if($this->login_model->cek_session()){
			$data['report']=$this->report_model->get_report();
			$data['new_report']=$this->report_model->get_new_report();
            $this->load->view("report/dashboard",$data);
        }else{
            $this->load->view('login/login.php');
        }
	}
}
