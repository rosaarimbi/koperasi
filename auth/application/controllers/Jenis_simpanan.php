<?php

class Jenis_simpanan Extends CI_Controller{
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
		$title['title'] = "Halaman Data Jenis Simpanan";
		$data['data']= $this->Model_jenis->getAllJenis();
		$this->load->view('templates/header',$title);
		$this->load->view('jenis_simpanan/index', $data);
	}

	public function tambah()
	{	
		$title['title'] = "Tambah Data Jenis Simpanan";
		$this->form_validation->set_rules('nama_jenis_simpanan', 'Nama Jenis Simpanan', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$title);
			$this->load->view('jenis_simpanan/tambah');
		} else {
			$this->Model_jenis->tambahDataJenis();
			redirect('Jenis_simpanan');
		}
	}

	public function ubah($id)
	{
		$title['title'] = "Ubah Data Jenis Simpanan";
		$data['data']= $this->Model_jenis->getJenisByID($id);
		$this->form_validation->set_rules('nama_jenis_simpanan', 'Nama Jenis Simpanan', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$title);
			$this->load->view('jenis_simpanan/ubah', $data);
		} else {
			
			$this->Model_jenis->ubahDataJenis();
			redirect('Jenis_simpanan');
		}
	}

	public function hapus($id)
	{
		$this->Model_jenis->hapusDataJenis($id);
		redirect('Jenis_simpanan');
	}

	function getJumlah(){
        $id_jenis_simpanan=$this->input->post('id_jenis_simpanan');
        $jenis_simpanan=$this->Model_jenis->getJenisByID($id_jenis_simpanan);

        echo json_encode($jenis_simpanan);
    }

}