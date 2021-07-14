<?php
class Transaksi_model extends CI_Model
{
    public function simpanPesanan($data)
    {
        $this->db->insert('pesanan', $data);
    }
    public function simpanTransaksi($data_rinci)
    {
        $this->db->insert('transaksi', $data_rinci);
    }

    public function belumBayar()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdReseller['reseller'] = $this->db->get_where('reseller', ['id_user' =>  $data['user']['id_user']])->row_array();
        $id_reseller = $queryIdReseller['reseller']['id_reseller'];
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('status_pesanan = 0');
        $this->db->where('id_reseller', $id_reseller);
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get()->result_array();
    }
    public function diproses()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdReseller['reseller'] = $this->db->get_where('reseller', ['id_user' =>  $data['user']['id_user']])->row_array();
        $id_reseller = $queryIdReseller['reseller']['id_reseller'];
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('status_pesanan = 1');
        $this->db->where('id_reseller', $id_reseller);
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get()->result_array();
    }
    public function dikirim()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdReseller['reseller'] = $this->db->get_where('reseller', ['id_user' =>  $data['user']['id_user']])->row_array();
        $id_reseller = $queryIdReseller['reseller']['id_reseller'];
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('status_pesanan = 2');
        $this->db->where('id_reseller', $id_reseller);
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get()->result_array();
    }
    public function diterima()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdReseller['reseller'] = $this->db->get_where('reseller', ['id_user' =>  $data['user']['id_user']])->row_array();
        $id_reseller = $queryIdReseller['reseller']['id_reseller'];
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('status_pesanan = 3');
        $this->db->where('id_reseller', $id_reseller);
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get()->result_array();
    }
    public function detailPesanan($id_pesanan)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('id_pesanan', $id_pesanan);
        return $this->db->get()->row_array();
    }
    public function uploadBukti($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', $data);
    }
    public function updatePesanan()
    {
        $img = $this->uploadImage();
        $data = [
            'id_pesanan' => $this->input->post('id_pesanan'),
            'atas_nama' => $this->input->post('atas_nama'),
            'nama_bank' => $this->input->post('nama_bank'),
            'no_rek' => $this->input->post('no_rek'),
            'status_bayar' => '1',
            'bukti_bayar' => $img
        ];
        $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
        $this->db->update('pesanan', $data);
    }

    public function uploadImage()
    {
        $penulisFile = $_FILES['bukti_bayar']['name'];
        $ukuranFile = $_FILES['bukti_bayar']['size'];
        $error = $_FILES['bukti_bayar']['error'];
        $tmpName = $_FILES['bukti_bayar']['tmp_name'];

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
        move_uploaded_file($tmpName, './assets/img/bukti_bayar/' . $penulisFileBaru);
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

    public function pesananDiterima($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', $data);
    }
}
