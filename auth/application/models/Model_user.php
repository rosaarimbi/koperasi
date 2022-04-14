<?php


class Model_user extends CI_Model {

	public function getAllUser ()
	{
	return $query = $this->db->get('tb_user')->result_array();
	}

	public function tambahDataUser()
	{
		$data = array(
		"nama_user" => $this->input->post('nama_user', true),
        "username" => $this->input->post('username', true),
        "password" => $this->input->post('password', true),
        "no_telp" => $this->input->post('no_telp', true),
        "email" => $this->input->post('email', true),
        "level" => $this->input->post('level', true)
);
		$this->db->insert('tb_user', $data);
	}

	public function getUserById($id_user)
	{
		return $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
	}

	public function ubahDataUser()
	{
		$data = [
		"nama_user" => $this->input->post('nama_user', true),
        "username" => $this->input->post('username', true),
        "password" => $this->input->post('password', true),
        "no_telp" => $this->input->post('no_telp', true),
        "email" => $this->input->post('email', true),
        "level" => $this->input->post('level', true)

		];
		
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('tb_user', $data);
	}

	public function hapusDataUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('tb_user');
	}

	public function getUser ()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
        $username = $this->session->userdata('ses_nama');
        $this->db->where('username', $username);
		$query = $this->db->get_where();
		return $query->row_array();
	}

}