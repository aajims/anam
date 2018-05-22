<?php
Class User extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_user');
        $this->load->library(array('template','pagination'));
    }
        
    function index(){
        $isi['judul']    = 'Data User';
        $isi['user']     = $this->model_user->tampilkan();
        $this->template->admin('master/view_user',$isi);
        
       }

	function add(){
		$data['judul']	= 'Add Data User';
		$this->template->admin('master/add_user', $data);
	}

	function tambah(){
        $data = array(            
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('pass')),
            'nama' => $this->input->post('nama'),
            'no_telp' => $this->input->post('telp'),
            'level'=>  $this->input->post('level'),
        );
        $this->model_user->tambah($data);
		$this->session->set_flashdata('success', 'Data Berhasil di Simpan');
		redirect('user');
    }

	function edit($id){
		$data['judul']	=	'Edit Data User';
		$data['car']	= $this->model_user->get($id);
		$this->template->admin('master/edit_user', $data);
	}
                
    function update(){
         if ($this->input->post('pass')) { 
         $data = array(
			 'username' => $this->input->post('username'),
			 'password' => md5($this->input->post('pass')),
			 'nama' => $this->input->post('nama'),
			 'no_telp' => $this->input->post('telp'),
			 'level'=>  $this->input->post('level'),
		 );
        } else {
            $data = array(
                'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'no_telp' => $this->input->post('telp'),
				'level'=>  $this->input->post('level'),
			);
        }	
       $this->model_user->update(array('id_user' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Data Berhasil di Update');
		redirect('user');
    }
    
    function delete($id){
	$this->model_user->delete_id($id);
	redirect('user');
    }
}
