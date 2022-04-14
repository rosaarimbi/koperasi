<?php

class Login Extends CI_Controller{

	public function index()
	{
		$this->load->view('login/index');
	}

	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$admin = $this->Model_login->cek_login_admin('tb_user',$where)->row_array();
		if($admin > 0){ //jika login sebagai admin
                 if($admin['level']=='bendahara'){ //Akses admin
                    $this->session->set_userdata('akses','bendahara');
                    $this->session->set_userdata('ses_nama',$admin['username']);

                    $this->session->set_userdata('masuk',TRUE);

                    redirect('home');
 
                 }else if ($admin['level']=='ketua') {
                    $this->session->set_userdata('akses','ketua');
                    $this->session->set_userdata('ses_nama',$admin['username']);

                    $this->session->set_userdata('masuk',TRUE);

                    redirect('home');
                 
                 }else{ //akses direktur

                    redirect('login');
                }             
             
                }else{  // jika username dan password tidak ditemukan atau salah
                    $this->session->set_flashdata('username', 'Periksa kembali Username anda');
                    $this->session->set_flashdata('password', 'Periksa kembali Password anda');      
                     redirect('Login');
                    }
        }

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}