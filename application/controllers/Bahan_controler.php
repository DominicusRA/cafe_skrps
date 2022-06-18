<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bahan_controler extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('bahan_model');
		$this->load->model('login_model');

		if ($this->session->userdata('akses') != "admin") {
			$url = base_url('login');
			redirect('login_controler');
		};
	}
	public function index()
	{
		if ($this->login_model->cek_session()) {

			$data['bahan'] = $this->bahan_model->get_bahan();
			$data['last_code'] = $this->bahan_model->get_code();
			$data['satuan'] = $this->bahan_model->get_satuan();
			$this->load->view("bahan/dashboard", $data);
		} else {
			$this->load->view('login_view');
		}
	}
	public function add()
	{
		$data = [];
		if ($this->login_model->cek_session()) {
			$data = array(
				'nama_bahan' => $this->input->post('bahan'),
				'kode_bahan' => $this->input->post('kode_bahan'),
				'id_satuan' => $this->input->post('satuan')
			);
			echo $this->input->post('satuan');
			$status = $this->bahan_model->add($data, $this->input->post('minimum_stok'));
			if ($status) {
				redirect('bahan_controler');
			} else {
				echo '<script>alert("Penambahan Bahan Gagal !!!")</script>';
				redirect('bahan_controler');
			}
		} else {
			$this->load->view('login_view');
		}
	}
	public function delete($bahan)
	{
		$data = array(
			'id_bahan' => $bahan
		);
		$status = $this->bahan_model->delete_bahan($data);
		if ($status == true) {
			redirect('bahan_controler');
		} else {
			redirect('bahan_controler');
		}
	}
}
