<?php

class pesanan_masuk extends CI_Model
{

    public function pesanan()
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();
        return $this->db->get_where('pesanan', [
            'id_supplier' => $queryIdSupplier['supplier']['id_supplier'],
            'status_pesanan' => 0
        ])->result_array();
    }
    public function pesananDiProses()
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();
        return $this->db->get_where('pesanan', [
            'id_supplier' => $queryIdSupplier['supplier']['id_supplier'],
            'status_pesanan' => 1
        ])->result_array();
    }
    public function pesananDiKirim()
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();
        return $this->db->get_where('pesanan', [
            'id_supplier' => $queryIdSupplier['supplier']['id_supplier'],
            'status_pesanan' => 2
        ])->result_array();
    }
    public function pesananDiterima()
    {
        $data_user['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $queryIdSupplier['supplier'] = $this->db->get_where('supplier', ['id_user' =>  $data_user['user']['id_user']])->row_array();
        return $this->db->get_where('pesanan', [
            'id_supplier' => $queryIdSupplier['supplier']['id_supplier'],
            'status_pesanan' => 3
        ])->result_array();
    }
    public function buktiBayar($id_pesanan)
    {
        return $this->db->get_where('pesanan', [
            'id_pesanan' => $id_pesanan
        ])->row_array();
    }
    public function updatePesanan($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', $data);
    }
}
