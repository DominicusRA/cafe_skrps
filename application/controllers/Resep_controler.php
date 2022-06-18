<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep_controler extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('resep_model');
		$this->load->model('login_model');

		if ($this->session->userdata('akses') != "admin") {
			$url = base_url('login');
			redirect('login_controler');
		};
	}
	public function index()
	{
		if ($this->login_model->cek_session()) {
			$data['bahan'] = $this->resep_model->get_bahan();
			$data['menu'] = $this->resep_model->get_menu();
			$data['last_code'] = $this->resep_model->get_code();
			$this->load->view("resep/dashboard", $data);
		} else {
			$this->load->view('login/login');
		}
	}
	public function edit_data()
	{
		// echo $this->input->post('harga')."<br>";
		// echo $this->input->post('id_menu');
		$data = array(
			'harga' => $this->input->post('harga')
		);
		$this->resep_model->edit_menu($data, $this->input->post('id_menu'));
		redirect('resep_controler');
	}
	public function add()
	{
		$data = [];
		if ($this->login_model->cek_session()) {
			$data = array(
				'nama' => $this->input->post('menu'),
				'kode_menu' => $this->input->post('kode_menu'),
				'harga' => $this->input->post('harga')
			);
			$select_bahan = $this->input->post("select_bahan");
			$jumlah = $this->input->post("jumlah");
			if ($this->db->insert('menu', $data)) {
				$id_menu = $this->db->insert_id();
				for ($i = 0; $i < count($select_bahan); $i++) {
					$data_resep[$i] = array(
						'id_bahan' => $select_bahan[$i],
						'takaran' => $jumlah[$i],
						'id_menu' => $id_menu
					);
				}
			};
			$status = $this->resep_model->add_menu($data_resep);
			if ($status) {
				redirect('resep_controler');
			} else {
				echo '<script>alert("Penambahan Bahan Gagal !!!")</script>';
				redirect('resep_controler');
			}
		} else {
			$this->load->view('login_view');
		}
	}
	public function delete($menu)
	{
		$data = array(
			'id_menu' => $menu
		);
		$status = $this->resep_model->delete_menu($data);
		if ($status == true) {
			redirect('resep_controler');
		} else {
			echo "gagal";
		}
	}
	public function see($menu)
	{
		$data['resep'] = $this->resep_model->get_resep($menu);
		$this->load->view("resep/detail", $data);
	}
	public function edit($menu)
	{
		$data['resep'] = $this->resep_model->get_resep($menu);
		$this->load->view("resep/edit", $data);
	}
}
