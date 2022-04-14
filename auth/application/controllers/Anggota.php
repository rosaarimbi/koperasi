<?php

class Anggota Extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("Login"));
		}
	}

	public function index()
	{
		$title['title'] = "Halaman Data Anggota";
		$data['data']= $this->Model_anggota->getAllAnggota();
		$this->load->view('templates/header',$title);
		$this->load->view('anggota/index', $data);
	}

	public function tambah()
	{	
		$title['title'] = "Tambah Data Anggota";
		$this->form_validation->set_rules('NIP', 'NIP', 'required|numeric|min_length[13]|max_length[17]');
		$this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required|numeric|min_length[10]|max_length[14]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$title);
			$this->load->view('anggota/tambah');
		} else {
			$this->Model_anggota->tambahDataAnggota();
			redirect('Anggota');
		}
	}

	public function ubah($NIP)
	{
		$title['title'] = "Ubah Data Anggota";
		$data['data']= $this->Model_anggota->getAnggotaByID($NIP);
		$this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]');
		$this->form_validation->set_rules('no_telp', 'No Telepon ', 'required|numeric|min_length[10]|max_length[14]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$title);
			$this->load->view('anggota/ubah', $data);
		} else {
			
			$this->Model_anggota->ubahDataAnggota();
			redirect('Anggota');
		}
	}

	public function hapus($NIP)
	{
		$this->Model_anggota->hapusDataAnggota($NIP);
		redirect('Anggota');
	}

	    function getAnggota(){
        $NIP=$this->input->post('NIP');
        $anggota=$this->Model_anggota->getAnggotaByID($NIP);

        echo json_encode($anggota);
    }

}