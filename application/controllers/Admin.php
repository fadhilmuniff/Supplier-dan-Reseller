<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        is_login();
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['jumlah_reseller'] = $this->hitungJumlahReseller();
        $data['jumlah_supplier'] = $this->hitungJumlahSupplier();
        $data['jumlah_produk'] = $this->hitungJumlahProduk();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
        // echo 'halo' . $data['user']['nama'];
    }
    public function dataSupplier()
    {
        $data['judul'] = 'Data Supplier';
        $data['supplier'] = $this->db->get('supplier')->result_array();

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dataSupplier', $data);
        $this->load->view('templates/footer');
        // echo 'halo' . $data['user']['nama'];
    }
    public function dataReseller()
    {
        $data['judul'] = 'Data Reseller';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['reseller'] = $this->db->get('reseller')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dataReseller', $data);
        $this->load->view('templates/footer');
        // echo 'halo' . $data['user']['nama'];
    }
    public function dataProduk()
    {
        $data['judul'] = 'Data Produk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->tampilSemuaProdukAdmin();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dataProduk', $data);
        $this->load->view('templates/footer');
        // echo 'halo' . $data['user']['nama'];
    }

    public function non_aktif($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
            'active' => 0
        ];

        $this->Produk_model->nonAktif($data);
        redirect('admin/dataProduk');
    }

    public function hitungJumlahReseller()
    {
        $query = $this->db->get('reseller');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahSupplier()
    {
        $query = $this->db->get('supplier');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahProduk()
    {
        $query = $this->db->get('produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
