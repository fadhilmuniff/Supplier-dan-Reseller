<?php

class Pesanan_saya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');

        // is_login();
    }
    public function index()
    {
        $data['judul'] = 'Pesanan Saya';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['belum_bayar'] = $this->Transaksi_model->belumBayar();
        $data['diproses'] = $this->Transaksi_model->diproses();
        $data['dikirim'] = $this->Transaksi_model->dikirim();
        $data['diterima'] = $this->Transaksi_model->diterima();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pesanan_saya/index', $data);
        $this->load->view('templates/footer');
    }
    public function bayar($id_pesanan)
    {
        $data['judul'] = 'Pembayaran';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['belum_bayar'] = $this->Transaksi_model->belumBayar();
        $data['detail_pesanan'] = $this->Transaksi_model->detailPesanan($id_pesanan);
        $this->form_validation->set_rules('atas_nama', 'atas nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pesanan_saya/bayar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Transaksi_model->updatePesanan();
            //cara buat flash data
            $this->session->set_flashdata('flash_produk', 'Update');
            redirect('pesanan_saya');
            // echo 'berhasil';
        }
    }
    public function pesanan_terima($id_pesanan)
    {
        $data = [
            'id_pesanan' => $id_pesanan,
            'status_pesanan' => 3
        ];

        $this->Transaksi_model->pesananDiterima($data);
        redirect('pesanan_saya/index');
    }
}
