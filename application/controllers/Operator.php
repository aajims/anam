<?php
Class Operator extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_operator');
        $this->load->library(array('template','pagination'));
    }
        
    function index(){
        $isi['judul']    = 'Data Operator';
        $isi['operator']     = $this->model_operator->tampilkan();
        $this->template->admin('master/view_operator',$isi);
        
       }

	function add(){
		$data['judul']	    = 'Add Data Operator';
		$data['kodeunik']   = $this->model_operator->buatkode();
		$this->template->admin('master/add_operator', $data);
	}

	function tambah(){
        $data = array(
            'nik' => $this->input->post('nik'),
            'nm_operator' => $this->input->post('nama'),
            'no_telp' => $this->input->post('telp'),
            'bagian'=>  $this->input->post('bag'),
        );
        $this->model_operator->tambah($data);
		$this->session->set_flashdata('success', 'Data Berhasil di Simpan');
		redirect('operator');
    }

	function edit($id){
		$data['judul']	=	'Edit Data Operator';
		$data['car']	= $this->model_operator->get($id);
		$this->template->admin('master/edit_operator', $data);
	}
                
    function update(){
         $data = array(
             'nik' => $this->input->post('nik'),
             'nm_operator' => $this->input->post('nama'),
             'no_telp' => $this->input->post('telp'),
             'bagian'=>  $this->input->post('bag'),
		 );
       $this->model_operator->update(array('id_operator' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Data Berhasil di Update');
		redirect('operator');
    }
    
    function delete($id){
	$this->model_operator->delete_id($id);
	redirect('operator');
    }
}
