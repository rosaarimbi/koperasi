<?php


class Model_simpanan extends CI_Model {

	public function getAllSimpanan ()
	{
		    $this->db->select('*');
        $this->db->from('tb_simpanan');
        $this->db->join('tb_detail_simpanan', 'tb_detail_simpanan.id_simpanan=tb_simpanan.id_simpanan');
        $this->db->join('tb_jenis_simpanan', 'tb_jenis_simpanan.id_jenis_simpanan=tb_detail_simpanan.id_jenis_simpanan');
        $this->db->join('tb_anggota','tb_anggota.NIP=tb_simpanan.NIP');
        $this->db->join('tb_user','tb_user.id_user=tb_simpanan.id_user');
        $this->db->group_by('tb_simpanan.id_simpanan');
        $this->db->order_by('tb_simpanan.tgl_simpan','DESC');
        $query = $this->db->get();
        return $query->result_array();
	}

  public function kode(){
        $this->db->select('RIGHT(tb_simpanan.id_simpanan,2) as id_simpanan', FALSE);
        $this->db->order_by('id_simpanan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_simpanan');  //cek dulu apakah ada sudah ada kode di tabel.
          if($query->num_rows() <> 0){
               //cek kode jika telah tersedia
               $data = $query->row();
               $kode = intval($data->id_simpanan) + 1;
          }
          else{
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              //$tgl=date('dmY');
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
              //$kodetampil = "K"."".$tgl.$batas;  //format kode
              $kodetampil = "S"."".$batas;
              return $kodetampil;
    }

  public function getLaporanSimpanan ()
  {
        $this->db->select('*');
        $this->db->from('tb_simpanan');
        $this->db->join('tb_detail_simpanan', 'tb_detail_simpanan.id_simpanan=tb_simpanan.id_simpanan');
        $this->db->join('tb_jenis_simpanan', 'tb_jenis_simpanan.id_jenis_simpanan=tb_detail_simpanan.id_jenis_simpanan');
        $this->db->join('tb_anggota','tb_anggota.NIP=tb_simpanan.NIP');
        $this->db->join('tb_user','tb_user.id_user=tb_simpanan.id_user');
        $this->db->group_by('tb_detail_simpanan.NIP,tb_detail_simpanan.id_jenis_simpanan');
        $this->db->order_by('tb_simpanan.tgl_simpan','DESC');
        $query = $this->db->get();
        return $query->result_array();
  }

  public function cariDataSimpanan() //query mencari data dilaporan
  {
    $tgl1 = $this->input->get('tgl1', true);
    $tgl2 = $this->input->get('tgl2', true);
    $nama_jenis_simpanan = $this->input->get('nama_jenis_simpanan', true);
    $this->db->select('*');
    $this->db->from('tb_simpanan');
    $this->db->join('tb_detail_simpanan', 'tb_detail_simpanan.id_simpanan=tb_simpanan.id_simpanan');
    $this->db->join('tb_jenis_simpanan', 'tb_jenis_simpanan.id_jenis_simpanan=tb_detail_simpanan.id_jenis_simpanan');
    $this->db->join('tb_user','tb_user.id_user=tb_simpanan.id_user');
    $this->db->join('tb_anggota','tb_anggota.NIP=tb_simpanan.NIP');
    $this->db->where("tb_simpanan.tgl_simpan between ('$tgl1') AND ('$tgl2')");
    $this->db->where('tb_jenis_simpanan.nama_jenis_simpanan',$nama_jenis_simpanan);
    $this->db->order_by('tb_simpanan.tgl_simpan', 'DESC');
    $this->db->group_by('tb_detail_simpanan.NIP,tb_detail_simpanan.id_jenis_simpanan');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function jumlahSimpananByTgl() //query jumlah dilaporan simpanan
  {
    $tgl1 = $this->input->get('tgl1', true);
    $tgl2 = $this->input->get('tgl2', true);
    $nama_jenis_simpanan = $this->input->get('nama_jenis_simpanan', true);
    $this->db->select('SUM(jml_simpanan) as tot');
    $this->db->from('tb_simpanan');
    $this->db->join('tb_detail_simpanan', 'tb_detail_simpanan.NIP=tb_simpanan.id_simpanan');
    $this->db->join('tb_jenis_simpanan', 'tb_jenis_simpanan.id_jenis_simpanan=tb_detail_simpanan.id_jenis_simpanan');
    $this->db->where("tb_simpanan.tgl_simpan between ('$tgl1') AND ('$tgl2')");
    $this->db->where('tb_jenis_simpanan.nama_jenis_simpanan',$nama_jenis_simpanan);
    return $this->db->get()->row()->tot;
  }

  public function jumlahSimpanan()
  {
    $this->db->select('SUM(jml_simpanan) as tot');
    $this->db->from('tb_detail_simpanan');
    return $this->db->get()->row()->tot;
  }

  public function jumlahSimpananNIP($id_simpanan)
  {
    $this->db->select('SUM(jml_simpanan) as tot');
    $this->db->from('tb_detail_simpanan');
    $this->db->where('tb_detail_simpanan.id_simpanan', $id_simpanan);
    $this->db->group_by('tb_detail_simpanan.id_simpanan');
    return $this->db->get()->row()->tot;
  }

  public function getSimpanan($id_simpanan) //memanggil id simpanan
  {
    $this->db->select('*');
        $this->db->from('tb_simpanan');
        $this->db->join('tb_detail_simpanan', 'tb_detail_simpanan.id_simpanan=tb_simpanan.id_simpanan');
        $this->db->join('tb_jenis_simpanan', 'tb_jenis_simpanan.id_jenis_simpanan=tb_detail_simpanan.id_jenis_simpanan');
        $this->db->where('tb_detail_simpanan.id_simpanan', $id_simpanan);
        $this->db->group_by('tb_detail_simpanan.id_simpanan,tb_detail_simpanan.id_jenis_simpanan');
        $query = $this->db->get_where();
        return $query->result_array();
  }

  public function getSimpananByID($id_simpanan)
  {
    $this->db->select('*');
        $this->db->from('tb_simpanan');
        $this->db->join('tb_detail_simpanan', 'tb_detail_simpanan.id_simpanan=tb_simpanan.id_simpanan');
        $this->db->join('tb_jenis_simpanan', 'tb_jenis_simpanan.id_jenis_simpanan=tb_detail_simpanan.id_jenis_simpanan');
				$this->db->join('tb_anggota','tb_anggota.NIP=tb_simpanan.NIP');
        $this->db->where('tb_detail_simpanan.id_simpanan', $id_simpanan);
        $this->db->group_by('tb_detail_simpanan.id_simpanan,tb_detail_simpanan.id_jenis_simpanan');
        $query = $this->db->get_where();
        return $query->row_array();
  }

    public function save($parram)
    {
    $this->db->insert('tb_simpanan', $parram);
    }

  public function save_detail($data)
    {
    $this->db->insert_batch('tb_detail_simpanan',$data);
    }

  public function hapusDataSimpanan($id_simpanan)
  {
    $this->db->where('id_simpanan', $id_simpanan);
    $this->db->delete('tb_simpanan');
  }

}
