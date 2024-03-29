<?php
defined('BASEPATH') or exit('No direct script access allowed');
// ob_start();

class Login_controler extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index()
	{
		if ($this->session->userdata('akses') == "admin") {
			redirect('dashboard_controler');
		} elseif ($this->session->userdata('akses') == "kasir") {
			redirect('kasir_controler');
		} elseif ($this->session->userdata('akses') == "master") {
			redirect('dashboard_controler');
		} else {
			$this->load->view('login/login');
		};
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
			// echo $this->session->userdata('akses');
			if ($this->session->userdata('akses') == "admin") {
				redirect("dashboard_controler");
			} elseif ($this->session->userdata('akses') == "master") {
				redirect('dashboard_controler');
			} else if ($this->session->userdata('akses') == "kasir") {
				redirect("kasir_controler");
			}
		} else {
			$this->index();
		}
	}
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
