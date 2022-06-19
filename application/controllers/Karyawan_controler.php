<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_controler extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('karyawan_model');
		$this->load->model('login_model');

		if ($this->session->userdata('akses') != "admin") {
			$url = base_url('login');
			redirect('login_controler');
		};
	}
	public function index()
	{
		// if ($this->login_model->cek_session()) {

		$data['karyawan'] = $this->karyawan_model->get_karyawan();
		$this->load->view('karyawan/dashboard', $data);
		// } else {
		// 	$this->load->view('login/login');
		// }
	}
	public function see($id_user)
	{
		echo $id_user;
	}
	public function edit($id_user)
	{
		$data['karyawan'] = $this->karyawan_model->get_data_karyawan($id_user);
		$data['akses'] = $this->karyawan_model->get_akses();
		$this->load->view('karyawan/edit', $data);
	}
	public function edit_data()
	{
		// echo "welkom to karyawan kontroler in edit data";
		$data['akses_user'] = array(
			'id_akses' => $this->input->post('id_akses')
		);
		$data['user'] = array(
			'nama' => $this->input->post('nama_user')
		);
		$status = $this->karyawan_model->edit_user($data, $this->input->post('id_user'));
		redirect('karyawan_controler');
	}
}
