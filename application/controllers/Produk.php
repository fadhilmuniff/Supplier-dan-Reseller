<?php

class Produk extends CI_Controller
{

    // jika databasenya di controller ini doang mending mloadnya di sini, caranya :
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Data Produk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->tampilDataProdukBySupplier();

        if ($this->input->post('keyword_produk')) {
            $data['produk'] = $this->Produk_model->searchProduk();
        }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function upload_produk()
    {
        $data['judul'] = 'Upload Produk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        // $data['produk'] = $this->Produk_model->uploadProduk();
        //form validation
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required');

        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');
        // $this->form_validation->set_rules('gambar_produk', 'Gambar Produk', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('kategori_produk', 'Kategori Produk', 'required');
        // $this->form_validation->set_rules('id_supplier', 'Nama Produk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('produk/upload_produk', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->load->view('formsuccess'); 
            $this->Produk_model->uploadProduk();
            //cara buat flash data
            $this->session->set_flashdata('flash_produk', 'Upload');
            redirect('produk');
            // echo 'berhasil';
        }
    }

    public function delete_produk($id_produk)
    {
        $this->Produk_model->deleteProduk($id_produk);
        $this->session->set_flashdata('flash_produk', 'Delete');
        redirect('produk');
    }

    public function detail_produk($id_produk)
    {
        $data['judul'] = 'Detail Produk';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->detailProdukById($id_produk);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('produk/detail_produk', $data);
        $this->load->view('templates/footer');
    }

    public function update_produk($id_produk)
    {
        $data['judul'] = 'Update Produk';
        $data['produk'] = $this->Produk_model->detailProdukById($id_produk);
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        // $data['produk'] = $this->Produk_model->uploadProduk();
        //form validation
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');
        $this->form_validation->set_rules('gambar_produk', 'Gambar Produk', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('kategori_produk', 'Kategori Produk', 'required');
        // $this->form_validation->set_rules('id_supplier', 'Nama Produk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('produk/update_produk', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->load->view('formsuccess');

            $this->Produk_model->updateProduk();
            //cara buat flash data
            $this->session->set_flashdata('flash_produk', 'Update');
            redirect('produk');
            // echo 'berhasil';
        }
    }
}
