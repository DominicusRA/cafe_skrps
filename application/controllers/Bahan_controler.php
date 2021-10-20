<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan_controler extends CI_Controller {
	public function index()
	{
		$this->load->view('bahan_view');
	}
}
