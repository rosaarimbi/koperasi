<?php

class Pinjaman Extends CI_Controller{
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
		$title['title'] = "Halaman Data Pinjaman";
		$data['data']= $this->Model_pinjaman->getAllPinjaman();
		$this->load->view('templates/header',$title);
		$this->load->view('pinjaman/index', $data);
	}

	public function tambah()
	{	
		$title['title'] = "Tambah Data Pinjaman";
		$data['user']= $this->Model_user->getUser();
		$data['anggota']= $this->Model_anggota->getAllAnggota();
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$nip = $this->input->post('NIP');
		$jumlah = $this->input->post('jml_pinjaman');
		$total = $this->input->post('total');
		$sql = $this->db->query("SELECT total FROM tb_pinjaman where NIP='$nip' and total >='$total'");
		$cek_nip = $sql->num_rows();
		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$title);
			$this->load->view('pinjaman/tambah', $data);
		} else if ( $cek_nip > 0) {
			$this->session->set_flashdata('message', 'Anda masih mempunyai pinjaman di Koperasi Karya Husada');
			redirect('Pinjaman/tambah');

		} else if ( $jumlah < 3000000) {
			$this->session->set_flashdata('kurang', 'Pinjaman anda kurang dari nominal yang ditentukan');
			redirect('Pinjaman/tambah');

		} else {
			$this->Model_pinjaman->tambahDataPinjaman();
			redirect('Pinjaman');
		}
	}

	function getBunga(){
        $jumlah=$this->input->post('jml_pinjaman');       
        $pinjaman = $jumlah * 1.25;
        echo json_encode($pinjaman);
    }
	
}