<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mmahasiswa');
	}

	public function index(){
		
		$this->load->helper('url');
        $data['halaman'] = "f-mahasiswa";
        $data['getProdi'] = $this->mmahasiswa->getProdi();
        $data['content_id'] = "f-mahasiswa";
		
		$this->load->view("f-template-sbadmin2", $data);
	}

	public function loadData(){
		$items = array();

		$filter = array();
		$filter['iDisplayStart']	= $this->input->post('iDisplayStart');
		$filter['iDisplayLength']	= $this->input->post('iDisplayLength');

		$filter['iSortCol']	= $this->input->post('mDataProp_'. $this->input->post('iSortCol_0') );
		$filter['sSortDir']	= $this->input->post('sSortDir_0');

		$filter['prodi']				= $this->input->post('prodi');
		$filter['angkatan']					= $this->input->post('angkatan');

		$result["iTotalRecords"] = $this->mmahasiswa->hitungLoadData($filter);

		$qr=$this->mmahasiswa->loadData($filter );
		$result["iTotalDisplayRecords"] = $result["iTotalRecords"];
		$no=1;
		foreach ($qr->result() as $row) {
			
			$row->no = $no + $this->input->post('iDisplayStart');
			
			array_push($items, $row);
			$no++;
		}
		$result["aaData"] = $items;
		echo json_encode($result);
	}

}
