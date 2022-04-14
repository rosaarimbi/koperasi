<?php 

class Model_Anggota extends CI_Model{	
public function getAnggota ()
	{
		$this->db->select('*');
		$this->db->from('tb_anggota');
        $username = $this->session->userdata('NIP');
        $this->db->where('NIP', $username);
		$query = $this->db->get_where();
		return $query->row_array();
	}
}