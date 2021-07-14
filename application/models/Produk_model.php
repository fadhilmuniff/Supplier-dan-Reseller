<?php

class Produk_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('upload');
    }
    public function tampilDataProdukBySupplier()
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();
        return $this->db->get_where('produk', ['id_supplier' => $queryIdSupplier['supplier']['id_supplier']])->result_array();
    }
    public function tampilDataProdukBySupplier_reseller($id_supplier)
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();
        return $this->db->get_where('produk', ['id_supplier' => $id_supplier])->result_array();
    }

    public function tampilSemuaProduk()
    {
        return $this->db->get_where('produk', 'active=1')->result_array();
    }
    public function tampilSemuaProdukAdmin()
    {
        return $this->db->get('produk')->result_array();
    }
    public function uploadProduk()
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        // // $id_supplier =  $data['user']['id_user'];
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();

        $img = $this->uploadImage();
        if (!$img) {
            return false;
        }
        $data = [
            // 'id_produk' => $this,
            // 'id_produk' => '',
            'nama_produk' => $this->input->post('nama_produk', true),
            'deskripsi_produk' => $this->input->post('deskripsi_produk', true),
            'harga_produk'  => $this->input->post('harga_produk', true),
            'gambar_produk' => $img,
            'stok' => $this->input->post('stok', true),
            'kategori_produk' => $this->input->post('kategori_produk', true),
            'id_supplier' => $queryIdSupplier['supplier']['id_supplier'],
            'active' => 1
        ];

        $this->db->insert('produk', $data);
    }

    public function uploadImage()
    {
        $penulisFile = $_FILES['gambar_produk']['name'];
        $ukuranFile = $_FILES['gambar_produk']['size'];
        $error = $_FILES['gambar_produk']['error'];
        $tmpName = $_FILES['gambar_produk']['tmp_name'];

        //cek apakah rtidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>
                alert('Pilih file');
                </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar atobukan
        $ekstensiFile = explode('.', $penulisFile);
        $ekstensiFile = strtolower(end($ekstensiFile));

        $penulisFileBaru = uniqid();
        $penulisFileBaru .= '.';
        $penulisFileBaru .= $ekstensiFile;
        move_uploaded_file($tmpName, './assets/img/produk/' . $penulisFileBaru);
        return $penulisFileBaru;
        // $config['allowed_types']        = 'jpg|png';
        // $config['max_size']             = 1024; // 1MB
        // $config['upload_path']          = './assets/img/profile';

        // $this->load->library('upload', $config);
        // if ($this->upload->do_upload('gambar_produk')) {
        //     return $this->upload->data('file_name');
        // }

        // return "default.jpg";
    }

    public function deleteProduk($id_produk)
    {
        $this->db->delete('produk', array('id_produk' => $id_produk));
    }
    public function detailProdukById($id_produk)
    {
        return $this->db->get_where('produk', array('id_produk' => $id_produk))->row_array();
    }
    public function detailProdukByIdCheckout($id_produk)
    {
        // return $this->db->get_where('produk', array('id_produk' => $id_produk))->result_array();
        return $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
    }
    public function updateProduk()
    {
        $data = [
            // 'id_produk' => $this,
            // 'id_produk' => '',
            'nama_produk' => $this->input->post('nama_produk', true),
            'deskripsi_produk' => $this->input->post('deskripsi_produk', true),
            'harga_produk' => $this->input->post('harga_produk', true),
            'gambar_produk' => $this->input->post('gambar_produk', true),
            'stok' => $this->input->post('stok', true),
            'kategori_produk' => $this->input->post('kategori_produk', true),
            'id_supplier' => $this->input->post('id_supplier', true),
            'active' => $this->input->post('active', true),
        ];
        // var_dump($data);
        // die;

        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', $data);
    }

    public function searchProduk()
    {
        $keyword_produk = $this->input->post('keyword_produk', true);
        $this->db->like('nama_produk', $keyword_produk);
        return $this->db->get('produk')->result_array();
    }

    public function cari($id_produk)
    {
        $result = $this->db->where('id_produk', $id_produk)
            ->limit(1)
            ->get('produk');
        // $result = $this->db->get_where('produk', array('id_produk' => $id_produk));
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            echo 'gagalll';
            // die;
            return array();
        }
    }

    public function nonAktif($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }
}
