<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('bahan_model');
		$this->load->model('login_model');
    }
	public function index()
	{
		if($this->login_model->cek_session()){

            $data['bahan']=$this->bahan_model->get_pembelian();
			$data['last_code']=$this->bahan_model->get_code();
            $this->load->view("bahan_view",$data);

        }else{
            $this->load->view('login_view');
        }
	}
	public function add(){
		$data=[];
		if($this->login_model->cek_session()){
			$data=array(
				'nama_bahan' => $this->input->post('bahan'),
				'kode_bahan' => $this->input->post('kode_bahan')
			);
			$status=$this->bahan_model->add($data);
			if($status){
				redirect('bahan_controler');
			}else{
				echo '<script>alert("Penambahan Bahan Gagal !!!")</script>';
				redirect('bahan_controler');
			}
		}else{
			$this->load->view('login_view');
		}
	}
}
