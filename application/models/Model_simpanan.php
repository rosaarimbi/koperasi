<?php


class Model_simpanan extends CI_Model {

	public function getAllSimpanan ()
	{
        $this->db->select('*');
        $this->db->from('tb_simpanan');
        $this->db->join('tb_detail_simpanan', 'tb_detail_simpanan.id_simpanan=tb_simpanan.id_simpanan');
        $this->db->join('tb_jenis_simpanan', 'tb_jenis_simpanan.id_jenis_simpanan=tb_detail_simpanan.id_jenis_simpanan');
        $NIP = $this->session->userdata('NIP');
        $this->db->where('tb_simpanan.NIP', $NIP);
        $this->db->group_by('tb_detail_simpanan.id_simpanan,tb_detail_simpanan.id_jenis_simpanan');
        $query = $this->db->get_where();
        return $query->result_array();
	}

        public function sisaSaldo()
          {
            $this->db->select('SUM(jml_simpanan) as tot');
            $this->db->from('tb_detail_simpanan');
            $NIP = $this->session->userdata('NIP');
            $this->db->where('tb_detail_simpanan.NIP', $NIP);    
            $this->db->group_by('tb_detail_simpanan.id_jenis_simpanan');
            return $this->db->get()->row()->tot;
          }

}