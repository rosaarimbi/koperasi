<?php

class Pinjaman Extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$title['title'] = "Halaman Pinjaman";
		$data['data']= $this->Model_pinjaman->getAllPinjaman();
		$this->load->view('templates/header',$title);
		$this->load->view('pinjaman/index', $data);
	}

}