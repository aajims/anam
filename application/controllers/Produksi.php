<?php
Class Produksi extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->helper('fungsidate');
        $this->load->model(array('model_produksi', 'model_mesin', 'model_operator'));
        $this->load->library(array('template','pagination', 'html2pdf'));
    }
        
    function index(){
        $isi['judul']    = 'Data Produksi';
        $isi['produksi']     = $this->model_produksi->tampilkan();
        $this->template->admin('produksi/view_produksi',$isi);
        
       }

    function views(){
        $data['judul']    = 'Data Produksi';
        $data['produk']     = $this->model_produksi->tampilkan();
        $this->template->admin('produksi/view_produksii',$data);

    }

    function search(){
        $keyword = $this->uri->segment(3);
        $data = $this->db->from('plan')->like('no_wco',$keyword)->get();
        foreach($data->result() as $row)
        {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value'	=>$row->no_wco,
                'dies'	=>$row->no_dies,
                'produk'	=>$row->no_produk,
                'qty'	=>$row->qty
            );
        }
        echo json_encode($arr);
    }

    function search_mesin(){
        $keyword = $this->uri->segment(3);
        $data = $this->db->from('mesin')->like('no_mesin',$keyword)->get();
        foreach($data->result() as $row)
        {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value'	=>$row->no_mesin,
                'mesin' => $row->id_mesin,
                'kapasitas'	=>$row->kapasitas
            );
        }
        echo json_encode($arr);
    }

    function get_kapasitas(){
        $id = $_GET['id'];
        $result = $this->model_mesin->get_kapasitas($id);
        if($result != null)
        {
            $data = array(
                'kapasitas' => $result->kapasitas
            );
            echo json_encode($data);
        }
    }

    function add(){
		$data['judul']	= 'Data Produksi';
		$data['mesin']  = $this->model_mesin->tampilkan();
        $data['operator']  = $this->model_operator->tampilkan();
		$this->template->admin('produksi/add_produksi', $data);
	}

	function tambah(){
        $data = array(
            'no_wco'    => $this->input->post('wco'),
            'no_dies'   => $this->input->post('dies'),
            'no_produk' => $this->input->post('prod'),
            'qty'       =>  $this->input->post('qty'),
            'id_mesin'  => $this->input->post('id_mesin'),
            'kapasitas'  => $this->input->post('kapasitas'),
            'id_operator'=>  $this->input->post('opr'),
            'target'     =>  $this->input->post('target'),
            'waktu'        =>  $this->input->post('jam'),
            'downtime'   =>  $this->input->post('time'),
            'waktu_pakai'  =>  $this->input->post('pakai'),
            'qty_hasil'  =>  $this->input->post('hasil'),
            'efektifitas'  =>  $this->input->post('efek'),
            'efesiensi'  =>  $this->input->post('efesien'),
            'tgl_produksi'=>  date('Y-m-d')
        );
        $this->model_produksi->tambah($data);
		$this->session->set_flashdata('success', 'Data Berhasil di Simpan');
		redirect('produksi');
    }

	function edit($id){
		$data['judul']	=	'Edit Produksi';
        $data['mesin']  = $this->model_mesin->tampilkan();
        $data['operator']  = $this->model_operator->tampilkan();
		$data['raw']	= $this->model_produksi->get($id);
		$this->template->admin('produksi/edit_produksi', $data);
	}

    function view($id){
        $data['judul']	=	'View Produksi';
        $data['mesin']  = $this->model_mesin->tampilkan();
        $data['operator']  = $this->model_operator->tampilkan();
        $data['raw']	= $this->model_produksi->get($id);
        $this->template->admin('produksi/v_produksi', $data);
    }
                
    function update(){
         $data = array(
             'no_wco'    => $this->input->post('wco'),
             'no_dies'   => $this->input->post('dies'),
             'no_produk' => $this->input->post('prod'),
             'qty'       =>  $this->input->post('qty'),
             'id_mesin'  => $this->input->post('mesin'),
             'id_operator'=>  $this->input->post('opr'),
             'target'     =>  $this->input->post('target'),
             'waktu'        =>  $this->input->post('jam'),
             'downtime'   =>  $this->input->post('time'),
             'waktu_pakai'  =>  $this->input->post('pakai'),
             'qty_hasil'  =>  $this->input->post('hasil'),
             'efektifitas'  =>  $this->input->post('efek'),
             'efesiensi'  =>  $this->input->post('efesien'),
             'tgl_produksi'=>  date('Y-m-d')
		 );
       $this->model_produksi->update(array('id_produksi' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Data Berhasil di Update');
		redirect('produksi');
    }
    
    function delete($id){
	$this->model_produksi->delete_id($id);
	redirect('produksi');
    }

    function laporan(){
        $data['judul']    = 'Laporan Produksi';
        $this->template->admin('laporan/lap_produksi',$data);
    }

    function aksi_laporan($from, $to){
        $dt['prod'] 	= $this->model_produksi->laporan($from, $to);
        $dt['from']			= date('d F Y', strtotime($from));
        $dt['to']			= date('d F Y', strtotime($to));
        $this->load->view('laporan/laporan_produksi', $dt);
    }

    function laporan_pdf_prod($from,$to){
        $this->load->library('cfpdf');
        $tgl = date('d F Y');
        $nama = $this->session->userdata('nama_lengkap');

        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',17);

        $pdf->Cell(0, 10, "Laporan Produksi ", 20, 1, 'C');
        $pdf->Cell(0, 10, "Periode ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to)), 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);

        $pdf->Cell(7, 7, 'No', 1, 0, 'L');
        $pdf->Cell(25, 7, 'Tgl Produksi', 1, 0, 'L');
        $pdf->Cell(35, 7, 'No WCO', 1, 0, 'L');
        $pdf->Cell(30, 7, 'No Dies', 1, 0, 'L');
        $pdf->Cell(20, 7, 'No Produk', 1, 0, 'L');
        $pdf->Cell(15, 7, 'Qty', 1, 0, 'L');
        $pdf->Cell(20, 7, 'No Mesin', 1, 0, 'L');
        $pdf->Cell(30, 7, 'Nama Operator', 1, 0, 'L');
        $pdf->Cell(15, 7, 'Target', 1, 0, 'L');
        $pdf->Cell(20, 7, 'Waktu(Menit)', 1, 0, 'L');
        $pdf->Cell(20, 7, 'Wkt pakai', 1, 0, 'L');
        $pdf->Cell(20, 7, 'Efektif(%)', 1, 0, 'L');
        $pdf->Cell(20, 7, 'Efesien(%)', 1, 0, 'L');
        $pdf->Ln();

        $transaksi 	= $this->model_produksi->laporan_prod($from, $to);

        $no = 1;

        foreach($transaksi->result() as $p)
        {
            $pdf->Cell(7, 7, $no, 1, 0, 'L');
            $pdf->Cell(25, 7, date('d/m/Y', strtotime($p->tgl_produksi)), 1, 0, 'L');
            $pdf->Cell(35, 7, $p->no_wco, 1, 0, 'L');
            $pdf->Cell(30, 7, $p->no_dies, 1, 0, 'L');
            $pdf->Cell(20, 7, $p->no_produk, 1, 0, 'L');
            $pdf->Cell(15, 7, number_format($p->qty), 1, 0, 'L');
            $pdf->Cell(20, 7, $p->no_mesin, 1, 0, 'L');
            $pdf->Cell(30, 7, $p->nm_operator, 1, 0, 'L');
            $pdf->Cell(15, 7, number_format($p->target), 1, 0, 'L');
            $pdf->Cell(20, 7, $p->waktu, 1, 0, 'L');
            $pdf->Cell(20, 7, number_format($p->waktu_pakai), 1, 0, 'L');
            $pdf->Cell(20, 7, number_format($p->efektifitas), 1, 0, 'L');
            $pdf->Cell(20, 7, number_format($p->efesiensi), 1, 0, 'L');
            $pdf->Ln();

            $no++;
        }

        $pdf->Ln();
        $pdf->Cell(0, 1, "Mengetahui,  ", 20, 1, 'R');

        $pdf->Cell(0, 2, "Tangerang,  ".date('d/m/Y', strtotime($tgl)), 0, 1, 'L');
        $pdf->Ln(19);
        $pdf->Cell(0, 1, "Kep Bagian ", 0, 1, 'R');
        $pdf->Cell(0, 1, "$nama ", 0, 1, 'L');
        ob_end_clean();
        $pdf->Output();
    }

//    function laporan_pdf_prod($from,$to){
//        $this->load->library('html2pdf');
//        $this->html2pdf->filename('laporan.pdf');
//        $this->html2pdf->paper('a4', 'portrait');
//        $data['from']		= date('d F Y', strtotime($from));
//        $data['to']			= date('d F Y', strtotime($to));
//        $data['prod']   = $this->model_produksi->laporan($from,$to);
//        $this->html2pdf->html($this->load->view('laporan/produksi_pdf', $data, true));
//
//        if($this->html2pdf->create('save')) {
//            //PDF was successfully saved or downloaded
//            echo 'PDF saved';
//        }
//    }
}
