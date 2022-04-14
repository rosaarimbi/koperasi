<?php

class Home Extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("Login"));
		}
	}

	public function index()
	{
		$title['title'] = "Halaman Utama";
		$data['data']= $this->Model_anggota->hitungJumlahAnggota();
		$this->load->view('templates/header',$title);
		$this->load->view('home/index',$data);
	}

}