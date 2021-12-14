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
	public function create_report(){
		// if($this->report_model->create_report()){
		// 	echo "berhasil";
		// }
		if($this->report_model->create_report()){
			redirect('report_controler');
		}
		// $test=$this->report_model->get_report();
		// $query['apani'] = $this->db->get('menu');
		// // print_r($this->db->last_query());
		// // print_r($test); 
		// // echo count($query);
		// foreach($query['apani'] as $data_menu){
		// 	print_r($data_menu);
		// }

	}
	public function report_maker(){
		$this->report_model->report_maker();

	}
}
