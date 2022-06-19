<?php
defined('BASEPATH') or exit('No direct script access allowed');
// ob_start();

class Login_controler extends CI_Controller
{
	public function __construct()
	{
		// Index::index();
		// parent::__construct();
		// session_start();
		// $this->load->library('form_validation');
		$this->load->model('login_model');

		// if ($this->session->userdata('akses') == "admin") {
		// 	redirect('dashboard_controler');
		// } elseif ($this->session->userdata('akses') == "kasir") {
		// 	redirect('kasir_controler');
		// };
	}
	public function index()
	{
		if ($this->session->userdata('akses') == "admin") {
			redirect('dashboard_controler');
		} elseif ($this->session->userdata('akses') == "kasir") {
			redirect('kasir_controler');
		} else {
			$this->load->view('login/login');
		};


		// $status = $this->login_model->cek_session();
		// if ($status) {
		// 	redirect("dashboard_controler");
		// } else {
		// 	$this->load->view('login/login');
		// }
	}
	public function cek_log()
	{
		// $username = $this->input->post("username", TRUE);
		// $password = $this->input->post("password", TRUE);
		// $password = md5($password);
		// $username = md5($username);
		$password = md5($this->input->post("password", TRUE));
		$username = md5($this->input->post("username", TRUE));

		// $status = $this->login_model->cek_login(array('username'=>$username),array('password'=>$password));
		$status = $this->login_model->cek_login_v2(array('username' => $username), array('password' => $password));
		if ($status != FALSE) {
			foreach ($status as $apps) {
				$session_data = array(
					'nama' => $apps->nama,
					'akses' => $apps->akses
				);
				$this->session->set_userdata($session_data);
			}
			echo $this->session->userdata('akses');
			if ($this->session->userdata('akses') == "admin") {
				redirect("dashboard_controler");
			} else if ($this->session->userdata('akses') == "kasir") {
				redirect("kasir_controler");
			}
		} else {
			$this->index();
		}
	}

	// public function write($id, $data): bool
	// {
	// 	return file_put_contents("$this->savePath/sess_$id", $data) === false ? false : true;
	// }

	public function log_out()
	{
		$this->session->sess_destroy();
		redirect("login_controler");
	}
	public function register()
	{
		$data['akses'] = $this->login_model->get_akses();
		$this->load->view('login/register', $data);
	}
	public function registeradd()
	{
		// $username = $this->input->post("username", TRUE);
		// $password = $this->input->post("password", TRUE);
		$password = md5($this->input->post("password", TRUE));
		$username = md5($this->input->post("username", TRUE));
		$akses = $this->input->post("akses", TRUE);

		// $this->login_model->add($username,$password);

		$this->login_model->add_v2($username, $password, $akses);
		redirect('login_controler');
	}
}
