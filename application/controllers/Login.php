<?php 

class Login extends CI_Controller{

	public function index(){
		$this->load->view('login/index');
	}

	public function aksi_login(){
		$NIP = $this->input->post('NIP');
		$password = $this->input->post('password');
		$where = array(
			'NIP' => $NIP,
			'password' => $password);
		$cek = $this->Model_login->cek_login('tb_anggota',$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'NIP' => $NIP,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("Home"));

		}else{
		    $this->session->set_flashdata('username', 'Periksa kembali NIP anda');
            $this->session->set_flashdata('password', 'Periksa kembali Password anda');
			redirect(base_url("login"));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}
}