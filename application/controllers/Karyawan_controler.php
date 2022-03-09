<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('karyawan_model');
		$this->load->model('login_model');
    }
	public function index()
	{
		if($this->login_model->cek_session()){

            $data['karyawan']=$this->karyawan_model->get_karyawan();
			$this->load->view('karyawan/dashboard',$data);

        }else{
            $this->load->view('login/login');
        }
	}
	public function see($id_user){
		echo $id_user;
	}
	public function edit($id_user){
		$data['karyawan']=$this->karyawan_model->get_data_karyawan($id_user);
		$this->load->view('karyawan/edit',$data);
	}
}
