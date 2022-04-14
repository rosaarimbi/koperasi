<?php

class User Extends CI_Controller{
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
		$title['title'] = "Halaman Data User";
		$data['data']= $this->Model_user->getAllUser();
		$this->load->view('templates/header',$title);
		$this->load->view('user/index', $data);
	}

	public function tambah()
	{	
		$this->Model_user->tambahDataUser();
		redirect('User');
	}

	public function ubah($id_user)
	{
		$title['title'] = "Ubah Data User";
		$data['data']= $this->Model_user->getUserByID($id_user);
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required|numeric|min_length[12]|max_length[13]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$title);
			$this->load->view('user/ubah', $data);
		} else {
			
			$this->Model_user->ubahDataUser();
			redirect('User');
		}
	}

	public function hapus($id_user)
	{
		$this->Model_user->hapusDataUser($id_user);
		redirect('User');
	}

}