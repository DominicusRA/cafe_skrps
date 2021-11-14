<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_controler extends CI_Controller {
	public function index()
	{
		$this->load->view('kasir/dashboard');
	}
}
