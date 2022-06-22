<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_controler extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kasir_model');
		$this->load->model('login_model');

		if ($this->session->userdata('akses') != "kasir" && $this->session->userdata('akses') != "master") {
			redirect('login_controler');
		};
	}
	public function index()
	{
		// $this->load->view('kasir/dashboard');

		// if ($this->login_model->cek_session()) {
		$data['cart'] = null;

		$data['menu'] = $this->kasir_model->get_menu();
		if ($this->session->userdata('Cart') != null) {
			$cart_data = array_count_values($this->session->userdata('Cart'));
			$data['cart'] = $this->kasir_model->get_cart(array_keys($cart_data));
			$data['jumlah'] = $cart_data;
		}

		$this->load->view("kasir/dashboard", $data);
		// } else {
		// 	$this->load->view('login/login.php');
		// }
	}
	public function add_cart($menu)
	{
		$cart_data = array();
		if ($this->session->userdata('Cart') != null) {
			$cart_data = $this->session->userdata('Cart');
		}
		array_push($cart_data, $menu);
		$this->session->set_userdata('Cart', $cart_data);
		// if($this->session->set_userdata('Cart',$cart_data)){
		// 	redirect('kasir_controler');
		// }else{
		// }
		// $this->session->unset_userdata('Cart');
		redirect('kasir_controler');
	}
	public function delete_cart()
	{
		$this->session->unset_userdata('Cart');
		redirect('kasir_controler');
	}
	public function bayar()
	{
		// echo $this->session->/
		$tanggal_order = $this->input->post('tanggal_order');
		echo $tanggal_order;
		echo "halo";
		$cart_data = [];
		$data_nota = array(
			// 'tanggal' => date("Y/m/d"),
			'tanggal' => date('Y/m/d'),
			'no_nota' => '********'
		);

		if ($this->db->insert('nota', $data_nota)) {
			$id_nota = $this->db->insert_id();
			$cart_data = $this->session->userdata('Cart');

			for ($i = 0; $i < count($cart_data); $i++) {
				$data_cart[$i] = array(
					'id_nota' => $id_nota,
					'id_menu' => $cart_data[$i],
					'jumlah' => 1
				);
			}
			$status = $this->kasir_model->add_cart($data_cart);
		}
		if ($status) {
			// print_r($cart_data);
			// echo "<br>";
			// print_r($data_cart);
			// echo "<br>".count($cart_data);
			// // echo $cart_data[1];
			$this->session->unset_userdata('Cart');
			redirect('kasir_controler');
		}
	}
	public function nota_maker()
	{
		// $this->db->select('*');
		// $this->db->from('nota');


		$this->db->select('*');
		$this->db->from('nota');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(1);

		$tanggal_nota = $this->db->get();

		// mulai sini

		foreach ($tanggal_nota->result_array() as $data_tanggal_nota) {
			echo $tanggal = $data_tanggal_nota['tanggal'], "<br>";
		}
		$datetime = new DateTime($tanggal);
		$tanggl_loop = $datetime->format('Y-m-d');

		while ($tanggl_loop <= '2021-11-29') {
			$datetime->modify('+1 day');
			$tanggl_loop = $datetime->format('Y-m-d');
			echo $tanggl_loop . "/" . $datetime->format('D'), "<br>";
			if ($datetime->format('D') != "Mon") {
				$cart_data = array();
				// echo "LIBUR";
				for ($i = 0; $i < mt_rand(1, 9); $i++) {
					// echo mt_rand(23, 36);
					array_push($cart_data, mt_rand(23, 36));
				}
				$data_nota = array(
					// 'tanggal' => date("Y/m/d"),
					'tanggal' => $datetime->format('Y-m-d'),
					'no_nota' => '********'
				);

				if ($this->db->insert('nota', $data_nota)) {
					$id_nota = $this->db->insert_id();
					// $cart_data = $this->session->userdata('Cart');
					// print_r($cart_data);
					for ($i = 0; $i < count($cart_data); $i++) {
						$data_cart[$i] = array(
							'id_nota' => $id_nota,
							'id_menu' => $cart_data[$i],
							'jumlah' => 1
						);
					}
					$status = $this->kasir_model->add_cart($data_cart);
				}
				// print_r($cart_data);
				unset($cart_data);
			} else {
				echo "LIBUR";
			}
		}
		//kecuali MON
		// echo $datetime->format('Y-m-d');
		echo "SELESAI";
	}
}
