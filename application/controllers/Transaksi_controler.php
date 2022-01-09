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

            $data['last_date']=$this->transaksi_model->get_jumlah_penjualan_bulan();
            // $this->load->view("stok/dashboard",$data);
			// $this->load->view("transaksi/dashboard",$data);

        }else{
            $this->load->view('login/login');
        }
	}
}
