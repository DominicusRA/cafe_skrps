<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('transaksi_model');
    }
	public function index()
	{
		if($this->login_model->cek_session()){

            $data['tanggal_jual']=$this->transaksi_model->get_tanggal_jual();
            $this->load->view("transaksi/penjualan/dashboard",$data);
			// $this->load->view("transaksi/dashboard",$data);

        }else{
            $this->load->view('login/login');
        }
	}
	public function detail_penjualan($tanggal){
		if($this->login_model->cek_session()){

            $data['detail_jual']=$this->transaksi_model->get_detail_jual($tanggal);
            $this->load->view("transaksi/penjualan/detail",$data);
			
			// echo "<pre>";
			// print_r($data['detail_jual']);
			// echo "</pre>";
			// $this->load->view("transaksi/dashboard",$data);

        }else{
            $this->load->view('login/login');
        }
	}
}
