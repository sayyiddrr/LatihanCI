<?php
class Mteman extends CI_Model
{

    public function saveData()
    {
        $dblokal = $this->load->database("default", TRUE);
        $input = array('id', 'nama', 'alamat', 'agama', 'tgl_lahir', 'hp');
        foreach ($input as $val)
			$$val = $this->input->post($val);

        $data = array('Nama'=>$nama, 
                        'Alamat'=>$alamat,
                        'Agama'=>$agama,
                        'TglLahir'=>$tgl_lahir,
                        'HP'=>$hp );
        if($id == ''){
            $data['ts'] = date('Y-m-d H:i:s');
            $dblokal->insert("teman", $data);
        }else{
            $dblokal->where(array('IDTeman'=>$id));
            $dblokal->update('teman', $data);
        }
        return;
    }

    public function deleteData()
    {
        $dblokal = $this->load->database("default", TRUE);
        
        $dblokal->where(array('IDTeman'=>$this->input->post('idTeman')));
        $dblokal->delete("teman");
        return;
    }

    public function loadData($id = '')
    {
        $dblokal = $this->load->database("default", TRUE);
        if($id<>'') $dblokal->where(array('IDTeman'=>$id));
        $q = $dblokal->get('teman');
        return $q;
    }

}
