<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_controler extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('transaksi_model');

		if ($this->session->userdata('akses') != "admin" && $this->session->userdata('akses') != "master") {
			$url = base_url('login');
			redirect('login_controler');
		};
	}
	public function index()
	{
		$data['tanggal_jual'] = $this->transaksi_model->get_tanggal_jual();
		$this->load->view("transaksi/penjualan/dashboard", $data);
		// if ($this->login_model->cek_session()) {

		// 	// $this->load->view("transaksi/dashboard",$data);

		// } else {
		// 	$this->load->view('login/login');
		// }
	}
	public function detail_penjualan($tanggal)
	{
		// if ($this->login_model->cek_session()) {

		$data['detail_jual'] = $this->transaksi_model->get_detail_jual($tanggal);
		$data['tanggal'] = $tanggal;
		$this->load->view("transaksi/penjualan/detail", $data);

		// echo "<pre>";
		// print_r($data['detail_jual']);
		// echo "</pre>";
		// $this->load->view("transaksi/dashboard",$data);

		// } else {
		// 	$this->load->view('login/login');
		// }
	}
}
