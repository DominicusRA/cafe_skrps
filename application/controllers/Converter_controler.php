<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Converter_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('converter_model');
		// $this->load->model('login_model');
    }
	public function index()
	{
		// $this->load->view('dashboard/dashboard');

		
		$data['data']=$this->converter_model->get();
		$this->load->view("converter/dashboard",$data);
	}
	public function insdex()
	{
		$filename="data produk-".date('Ymd').".xls";

		//header info for browser
		header("Content-Type: application/vnd-ms-excel"); 
		header('Content-Disposition: attachment; filename="' . $filename . '";');

		//menampilkan data sebagai array dari tabel produk
		$out=array();
		// $sql=mysql_query("SELECT * FROM produk");
		$this->db->select('nota.id_nota,nota.tanggal,menu_nota.jumlah,menu.nama');
		$this->db->from('menu_nota');
		$this->db->join('nota', 'nota.id_nota=menu_nota.id_nota');
		$this->db->join('menu', 'menu_nota.id_menu=menu.id_menu');
		$result=$this->db->get();
		// return $result;
		while($data=mysql_fetch_assoc($result)) $out[]=$data;

		$show_coloumn = false;
		foreach($out as $record) {
		if(!$show_coloumn) {
		//menampilkan nama kolom di baris pertama
		echo implode("\t", array_keys($record)) . "\n";
		$show_coloumn = true;
		}
		// looping data dari database
		echo implode("\t", array_values($record)) . "\n";
		} 
		exit;
	}
}
