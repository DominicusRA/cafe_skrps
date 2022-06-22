<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_controler extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('stok_model');
		$this->load->model('login_model');

		if ($this->session->userdata('akses') != "admin" && $this->session->userdata('akses') != "master") {
			$url = base_url('login');
			redirect('login_controler');
		};
	}
	public function index()
	{
		// $this->load->view('stok/dashboard');

		$data['bahan'] = $this->stok_model->get_bahan();
		$this->load->view("stok/dashboard", $data);
		// if ($this->login_model->cek_session()) {

		// } else {
		// 	$this->load->view('login/login');
		// }
	}
	public function add_stok()
	{

		$tanggal = $this->input->post("tanggal");
		$select_bahan = $this->input->post("select_bahan");
		$jumlah = $this->input->post("jumlah");
		for ($i = 0; $i < count($select_bahan); $i++) {
			$data_stok[$i] = array(
				'tanggal' => $tanggal,
				'id_bahan' => $select_bahan[$i],
				'jumlah' => $jumlah[$i]
			);
		}
		// echo "ini jumlah indeknya ".count($data_stok);
		$status = $this->stok_model->add_stok($data_stok);
		if ($status) {
			redirect('stok_controler');
		} else {
			redirect('stok_controler');
		}
	}
	public function stok_master_maker()
	{

		$this->db->select('*');
		$this->db->from('bahan');
		$bahan = $this->db->get();

		foreach ($bahan->result_array() as $bahan) {

			// $data_tanggal['tanggal'];
			$data_stok = array(
				'id_bahan' => $bahan['id_bahan'],
				'jumlah' => 0
			);

			$this->db->insert('stok', $data_stok);
		}
	}
	public function detail($id_bahan)
	{
		$data['bahan'] = $this->stok_model->get_detail_bahan($id_bahan);
		$data['transaksi_stok'] = $this->stok_model->get_detail_transaksi($id_bahan);
		$this->load->view("stok/detail", $data);
	}
}
