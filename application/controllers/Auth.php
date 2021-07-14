<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->goToDefaultPage();
        $data['judul'] = 'Login - FIT RESELLER';
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        // if ($this->session->userdata('role_id') == 1) {
        //     redirect('admin');
        // }
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($user) {
            //usernya ada
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('supplier');
                    } else {
                        redirect('reseller');
                    }
                } else {
                    $this->session->set_flashdata('flash_auth', '<div class="alert alert-danger  " role="alert">
                    Wrong password </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('flash_auth', '<div class="alert alert-danger  " role="alert">
                User has  not activated</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('flash_auth', '<div class="alert alert-danger  " role="alert">
            Email has not registered</div>');
            redirect('auth');
        }
    }
    public function register()
    {
        $this->goToDefaultPage();
        $data['judul'] = 'Register - FIT RESELLER';
        $this->form_validation->set_rules('nama', 'Nama ', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'password', 'required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'confirm password', 'required|matches[password1]');
        // $this->form_validation->set_rules('id_supplier', 'Nama Produk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                'gambar' => 'default.jpg',
                'role_id' => $this->input->post('role', true),
                'is_active' => 1,
                'date_created' => time()

            ];

            $this->db->insert('users', $data);
            //cara buat flash data
            // $this->session->set_flashdata('flash_auth', 'Register');
            $this->session->set_flashdata('flash_auth', '<div class="alert alert-success  " role="alert">Your account registered succesfully </div');
            redirect('auth');
            // echo 'berhasil';
        }
    }
    public function goToDefaultPage()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        }
        if ($this->session->userdata('role_id') == 2) {
            redirect('supplier');
        }
        if ($this->session->userdata('role_id') == 3) {
            redirect('reseller');
        }
    }
    public function logout()
    {
        $this->session->set_flashdata('flash_auth', '<div class="alert alert-success  " role="alert">
                Success logout</div>');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
