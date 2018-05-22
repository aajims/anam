<?php
Class Mesin extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_mesin');
        $this->load->library(array('template','pagination'));
    }
        
    function index(){
        $isi['judul']    = 'Data Mesin';
        $isi['mesin']     = $this->model_mesin->tampilkan();
        $this->template->admin('master/view_mesin',$isi);
        
       }

	function add(){
		$data['judul']	= 'Data Mesin';
		$this->template->admin('master/add_mesin', $data);
	}

	function tambah(){
        $data = array(
            'no_mesin' => $this->input->post('no'),
            'kapasitas' => $this->input->post('kap'),
            'jenis_mesin' => $this->input->post('jenis'),
            'line'=>  $this->input->post('line'),
        );
        $this->model_mesin->tambah($data);
		$this->session->set_flashdata('success', 'Data Berhasil di Simpan');
		redirect('mesin');
    }

	function edit($id){
		$data['judul']	=	'Edit Mesin';
		$data['car']	= $this->model_mesin->get($id);
		$this->template->admin('master/edit_mesin', $data);
	}
                
    function update(){
         $data = array(
             'no_mesin' => $this->input->post('no'),
             'kapasitas' => $this->input->post('kap'),
             'jenis_mesin' => $this->input->post('jenis'),
             'line'=>  $this->input->post('line'),
		 );
       $this->model_mesin->update(array('id_mesin' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Data Berhasil di Update');
		redirect('mesin');
    }
    
    function delete($id){
	$this->model_mesin->delete_id($id);
	redirect('mesin');
    }
}
