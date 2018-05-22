<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produksi extends CI_Model {

	var $table = 'produksi';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_prod()
	{
		return $this->db->get($this->table);
	}
			
    function tampilkan(){
       $this->db->from($this->table);
       $query=$this->db->get();
       return $query->result();
    }

    function get($id){
		$this->db->FROM($this->table);
		$this->db->JOIN('mesin', 'mesin.id_mesin=produksi.id_mesin', 'LEFT');
        $this->db->JOIN('operator', 'operator.id_operator=produksi.id_operator', 'LEFT');
		$this->db->where('id_produksi',$id);
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
		$this->db->where('id_produksi', $id);
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
