<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('kasir_model');
		$this->load->model('login_model');
    }
	public function index()
	{
		// $this->load->view('kasir/dashboard');

		if($this->login_model->cek_session()){

            $data['menu']=$this->kasir_model->get_menu();
            $this->load->view("kasir/dashboard",$data);

        }else{
            $this->load->view('login/login.php');
        }
	}
	public function add_cart($menu){
		$cart_data = array();
		if($this->session->userdata('Cart')!=null){
			$cart_data = $this->session->userdata('Cart');
		}
		array_push($cart_data,$menu);
		// $this->session->set_userdata('Cart',$cart_data);
		if($this->session->set_userdata('Cart',$cart_data)){
			redirect('kasir_controler');
		}else{
			redirect('kasir_controler');
		}
		// $this->session->unset_userdata('Cart');
	}
	public function delete_cart(){
		$this->session->unset_userdata('Cart');
		redirect('kasir_controler');
	}
	public function bayar(){
		// echo $this->session->/
		$cart_data=[];
		$data_nota=array(
			'tanggal' => date("Y/m/d"),
			'no_nota' => '********'
		);
		
		if($this->db->insert('nota',$data_nota)){
			$id_nota = $this->db->insert_id();
			$cart_data = $this->session->userdata('Cart');

			for ($i = 0; $i < count($cart_data); $i++) {
				$data_cart[$i]=array(
					'id_nota' => $id_nota,
					'id_menu' => $cart_data[$i]
				);
			}
			$status=$this->kasir_model->add_cart($data_cart);
		}
		if($status){
			// print_r($cart_data);
			// echo "<br>";
			// print_r($data_cart);
			// echo "<br>".count($cart_data);
			// // echo $cart_data[1];
			$this->session->unset_userdata('Cart');
			redirect('kasir_controler');

		}
	}
}
