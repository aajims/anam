<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_operator extends CI_Model {

	var $table = 'operator';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_opr()
	{
		return $this->db->get($this->table);
	}

    function buatkode()   {
        $this->db->select('RIGHT(operator.nik,4) as kode', FALSE);
        $this->db->order_by('nik','DESC');
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
        $kodejadi = $today.$kodemax;
        return $kodejadi;
    }
			
    function tampilkan(){
       $this->db->from($this->table);
       $query=$this->db->get();
       return $query->result();
    }

    function get($id){
		$this->db->from($this->table);
		$this->db->where('id_operator',$id);
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
		$this->db->where('id_operator', $id);
		$this->db->delete($this->table);
	}

}
