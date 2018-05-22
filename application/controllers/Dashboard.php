<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
     function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
		$this->load->model(array('model_operator', 'model_mesin', 'model_customer', 'model_produksi'));
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('template','pagination'));
        
    }

	function index(){
		$data['judul']    	= 'Dashboard';
		$data['opr']		= $this->model_operator->tampil_opr()->num_rows();
		$data['mesin']		= $this->model_mesin->tampil_mesin()->num_rows();
		$data['cust']		= $this->model_customer->tampil_cust()->num_rows();
		$data['prod']	    = $this->model_produksi->tampil_prod()->num_rows();
        $this->template->admin('dashboard',$data);
	}
}
