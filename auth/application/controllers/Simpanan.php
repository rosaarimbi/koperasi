<?php

class Simpanan Extends CI_Controller{
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
        $title['title'] = "Halaman Data Simpanan";
        $data['data']= $this->Model_simpanan->getAllSimpanan();
        $this->load->view('templates/header',$title);
        $this->load->view('simpanan/index', $data);
    }

    public function detail($id_simpanan)
    {
        $title['title'] = "Halaman Detail Simpanan";
        $data['data']= $this->Model_simpanan->getSimpanan($id_simpanan);
        $data['jumlah']= $this->Model_simpanan->jumlahSimpananNIP($id_simpanan);
        $this->load->view('templates/header',$title);
        $this->load->view('simpanan/detail', $data);
    }

    public function simpanan(){ //fungsi tambah simpanan
        $jenis = $this->Model_jenis->getJenisId($this->input->post('id_jenis_simpanan'));
        $subtotal = $this->input->post('jumlah') * $this->input->post('qty');
        $jumlah = $this->input->post('jumlah');
        //fungsi Tambah Simpanan
        $data = array(
            'id' => $this->input->post('id_jenis_simpanan'),
            'id_simpanan' => $this->input->post('id_simpanan'),
            'id_user' => $this->input->post('id_user'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'tgl_simpan' => $this->db->set('user_registered', 'NOW()', FALSE),
            'NIP' => $this->input->post('NIP'),
            'name' => $jenis->nama_jenis_simpanan,
            'price' => $this->input->post('jumlah'),
            'qty' => $this->input->post('qty'),
            'subtotal' => $subtotal
        );
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan simpanan setelah added
    }

    public function show_cart(){ //Fungsi untuk menampilkan Cart

        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$items['name'].'</td>
                    <td>Rp. '.number_format($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Hapus</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="1"></th>
                <th>Total</th>
                <th>'.'Rp '.number_format($this->cart->total()).'</th>
                <th></th>
            </tr>
        ';
        return $output;
    }

    public function load_cart(){ //load data cart
        echo $this->show_cart();
    }

    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    public function tambah()
    {
        $title['title'] = "Halaman Tambah Simpanan";
        $data['anggota']= $this->Model_anggota->getAllAnggota();
        $data['jenis']= $this->Model_jenis->getAllJenis();
        $data['user']= $this->Model_user->getUser();
        $data['kode'] = $this->Model_simpanan->kode();
        $this->load->view('templates/header',$title);
        $this->load->view('simpanan/tambah', $data);
    }

    public function add(){
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        //simpan pembelian
        foreach ($this->cart->contents() as $items) {
         $parram = array(
            'id_simpanan' => $items['id_simpanan'],
            'NIP' => $items['NIP'],
            'id_user' => $items['id_user'],
            'tgl_simpan' => $now,
            'total' => $this->cart->total()
            );

     }
     $this->Model_simpanan->save($parram);


             $data = array();
             foreach ($this->cart->contents() as $items) {
                $data[] = array(
                'id_simpanan' => $items['id_simpanan'],
                'NIP' => $items['NIP'],
                'id_user' => $items['id_user'],
                'id_jenis_simpanan' => $items['id'],
                'jml_simpanan' => $items['price']
                );

                $this->Model_simpanan->save_detail($data);
            }

            $this->cart->destroy();
            $this->session->set_flashdata('message', 'Data berhasil diinput');
            redirect('Simpanan');

    }


    public function hapus($id_simpanan)
    {
        $this->Model_simpanan->hapusDataSimpanan($id_simpanan);
        redirect('Simpanan');
    }

    public function ubah($id_simpanan)
    {
        $title['title'] = "Ubah Data Anggota";
        $data['data']= $this->Model_simpanan->getSimpanan($id_simpanan);
        $this->form_validation->set_rules('id_simpanan', 'ID Simpanan', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$title);
            $this->load->view('simpanan/ubah', $data);
        } else {

            $this->Model_simpanan->ubahDataSimpanan();
            redirect('Simpanan');
        }
    }

}
