<?php

class Laporan Extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("Login"));
		}
	}

	public function anggota()
	{
		$title['title'] = "Halaman Laporan Anggota";
		$data['data']= $this->Model_anggota->getAllAnggota();
		$this->load->view('templates/header',$title);
		$this->load->view('laporan/anggota', $data);
	}

	public function cetak_anggota()
	{
		$data['data']= $this->Model_anggota->getAllAnggota();
		$this->load->view('laporan/cetak_anggota', $data);
	}

	public function simpanan()
	{
		$title['title'] = "Halaman Laporan Simpanan";
		$data['data']= $this->Model_simpanan->getLaporanSimpanan();	
		$data['jenis']= $this->Model_jenis->getAllJenis();
		
		if (!empty($this->input->get('tgl1')) && !empty($this->input->get('tgl2')) && !empty($this->input->get('nama_jenis_simpanan'))){
			$data['data'] = $this->Model_simpanan->cariDataSimpanan(array(
				'tgl1' => $this->input->get('tgl1'),
				'tgl2' => $this->input->get('tgl2'),
				'nama_jenis_simpanan' => $this->input->get('nama_jenis_simpanan'),
				'id_admin' => $this->input->get('id_admin')
			));
			$data['jumlah'] = $this->Model_simpanan->jumlahSimpananByTgl(array(
				'tgl1' => $this->input->get('tgl1'),
				'tgl2' => $this->input->get('tgl2'),
				'nama_jenis_simpanan' => $this->input->get('nama_jenis_simpanan'),
				'id_admin' => $this->input->get('id_admin')
			));
		}else {
			$data['jumlah'] = $this->Model_simpanan->jumlahSimpanan();
		}
		$this->load->view('templates/header',$title);
		$this->load->view('laporan/simpanan', $data);
	}

	public function cetak_simpanan()
	{
		$data['data']= $this->Model_simpanan->getAllSimpanan();		
		if (!empty($this->input->get('tgl1')) && !empty($this->input->get('tgl2')) && !empty($this->input->get('nama_jenis_simpanan'))){
			$data['data'] = $this->Model_simpanan->cariDataSimpanan(array(
				'tgl1' => $this->input->get('tgl1'),
				'tgl2' => $this->input->get('tgl2'),
				'nama_jenis_simpanan' => $this->input->get('nama_jenis_simpanan'),
				'id_admin' => $this->input->get('id_admin')
			));
			$data['jumlah'] = $this->Model_simpanan->jumlahSimpananByTgl(array(
				'tgl1' => $this->input->get('tgl1'),
				'tgl2' => $this->input->get('tgl2'),
				'nama_jenis_simpanan' => $this->input->get('nama_jenis_simpanan'),
				'id_admin' => $this->input->get('id_admin')
			));
		}else {
			$data['jumlah'] = $this->Model_simpanan->jumlahSimpanan();
		}
		$this->load->view('laporan/cetak_simpanan', $data);
	}

	public function pinjaman()
	{
		$title['title'] = "Halaman Laporan Pinjaman";
		$data['data']= $this->Model_pinjaman->getAllPinjaman();		
		if (!empty($this->input->get('tgl1')) && !empty($this->input->get('tgl2')))
		 //&& !empty($this->input->get('cari')))
		{
			$data['data'] = $this->Model_pinjaman->cariDataPinjaman(array(
			    'tgl1' => $this->input->get('tgl1'),
				'tgl2' => $this->input->get('tgl2')
				//'cari' => $this->input->get('cari')
			));
			$data['jumlah'] = $this->Model_pinjaman->jumlahPinjamanByTgl(array(
			    'tgl1' => $this->input->get('tgl1'),
				'tgl2' => $this->input->get('tgl2')
				//'cari' => $this->input->get('cari')
			));
		}else {
			$data['jumlah'] = $this->Model_pinjaman->jumlahPinjaman();
		}
		$this->load->view('templates/header',$title);
		$this->load->view('laporan/pinjaman', $data);
	}

	public function cetak_pinjaman()
	{
		$data['data']= $this->Model_pinjaman->getAllPinjaman();		
		if (!empty($this->input->get('tgl1')) 
			&& !empty($this->input->get('tgl2')))
			//&& !empty($this->input->get('cari')))
		{
			$data['data'] = $this->Model_pinjaman->cariDataPinjaman(array(
			    'tgl1' => $this->input->get('tgl1'),
				'tgl2' => $this->input->get('tgl2')
				//'cari' => $this->input->get('cari')
			));
			$data['jumlah'] = $this->Model_pinjaman->jumlahPinjamanByTgl(array(
			    'tgl1' => $this->input->get('tgl1'),
				'tgl2' => $this->input->get('tgl2')
				//'cari' => $this->input->get('cari')
			));
		}else {
			$data['jumlah'] = $this->Model_pinjaman->jumlahPinjaman();
		}
		$this->load->view('laporan/cetak_pinjaman', $data);
	}

}