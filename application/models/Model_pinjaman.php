<?php


class Model_pinjaman extends CI_Model {

	public function getAllPinjaman ()
	{
        $this->db->select('*');
        $this->db->from('tb_angsuran');
        $this->db->join('tb_pinjaman', 'tb_pinjaman.NIP=tb_angsuran.NIP');
        $NIP = $this->session->userdata('NIP');
        $this->db->where('tb_angsuran.NIP', $NIP);
        $this->db->order_by('tb_angsuran.angsuran_ke', 'desc');
        $query = $this->db->get();
        return $query->result_array();
	}
}