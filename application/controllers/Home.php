<?php

class Home Extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$title['title'] = "Halaman Utama";
		$data['data']= $this->Model_anggota->getAnggota();
		$this->load->view('templates/header',$title);
		$this->load->view('home/index', $data);
	}

}