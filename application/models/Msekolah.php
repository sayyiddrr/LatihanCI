<?php
class Msekolah extends CI_Model
{

    public function saveData()
    {
        $dblokal = $this->load->database("default", TRUE);
        $input = array('id', 'namasekolah', 'alamat', 'notelp');
        foreach ($input as $val)
			$$val = $this->input->post($val);

        $data = array('NamaSekolah'=>$namasekolah, 
                        'Alamat'=>$alamat,
                        'NoTelp'=>$notelp);
        if($id == ''){
            $data['ti'] = date('Y-m-d H:i:s');
            $dblokal->insert("sekolah", $data);
        }else{
            $dblokal->where(array('IDSekolah'=>$id));
            $dblokal->update('sekolah', $data);
        }
        return;
    }

    public function deleteData()
    {
        $dblokal = $this->load->database("default", TRUE);
        
        $dblokal->where(array('IDSekolah'=>$this->input->post('idSekolah')));
        $dblokal->delete("sekolah");
        return;
    }

    public function loadData($id = '')
    {
        $dblokal = $this->load->database("default", TRUE);
        if($id<>'') $dblokal->where(array('IDSekolah'=>$id));
        $q = $dblokal->get('sekolah');
        return $q;
    }

}
