<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('resep_model');
		$this->load->model('login_model');
    }
	public function index()
	{
		// $this->load->view('resep/dashboard');

		if($this->login_model->cek_session()){

            $data['bahan']=$this->resep_model->get_bahan();
            $this->load->view("resep/dashboard",$data);

        }else{
            $this->load->view('login/login');
        }
	}
	// public function get_satuan(){
	// 	$data = array(
    //         'id_bahan'=>$this->input->post('select_bahan')
	// 	);
	// 	$status = $this->resep_model->get_satuan($data);
	// 	echo $status;
    //     // $nim = $this->input->post('nim_lama');
    //     // $this->db->where('nim', $nim);
    //     // $this->db->update('mahasiswa',$data);
	// }
}
