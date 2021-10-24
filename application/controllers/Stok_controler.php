<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_controler extends CI_Controller {
	public function index()
	{
		$this->load->view('stok_view');
	}
}
