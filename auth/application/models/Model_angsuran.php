<?php


class Model_angsuran extends CI_Model {


  public function getData()
  {
      $NIP = $this->input->post('NIP');
      $this->db->select('*');
        $this->db->from('tb_angsuran');
        $this->db->join('tb_pinjaman', 'tb_pinjaman.NIP=tb_angsuran.NIP');
        $this->db->where('tb_angsuran.NIP', $NIP);
        $this->db->order_by('tb_angsuran.angsuran_ke', 'desc');
        $query = $this->db->get_where();
        return $query->result_array();
  }

  public function getHasil($NIP)
  {
      $this->db->select('*');
        $this->db->from('tb_angsuran');
        $this->db->join('tb_pinjaman', 'tb_pinjaman.NIP=tb_angsuran.NIP');
        $this->db->join('tb_anggota', 'tb_anggota.NIP=tb_angsuran.NIP');
        $this->db->where('tb_angsuran.NIP', $NIP);
        $this->db->order_by('tb_angsuran.angsuran_ke', 'desc');
        $query = $this->db->get_where();
        return $query->result_array();
  }

    public function save($parram)
    {
    $this->db->insert('tb_angsuran', $parram);
  }

  public function getPinjamanById($NIP)
  {
    return $this->db->get_where('tb_pinjaman', ['NIP' => $NIP])->row_array();
  }

}