<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_plan extends CI_Model {

	var $table = 'plan';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_user()
	{
		return $this->db->get($this->table);
	}

    function buat_kode()   {
        $this->db->select('RIGHT(plan.no_wco,4) as kode', FALSE);
        $this->db->order_by('no_wco','DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->table);
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else{
            $kode = 1;
        }
        $today = date("Ym");
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "REQ-".$today.$kodemax;
        return $kodejadi;
    }

    function tampilkan(){
       $this->db->from($this->table);
       $query=$this->db->get();
       return $query->result();
    }

    function get($id){
		$this->db->from($this->table);
		$this->db->where('id_plan',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
    function tambah($data){
        $this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
    
    function update($where, $data){
       $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

    public function delete_id($id)	{
		$this->db->where('id_plan', $id);
		$this->db->delete($this->table);
	}

    function laporan($from, $to){
        $this->db->SELECT('*');
        $this->db->WHERE('tgl_produksi BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
        $this->db->JOIN('mesin', 'mesin.id_mesin=produksi.id_mesin', 'LEFT');
        $this->db->JOIN('operator', 'operator.id_operator=produksi.id_operator', 'LEFT');
        return $this->db->GET($this->table);
    }

    function laporan_prod($from, $to){
        $this->db->SELECT('*');
        $this->db->WHERE('tgl_produksi BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
        $this->db->JOIN('mesin', 'mesin.id_mesin=produksi.id_mesin', 'LEFT');
        $this->db->JOIN('operator', 'operator.id_operator=produksi.id_operator', 'LEFT');
        return $this->db->GET($this->table);
    }

}
