<?php


class Model_pinjaman extends CI_Model {

	public function getAllPinjaman ()
	{
		    $this->db->select('*');
        $this->db->from('tb_pinjaman');
        $this->db->join('tb_user','tb_user.id_user=tb_pinjaman.id_user');
        $this->db->join('tb_anggota','tb_anggota.NIP=tb_pinjaman.NIP');
        $this->db->order_by('tb_pinjaman.tgl_pinjaman','DESC');
        $query = $this->db->get();
        return $query->result_array();
	}

  public function cariDataPinjaman()
  { 
    $tgl1 = $this->input->get('tgl1', true);  
    $tgl2 = $this->input->get('tgl2', true);
    //$cari = $this->input->get('cari', true);
    $this->db->select('*');
    $this->db->from('tb_pinjaman');
    $this->db->join('tb_user','tb_user.id_user=tb_pinjaman.id_user');
    $this->db->join('tb_anggota','tb_anggota.NIP=tb_pinjaman.NIP');
    $this->db->where("tb_pinjaman.tgl_pinjaman between ('$tgl1') AND ('$tgl2')");
    //$this->db->where('tb_pinjaman.NIP', $cari);
    //$this->db->or_like('tb_pinjaman.tgl_pinjaman', $cari);
    $this->db->order_by('tb_pinjaman.tgl_pinjaman', 'DESC');
    $this->db->group_by('tb_pinjaman.NIP');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function jumlahPinjamanByTgl()
  {
    $tgl1 = $this->input->get('tgl1', true);  
    $tgl2 = $this->input->get('tgl2', true);
    //$cari = $this->input->get('cari', true);
    $this->db->select('SUM(total) as tot');
    $this->db->from('tb_pinjaman');
    $this->db->join('tb_anggota','tb_anggota.NIP=tb_pinjaman.NIP');
    $this->db->where("tb_pinjaman.tgl_pinjaman between ('$tgl1') AND ('$tgl2')");
    //$this->db->where('tb_pinjaman.NIP', $cari);
    return $this->db->get()->row()->tot;
  }

  public function jumlahPinjaman()
  {
    $this->db->select('SUM(total) as tot');
    $this->db->from('tb_pinjaman');
    return $this->db->get()->row()->tot;
  }

	public function tambahDataPinjaman()
	{
		date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
		$data = array(
		"id_user" => $this->input->post('id_user', true),
		"NIP" => $this->input->post('NIP', true),
        "tgl_pinjaman" => $now,
        "jml_pinjaman" => $this->input->post('jml_pinjaman', true),
        "jangka" => $this->input->post('jangka', true),
        "angsuran" => $this->input->post('angsuran', true),
        "total" => $this->input->post('total', true)
);
		$this->db->insert('tb_pinjaman', $data);
	}

    public function ubahDataPinjaman()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $data = [
        "id_user" => $this->input->post('id_user', true),
        "NIP" => $this->input->post('NIP', true),
        "tgl_pinjaman" => $now,
        "jml_pinjaman" => $this->input->post('jml_pinjaman', true),
        "jangka" => $this->input->post('jangka', true),
        "angsuran" => $this->input->post('angsuran', true),
        "total" => $this->input->post('total', true)
];
        $this->db->where('NIP', $this->input->post('NIP'));
        $this->db->update('tb_pinjaman', $data);
    }

	public function getPinjamanByID($NIP)
	{
		return $this->db->get_where('tb_pinjaman', ['NIP' => $NIP])->row_array();
	}

	public function ubahDataAnggota()
	{
		$data = [
		"NIP" => $this->input->post('NIP', true),
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

}