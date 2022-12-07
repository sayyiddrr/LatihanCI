<?php
class Mmahasiswa extends CI_Model {

	public function loadData($d=NULL) {
		$dblokal = $this->load->database("default", TRUE);
		
		$wh = ""; 
		if(isset($d['prodi']) && $d['prodi'] <> '') $wh .= " and t_mahasiswa.IDProgdi = '$d[prodi]' ";
		if(isset($d['angkatan']) && $d['angkatan'] <> '') $wh .= " and mhs_ank = '$d[angkatan]' ";
		
		$kolom='';$sort='';
		/*
		if($this->input->post('iSortCol_0')  > 0 ){
			$kolom =  $this->input->post('mDataProp_'. $this->input->post('iSortCol_0') );
			$ascdesc = $this->input->post('sSortDir_0');
			$kolom = str_replace('nn_','',$kolom);
		}
		if($kolom<>''){
			$sort = "ORDER BY $kolom $ascdesc";
		}*/

		$limit = "";
		if (isset($d['iDisplayLength']) && $d['iDisplayLength'] > 0)
		{
		    $limit = "LIMIT $d[iDisplayStart], $d[iDisplayLength]";
		}
		$query = $dblokal->query( "
						SELECT mhs_nim, mhs_nm, mhs_ank, namastatus StatusAkademik, NamaProgdi
						FROM t_mahasiswa, t_progdi, t_status_akademik
						WHERE t_mahasiswa.IDProgdi = t_progdi.IDProgdi
							AND t_mahasiswa.stat_akd = t_status_akademik.id
						$wh
						$sort
						$limit
					" );
		return $query;
	}

	public function hitungLoadData($d=NULL) {
		$dblokal = $this->load->database("default", TRUE);
		
		$wh = ""; 

		if(isset($d['prodi']) && $d['prodi'] <> '') $wh .= " and IDProgdi = '$d[prodi]' ";
		if(isset($d['angkatan']) && $d['angkatan'] <> '') $wh .= " and mhs_ank = '$d[angkatan]' ";
		$query = $dblokal->query( "SELECT mhs_nim
								 FROM t_mahasiswa
								 WHERE mhs_nim <>''
						$wh
						

					" );
		return $query->num_rows();
	}
	
		
	function getProdi( ){    
        $dblokal  = $this->load->database("default", TRUE);
		
		$query = $dblokal->query("SELECT *
								 FROM t_progdi
								 WHERE IDProgdi >0
								 ORDER BY IDFakultas, IDProgdi
					");
                
		return $query->result();
                
	}
	
}
?>
