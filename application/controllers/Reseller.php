<?php

class Reseller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data['judul'] = "Home";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Produk_model');
        $data['produk'] = $this->Produk_model->tampilSemuaProduk();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('reseller/index', $data);
        $this->load->view('templates/footer');
    }
    public function produkSupplier($id_supplier)
    {
        $data['judul'] = "Produk Supplier";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Produk_model');
        $data['produk'] = $this->Produk_model->tampilDataProdukBySupplier_reseller($id_supplier);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('reseller/produk_supplier', $data);
        $this->load->view('templates/footer');
    }

    public function detail_produk($id_produk)
    {
        $data['judul'] = 'Detail Produk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->detailProdukById($id_produk);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('reseller/detail_produk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_keranjang($id_produk)
    {

        $produk = $this->Produk_model->cari($id_produk);
        $data_produk = array(
            'id'      => $produk->id_produk,
            'qty'     => 1,
            'price'   => $produk->harga_produk,
            'name'    => $produk->nama_produk,
            'id_supplier' => $produk->id_supplier
        );

        $this->cart->insert($data_produk);

        redirect('reseller');
    }
    public function beli_sekarang($id_produk)
    {

        $produk = $this->Produk_model->cari($id_produk);
        $data_produk = array(
            'id'      => $produk->id_produk,
            'qty'     => 1,
            'price'   => $produk->harga_produk,
            'name'    => $produk->nama_produk,
        );

        $this->cart->insert($data_produk);

        redirect('reseller/keranjang');
    }

    public function keranjang()
    {
        $data['judul'] = "Keranjang";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Produk_model');
        $data['produk'] = $this->Produk_model->tampilSemuaProduk();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('reseller/keranjang', $data);
        $this->load->view('templates/footer');
    }
    public function checkout($id_produk, $qty)
    {
        echo $id_produk . $qty;
    }

    // public function hapus_item_keranjang($rowid)
    // {
    //     $removed_cart = array(
    //         'rowid'         => $rowid,
    //         'qty'           => 0
    //     );
    //     $this->cart->update($removed_cart);
    // }
    public function hapus_semua_keranjang()
    {
        $this->cart->destroy();
        redirect('reseller/keranjang');
    }

    public function tampilSupplier()
    {
        $data['judul'] = "Supplier";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('reseller/daftar_reseller', $data);
        $this->load->view('templates/footer');
    }
}
