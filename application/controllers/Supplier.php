<?php

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_masuk');
        is_login();
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['jumlah_produk'] = $this->hitungJumlahProduk();
        $data['jumlah_pesanan'] = $this->hitungJumlahPesanan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        // echo 'halaman supplier';
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
        // echo 'halo' . $data['user']['nama'];
    }

    public function hitungJumlahProduk()
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();
        $query = $this->db->get_where('produk', ['id_supplier' => $queryIdSupplier['supplier']['id_supplier']]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahPesanan()
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();
        $query = $this->db->get_where('pesanan', ['id_supplier' => $queryIdSupplier['supplier']['id_supplier']]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function pesanan_masuk()
    {
        $data['judul'] = 'Pesanan Masuk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_masuk->pesanan();
        $data['pesanan_diproses'] = $this->Pesanan_masuk->pesananDiProses();
        $data['pesanan_dikirim'] = $this->Pesanan_masuk->pesananDiKirim();
        $data['pesanan_diterima'] = $this->Pesanan_masuk->pesananDiterima();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supplier/pesanan_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function cek_bukti($id_pesanan)
    {
        $data['judul'] = 'Bukti Bayar';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_masuk->buktiBayar($id_pesanan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('supplier/bukti_bayar', $data);
        $this->load->view('templates/footer');
    }
    public function pesanan_proses($id_pesanan)
    {
        $data = [
            'id_pesanan' => $id_pesanan,
            'status_pesanan' => 1
        ];

        $this->Pesanan_masuk->updatePesanan($data);
        redirect('supplier/pesanan_masuk');
    }
    public function pesanan_kirim($id_pesanan)
    {
        $data = [
            'id_pesanan' => $id_pesanan,
            'status_pesanan' => 2
        ];

        $this->Pesanan_masuk->updatePesanan($data);
        redirect('supplier/pesanan_masuk');
    }
}
