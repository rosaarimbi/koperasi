<?php


class Model_anggota extends CI_Model {

	public function getAllAnggota ()
	{
	return $query = $this->db->get('tb_anggota')->result_array();
	}

	public function tambahDataAnggota()
	{
		$data = array(
		"NIP" => $this->input->post('NIP', true),
		"nama_anggota" => $this->input->post('nama_anggota', true),
        "username" => $this->input->post('username', true),
        "password" => $this->input->post('password', true),
        "no_telp" => $this->input->post('no_telp', true),
        "jabatan" => $this->input->post('jabatan', true),
        "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
        "alamat" => $this->input->post('alamat', true)
);
		$this->db->insert('tb_anggota', $data);
	}

	public function getAnggotaByID($NIP)
	{
		return $this->db->get_where('tb_anggota', ['NIP' => $NIP])->row_array();
	}

	public function ubahDataAnggota()
	{
		$data = [
		"nama_anggota" => $this->input->post('nama_anggota', true),
        "username" => $this->input->post('username', true),
        "password" => $this->input->post('password', true),
        "no_telp" => $this->input->post('no_telp', true),
        "jabatan" => $this->input->post('jabatan', true),
        "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
        "alamat" => $this->input->post('alamat', true)

		];
		
		$this->db->where('NIP', $this->input->post('NIP'));
		$this->db->update('tb_anggota', $data);
	}

	public function hapusDataAnggota($NIP)
	{
		$this->db->where('NIP', $NIP);
		$this->db->delete('tb_anggota');
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

	public function hitungJumlahAnggota()
{   
    $query = $this->db->get('tb_anggota');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

}