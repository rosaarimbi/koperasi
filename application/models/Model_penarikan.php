<?php


class Model_penarikan extends CI_Model {


  public function getData()
  {
      $this->db->select('tanggal_tarik,nama_jenis_simpanan,jml_tarik,jml_simpanan,total');
        $this->db->from('tb_penarikan');
        $this->db->join('tb_simpanan', 'tb_simpanan.NIP=tb_penarikan.NIP');
        $this->db->join('tb_detail_simpanan', 'tb_detail_simpanan.id_simpanan=tb_simpanan.id_simpanan');
        $this->db->join('tb_jenis_simpanan', 'tb_jenis_simpanan.id_jenis_simpanan=tb_penarikan.id_jenis_simpanan');
        $NIP = $this->session->userdata('NIP');
        $this->db->where('tb_penarikan.NIP', $NIP);
        $this->db->order_by('tb_penarikan.tanggal_tarik', 'desc');
        $this->db->group_by('tb_penarikan.tanggal_tarik,tb_penarikan.id_jenis_simpanan,tb_penarikan.jml_tarik');
        
        $query = $this->db->get_where();
        return $query->result_array();
  }



  public function sisaSaldo()
  {
    $this->db->select('SUM(total) as tot');
    $this->db->from('tb_simpanan');
    $NIP = $this->session->userdata('NIP');
    $this->db->where('tb_simpanan.NIP', $NIP);
    return $this->db->get()->row()->tot;
  }

}