<?php
Class Customer extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_customer');
        $this->load->library(array('template','pagination'));
    }
        
    function index(){
        $isi['judul']    = 'Data Customer';
        $isi['customer']     = $this->model_customer->tampilkan();
        $this->template->admin('master/view_customer',$isi);
        
       }

	function add(){
		$data['judul']	= 'Add Data Customer';
		$this->template->admin('master/add_customer', $data);
	}

	function tambah(){
        $data = array(
            'nm_customer' => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'no_telp' => $this->input->post('telp'),
        );
        $this->model_customer->tambah($data);
		$this->session->set_flashdata('success', 'Data Berhasil di Simpan');
		redirect('customer');
    }

	function edit($id){
		$data['judul']	=	'Edit Data Customer';
		$data['car']	= $this->model_customer->get($id);
		$this->template->admin('master/edit_customer', $data);
	}
                
    function update(){
         $data = array(
             'nm_customer' => $this->input->post('nama'),
             'alamat'    => $this->input->post('alamat'),
             'no_telp' => $this->input->post('telp'),
		 );
       $this->model_customer->update(array('id_customer' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Data Berhasil di Update');
		redirect('customer');
    }
    
    function delete($id){
	$this->model_customer->delete_id($id);
	redirect('customer');
    }
}
