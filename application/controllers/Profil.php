<?php
Class Profil extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model(array('model_user','model_profil'));
        $this->load->library(array('template','pagination','form_validation','upload'));
    }
        
    function index(){
        $isi['judul']    = 'Profil';
        $isi['profil']     = $this->model_profil->tampilkan();
        $this->template->admin('master/view_profil',$isi);
       }

    function edit($id){
		$data = $this->model_profil->get_id($id);
		echo json_encode($data);
	}


    function update(){
         if ($this->input->post('pass')) {           
            $data=array(
	            'password' => md5($this->input->post('pass')),
	            'nama' => $this->input->post('nama'),
	            'no_telp' => $this->input->post('telp'),
	            'username'=>  $this->input->post('user')
            );
			} else {
				 $data=array(
	            'nama' => $this->input->post('nama'),
	            'no_telp' => $this->input->post('telp'),
                'username'=>  $this->input->post('user')
              );
		}
            $this->model_profil->update(array('id_user' => $this->input->post('id_user')), $data);
			echo json_encode(array("status" => TRUE));    
    }

    
    function delete($id){
	$this->model_unit->delete_id($id);
	echo json_encode(array("status" => TRUE));
    }
}
