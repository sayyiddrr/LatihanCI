<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	public function index()
	{
		$this->load->model('msekolah');
		$this->load->helper('url');
		$data['halaman'] = "f-sekolah";
		$this->load->view('template-sbadmin2', $data);
	}

	public function SaveData(){
		$this->load->model('msekolah');
		$input = array('id', 'namasekolah', 'alamat', 'notelp');
		foreach ($input as $val)
			$$val = $this->input->post($val);

		$status = "ERROR";
		$pesan = ""; $hasil="";

		if($namasekolah == "" || $alamat == '' || $notelp == ''){
			$pesan = "Terdapat kesalahan:\n";
			if($namasekolah == ""){
				$pesan .= "=> Nama Sekolah harus diisi\n";
			}

			if($alamat == ""){
				$pesan .= "=> Alamat Sekolah harus diisi\n";
			}

			if($notelp == ""){
				$pesan .= "=> No Telp harus diisi";
			}
		}else{
			$status = 'OK';
			$this->msekolah->saveData();

			//ambil data 
			$hasil = $this->load->view("f-list-sekolah", array(), TRUE);
		}

		echo json_encode(
				array(
						'status'=>$status,
						'pesan'=>$pesan,
						'hasil'=>$hasil
					)
		);
	}

	public function DeleteData(){
		$this->load->model('msekolah');

		$status = 'OK';
		$this->msekolah->deleteData();

		//ambil data 
		$hasil = $this->load->view("f-list-sekolah", array(), TRUE);

		echo json_encode(
				array(
						'status'=>$status,
						'hasil'=>$hasil
					)
		);
	}

	public function GetData(){
		$this->load->model('msekolah');

		$id = $this->input->post('idSekolah');
		$hasil = $this->msekolah->loadData($id);

		echo json_encode(
				array(
						'status'=>'OK',
						'hasil'=>$hasil->result()
					)
		);
	}

	public function lama()
	{
		$this->load->view('f-teman-old');
	}
}
