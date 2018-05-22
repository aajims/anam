<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	var $table = 'user';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_user()
	{
		return $this->db->get('user');
	}
			
    function tampilkan(){
       $this->db->from('user');
       $query=$this->db->get();
       return $query->result();
    }
	
	function tampilkeun(){
      $username=$_SESSION['nama_lengkap'];	
       $query=$this->db->query("SELECT * FROM user WHERE nama = '$username'");
        return $query->result();
    }
	
    function get($id){
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
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
		$this->db->where('id_user', $id);
		$this->db->delete($this->table);
	}

}
