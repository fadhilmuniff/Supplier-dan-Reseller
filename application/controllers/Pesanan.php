<?php

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
        is_login();
    }
    public function index()
    {
        $data['judul'] = 'Pesanan';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        // $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
        // echo 'halo' . $data['user']['nama'];
    }
    public function checkout()
    {
        if (!$this->cart->contents()) {
            redirect('reseller');
        }
        $data['judul'] = 'Checkout';
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $queryIdReseller['reseller'] = $this->db->get_where('reseller', ['id_user' =>  $data['user']['id_user']])->row_array();
        $id_reseller = $queryIdReseller['reseller']['id_reseller'];
        // echo $id_reseller;
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
        $this->form_validation->set_rules('kota', 'kota', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nama_penerima', 'nama penerimah', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pesanan/checkout', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_order' => $this->input->post('no_order', true),
                'id_reseller' => $id_reseller,
                'id_supplier' => $this->input->post('id_supplier', true),
                'tgl_pesan' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima', true),
                'provinsi' => $this->input->post('provinsi', true),
                'kota' => $this->input->post('kota', true),
                'alamat' => $this->input->post('alamat', true),
                'total_bayar' => $this->input->post('total_bayar', true),
                'status_bayar' => '0',
                'status_pesanan' => '0',
            ];

            $this->Transaksi_model->simpanPesanan($data);
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                $data_rinci = [
                    'no_order' => $this->input->post('no_order', true),
                    'id_produk' => $items['id'],
                    'jumlah' => $this->input->post('qty' . $i++)
                ];
                $this->Transaksi_model->simpanTransaksi($data_rinci);
            }
            $this->session->set_flashdata('flash_pesanan', '<div class="alert alert-success  " role="alert">
            Berhasil order</div>');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
        // echo 'halo' . $data['user']['nama'];
    }
    public function proses_checkout()
    {
        $coba1 = $this->input->post('provinsi', true);
        $coba2 = $this->input->post('kota', true);
        echo $coba1;
        echo $coba2;
    }


    public function detail_produk($id_produk)
    {
        $data['produk'] = $this->Produk_model->detailProdukById($id_produk);
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
        $data['produk'] = $this->Produk_model->tampilSemuaProduk();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dataProduk', $data);
        $this->load->view('templates/footer');
        // echo 'halo' . $data['user']['nama'];
    }
}
