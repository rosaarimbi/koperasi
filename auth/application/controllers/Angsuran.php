<?php

class Angsuran Extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("Login"));
		}
	}

	public function index()
	{
		$title['title'] = "Halaman Data Angsuran";
		$data['anggota']= $this->Model_anggota->getAllAnggota();
        //$data['kode']= $this->Model_angsuran->kode();
		$this->load->view('templates/header',$title);
		$this->load->view('angsuran/index',$data);
	}

    public function hasil($NIP)
    {
        $title['title'] = "Halaman Data Angsuran";
        $data['data']= $this->Model_angsuran->getHasil($NIP);
        $this->load->view('templates/header',$title);
        $this->load->view('angsuran/hasil',$data);
    }

	public function cari(){ //Fungsi untuk menampilkan

    	$angsuran = $this->Model_angsuran->getData();
        $output = '';
        $no = 0;
        foreach ($angsuran as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$items['NIP'].'</td>
                    <td>Rp. '.number_format($items['jml_angsuran']).'</td>
                    <td>'.date('d F Y',strtotime($items['tgl_angsuran'])).'</td>
                    <td>'.$items['angsuran_ke'].'</td>
                    <td>Rp. '.number_format($items['sisa']).'</td>
                </tr>
            ';
        }
        echo json_encode($output);
    }

    function getAngsuran(){
        $pinjaman=$this->input->post('NIP');
        $angsuran=$this->Model_angsuran->getPinjamanById($pinjaman);

        echo json_encode($angsuran);
    }

    //function getAngsuranKe(){
      //  $pinjaman=$this->input->post('NIP');
     //   $angsuran=$this->Model_angsuran->kode($pinjaman);

       // echo json_encode($angsuran);
//    }

    public function angsuran(){
        //untuk fungsi bayar
        $angsuran=$this->Model_angsuran->getPinjamanById($this->input->post('NIP'));
        $data = $this->Model_user->getUser();
        $NIP = $this->input->post('NIP');
        $jml_angsuran = $this->input->post('jml_angsuran');
        $angsuran_ke = $this->input->post('angsuran_ke');
        $sisa = $angsuran['total'] - $jml_angsuran;
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $sql = $this->db->query("SELECT angsuran_ke FROM tb_angsuran where NIP='$NIP' and angsuran_ke='$angsuran_ke'");
        $cek_nip = $sql->num_rows();
        if ($cek_nip > 0) {
            $this->session->set_flashdata('data', 'Anda sudah menginputkan Angsuran tersebut, mohon dicek kembali');
            redirect('Angsuran');
        } else{
            $parram = array(
            'NIP' => $NIP,
            'id_user' => $data['id_user'],
            'tgl_angsuran' => $now,
            'jml_angsuran' => $jml_angsuran,
            'angsuran_ke' => $angsuran_ke,
            'sisa' => $sisa
            );

            $this->Model_angsuran->save($parram);

            $sql = "UPDATE `tb_pinjaman` SET `total`=`total`-".$jml_angsuran." WHERE `NIP` = '".$NIP."';";
            $query = $this->db->query($sql);

            $this->session->set_flashdata('message', 'Angsuran Anda Berhasil');
            redirect('Angsuran/hasil/'.$NIP);
        }
    }

}
