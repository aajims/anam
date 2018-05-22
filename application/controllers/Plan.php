<?php
Class Plan extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_plan');
        $this->load->library(array('template','pagination'));
    }
        
    function index(){
        $isi['judul']    = 'Data Produksi';
        $isi['plan']     = $this->model_plan->tampilkan();
        $this->template->admin('produksi/view_plan',$isi);
     }

    function view(){
        $isi['judul'] = 'Data Produksi';
        $isi['plan'] = $this->model_plan->tampilkan();
        $this->template->admin('produksi/view_planning', $isi);
    }

     function add(){
		$data['judul']	= 'Data Produksi';
        $data['kodeunik'] = $this->model_plan->buat_kode();
		$this->template->admin('produksi/add_plan', $data);
	}

	function tambah(){
        $data = array(
            'no_wco'       => $this->input->post('wco'),
            'no_dies'   => $this->input->post('dies'),
            'no_produk' => $this->input->post('prod'),
            'qty'       =>  $this->input->post('qty')
        );
        $this->model_plan->tambah($data);
		$this->session->set_flashdata('success', 'Data Berhasil di Simpan');
		redirect('plan');
    }

	function edit($id){
		$data['judul']	=	'Edit Plan Produksi';
		$data['car']	= $this->model_plan->get($id);
		$this->template->admin('produksi/edit_plan', $data);
	}
                
    function update(){
         $data = array(
             'no_wco'       => $this->input->post('wco'),
             'no_dies'   => $this->input->post('dies'),
             'no_produk' => $this->input->post('prod'),
             'qty'       =>  $this->input->post('qty')
		 );
       $this->model_plan->update(array('id_plan' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Data Berhasil di Update');
		redirect('plan');
    }
    
    function delete($id){
	$this->model_plan->delete_id($id);
	redirect('plan');
    }

    function laporan(){
        $data['judul']    = 'Laporan Plan';
        $this->template->admin('laporan/lap_plan',$data);
    }

    function aksi_laporan($from, $to){
        $dt['prod'] 	= $this->model_plan->laporan($from, $to);
        $dt['from']			= date('d F Y', strtotime($from));
        $dt['to']			= date('d F Y', strtotime($to));
        $this->load->view('laporan/laporan_plan', $dt);
    }

    function laporan_prod($from,$to){
        $this->load->library('cfpdf');
        $tgl = date('d F Y');
        $nama = $this->session->userdata('nama_lengkap');

        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',17);

        $pdf->Cell(0, 10, "Laporan Plan ", 20, 1, 'C');
        $pdf->Cell(0, 10, "Periode ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to)), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);

        $pdf->Cell(7, 7, 'No', 1, 0, 'L');
        $pdf->Cell(25, 7, 'Tgl Produksi', 1, 0, 'L');
        $pdf->Cell(25, 7, 'No WCO', 1, 0, 'L');
        $pdf->Cell(25, 7, 'No Dies', 1, 0, 'L');
        $pdf->Cell(25, 7, 'No Produk', 1, 0, 'L');
        $pdf->Cell(15, 7, 'Qty', 1, 0, 'L');
        $pdf->Cell(25, 7, 'No Mesin', 1, 0, 'L');
        $pdf->Cell(25, 7, 'Nama Operator', 1, 0, 'L');
        $pdf->Cell(15, 7, 'Target', 1, 0, 'L');
        $pdf->Cell(15, 7, 'Jam', 1, 0, 'L');
        $pdf->Cell(15, 7, 'Downtime', 1, 0, 'L');
        $pdf->Cell(15, 7, 'Jam pakai', 1, 0, 'L');
        $pdf->Ln();

        $transaksi 	= $this->model_plan->laporan_prod($from, $to);

        $no = 1;

        foreach($transaksi->result() as $p)
        {
            $pdf->Cell(7, 7, $no, 1, 0, 'L');
            $pdf->Cell(25, 7, date('d/m/Y', strtotime($p->tgl_produksi)), 1, 0, 'L');
            $pdf->Cell(25, 7, $p->no_wco, 1, 0, 'L');
            $pdf->Cell(25, 7, $p->no_dies, 1, 0, 'L');
            $pdf->Cell(25, 7, $p->no_produk, 1, 0, 'L');
            $pdf->Cell(15, 7, number_format($p->qty), 1, 0, 'L');
            $pdf->Cell(15, 7, $p->no_mesin, 1, 0, 'L');
            $pdf->Cell(25, 7, $p->nm_operator, 1, 0, 'L');
            $pdf->Cell(15, 7, number_format($p->target), 1, 0, 'L');
            $pdf->Cell(15, 7, number_format($p->jam), 1, 0, 'L');
            $pdf->Cell(15, 7, number_format($p->downtime), 1, 0, 'L');
            $pdf->Cell(15, 7, number_format($p->jam_pakai), 1, 0, 'L');
            $pdf->Ln();

            $no++;
        }

        $pdf->Ln();
        $pdf->Cell(0, 1, "Mengetahui,  ", 20, 1, 'R');

        $pdf->Cell(0, 2, "Tangerang,  ".date('d/m/Y', strtotime($tgl)), 0, 1, 'L');
        $pdf->Ln(19);
        $pdf->Cell(0, 1, "PD Manager ", 0, 1, 'R');
        $pdf->Cell(0, 1, "$nama ", 0, 1, 'L');

        $pdf->Output();
    }
}
