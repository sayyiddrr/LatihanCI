<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teman extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$data['halaman'] = "f-teman";
		$this->load->view('f-template-sbadmin2', $data);
	}

	public function lama()
	{
		$this->load->view('f-teman-old');
	}
}
