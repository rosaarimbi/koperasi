<?php

class Penarikan Extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$title['title'] = "Halaman Penarikan";
		$data['data']= $this->Model_penarikan->getData();
		$data['sisa']= $this->Model_penarikan->sisaSaldo();
		$this->load->view('templates/header',$title);
		$this->load->view('penarikan/index',$data);
	}

}