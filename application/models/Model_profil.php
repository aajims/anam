<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_profil extends CI_Model {

	var $table = 'user';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_admin()
	{
		return $this->db->get($this->table);
	}
			
    function tampilkan(){
      $username=$_SESSION['username'];
       $query=$this->db->query("SELECT * FROM user WHERE username = '$username'");
        return $query->result();
    }

    function get_id($id){
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
		$query = $this->db->get();
		return $query->row();
	}

    function cek($kode){
        $this->db->where('id_user',$kode);
        $query=$this->db->get($this->table);        
        return $query;
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
