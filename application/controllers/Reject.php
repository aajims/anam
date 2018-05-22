<?php
Class reject extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->helper('fungsidate');
        $this->load->model('model_reject');
        $this->load->library(array('template','pagination'));
    }
        
    function index(){
        $isi['judul']    = 'Data Reject Produksi';
        $isi['reject']     = $this->model_reject->tampilkan();
        $this->template->admin('reject/view_reject',$isi);
    }

    function view(){
        $isi['judul']    = 'Data Reject Produksi';
        $isi['reject']     = $this->model_reject->tampilkan();
        $this->template->admin('reject/view_rejects',$isi);
    }

    function search(){
        $keyword = $this->uri->segment(3);
        $data = $this->db->from('produksi')->like('no_wco',$keyword)->get();
        foreach($data->result() as $row)
        {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value'	=>$row->no_wco,
                'wco'	=>$row->no_wco,
                'tgl'   =>$row->tgl_produksi
            );
        }
        echo json_encode($arr);
    }

	function add(){
		$data['judul']	= 'Data Reject Produksi';
		$this->template->admin('reject/add_reject', $data);
	}

	function tambah(){
        $data = array(
            'no_wco'       => $this->input->post('wco'),
            'tgl_produksi'  => $this->input->post('tgl'),
            'jenis_reject'   => $this->input->post('jenis'),
            'qty'       =>  $this->input->post('qty')
        );
        $this->model_reject->tambah($data);
		$this->session->set_flashdata('success', 'Data Berhasil di Simpan');
		redirect('reject');
    }

	function edit($id){
		$data['judul']	=	'Edit Reject Produksi';
		$data['car']	= $this->model_reject->get($id);
		$this->template->admin('reject/edit_reject', $data);
	}
                
    function update(){
         $data = array(
             'no_wco'       => $this->input->post('wco'),
             'tgl_produksi'  => $this->input-post('tgl'),
             'jenis_reject'   => $this->input->post('jenis'),
             'qty'       =>  $this->input->post('qty')
		 );
       $this->model_reject->update(array('id_reject' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Data Berhasil di Update');
		redirect('reject');
    }
    
    function delete($id){
	$this->model_reject->delete_id($id);
	redirect('reject');
    }

    function laporan(){
        $data['judul']    = 'Laporan Reject';
        $this->template->admin('laporan/lap_reject',$data);
    }

    function aksi_laporan($from, $to){
        $dt['prod'] 	= $this->model_reject->laporan($from, $to);
        $dt['from']			= date('d F Y', strtotime($from));
        $dt['to']			= date('d F Y', strtotime($to));
        $this->load->view('laporan/laporan_reject', $dt);
    }

    function laporan_prod_pdf($from,$to){
        $this->load->library('cfpdf');
        $tgl = date('d F Y');
        $nama = $this->session->userdata('nama_lengkap');

        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',17);

        $pdf->Cell(0, 10, "Laporan Reject ", 20, 1, 'C');
        $pdf->Cell(0, 10, "Periode ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to)), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);

        $pdf->Cell(7, 7, 'No', 1, 0, 'L');
        $pdf->Cell(25, 7, 'Tgl Produksi', 1, 0, 'L');
        $pdf->Cell(40, 7, 'No WCO', 1, 0, 'L');
        $pdf->Cell(35, 7, 'Jenis Reject', 1, 0, 'L');
        $pdf->Cell(15, 7, 'Qty', 1, 0, 'L');

        $pdf->Ln();

        $transaksi 	= $this->model_reject->laporan_prod($from, $to);

        $no = 1;

        foreach($transaksi->result() as $p)
        {
            $pdf->Cell(7, 7, $no, 1, 0, 'L');
            $pdf->Cell(25, 7, date('d/m/Y', strtotime($p->tgl_produksi)), 1, 0, 'L');
            $pdf->Cell(40, 7, $p->no_wco, 1, 0, 'L');
            $pdf->Cell(35, 7, $p->jenis_reject, 1, 0, 'L');
            $pdf->Cell(15, 7, number_format($p->qty), 1, 0, 'L');

            $pdf->Ln();

            $no++;
        }

        $pdf->Ln();
        $pdf->Cell(0, 1, "Mengetahui,  ", 20, 1, 'C');

        $pdf->Cell(0, 2, "Tangerang,  ".date('d/m/Y', strtotime($tgl)), 0, 1, 'L');
        $pdf->Ln(19);
        $pdf->Cell(0, 1, "Kep Bagian ", 0, 1, 'C');
        $pdf->Cell(0, 1, "$nama ", 0, 1, 'L');
        ob_end_clean();
        $pdf->Output();
    }
}
