<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep_controler extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('resep_model');
		$this->load->model('login_model');
    }
	public function index()
	{
		if($this->login_model->cek_session()){
			$data['bahan']=$this->resep_model->get_bahan();
            $data['menu']=$this->resep_model->get_menu();
			$data['last_code']=$this->resep_model->get_code();
            $this->load->view("resep/dashboard",$data);
        }else{
            $this->load->view('login/login');
        }
	}
	public function add(){
		$data=[];
		if($this->login_model->cek_session()){
			$data=array(
				'nama' => $this->input->post('menu'),
				'kode_menu' => $this->input->post('kode_menu')
			);
			$data_resep=array(
				'id_bahan' => $this->input->post('select_bahan'),
				'takaran' => $this->input->post('jumlah')
			);
			$status=$this->resep_model->add_menu($data,$data_resep);
			if($status){
				redirect('resep_controler');
			}else{
				echo '<script>alert("Penambahan Bahan Gagal !!!")</script>';
				redirect('resep_controler');
			}
		}else{
			$this->load->view('login_view');
		}
	}
	public function delete($menu){
		$data=array(
			'id_menu' => $menu
		);
		$status=$this->resep_model->delete_menu($data);
		if($status==true){
			redirect('resep_controler');
		}else{
			echo "gagal";
		}
	}
	// public function get_satuan(){
	// 	$data = array(
    //         'id_bahan'=>$this->input->post('select_bahan')
	// 	);
	// 	$status = $this->resep_model->get_satuan($data);
	// 	echo $status;
    //     // $nim = $this->input->post('nim_lama');
    //     // $this->db->where('nim', $nim);
    //     // $this->db->update('mahasiswa',$data);
	// }
}
