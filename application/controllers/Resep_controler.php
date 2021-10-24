<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep_controler extends CI_Controller {
	public function index()
	{
		$this->load->view('resep_view');
	}
}
