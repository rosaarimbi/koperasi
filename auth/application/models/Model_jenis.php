<?php


class Model_jenis extends CI_Model {

	public function getAllJenis ()
	{
	return $query = $this->db->get('tb_jenis_simpanan')->result_array();
	}

	public function tambahDataJenis()
	{
		$data = array(
		"nama_jenis_simpanan" => $this->input->post('nama_jenis_simpanan', true)
);
		$this->db->insert('tb_jenis_simpanan', $data);
	}

	public function getJenisId($id)
  {
    return $this->db->get_where('tb_jenis_simpanan', ['id_jenis_simpanan' => $id])->row();
  }

	public function getJenisByID($id)
	{
		return $this->db->get_where('tb_jenis_simpanan', ['id_jenis_simpanan' => $id])->row_array();
	}

	public function ubahDataJenis()
	{
		$data = [
		"nama_jenis_simpanan" => $this->input->post('nama_jenis_simpanan', true)
		];
		
		$this->db->where('id_jenis_simpanan', $this->input->post('id_jenis_simpanan'));
		$this->db->update('tb_jenis_simpanan', $data);
	}

	public function hapusDataJenis($id)
	{
		$this->db->where('id_jenis_simpanan', $id);
		$this->db->delete('tb_jenis_simpanan');
	}

	public function getUserAdmin ()
	{
		$this->db->select('*');
		$this->db->from('tb_admin');
        $username = $this->session->userdata('username');
        $this->db->where('username', $username);
		$query = $this->db->get_where();
		return $query->row_array();
	}

}