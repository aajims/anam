<?php
Class Kategori extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_kategori');
        $this->load->library(array('template','pagination'));
    }
        
    function index(){
        $isi['judul']    = 'Data Category';
        $isi['kategori']     = $this->model_kategori->tampilkan();
        $this->template->admin('master/view_kategorii',$isi);
     }

	function add(){
		$data['judul']	= 'Add Category';
		$this->template->admin('master/add_kategori', $data);
	}
       
    function tambah(){
        $data = array(
			'nm_kategori' => $this->input->post('nama'),
			'desk' => $this->input->post('desk')
        );
        $this->model_kategori->tambah($data);
		$this->session->set_flashdata('success', 'Transaksi Berhasil di Simpan');
		redirect('kategori');
    }
    
    function edit($id){
		$data['judul']	=	'Edit Data Category';
		$data['car']	= $this->model_kategori->get($id);
		$this->template->admin('master/edit_kategori', $data);
	}
                
    function update(){
            $data = array(
				'nm_kategori' => $this->input->post('nama'),
				'desk' => $this->input->post('desk')
			);

       $this->model_kategori->update(array('id_kat' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Transaksi Berhasil di Update');
		redirect('kategori');
    }
    
    function delete($id){
	$this->model_kategori->delete_id($id);
	redirect('kategori');
    }
}
