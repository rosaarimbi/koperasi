<?php

class Simpanan Extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$title['title'] = "Halaman Simpanan";
		$data['data']= $this->Model_simpanan->getAllSimpanan();
		$data['sisa']= $this->Model_penarikan->sisaSaldo();
		$this->load->view('templates/header',$title);
		$this->load->view('simpanan/index', $data);
	}

}