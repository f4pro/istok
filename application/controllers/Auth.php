<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Karyawan_model');
    }
    function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Barang');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email is not valid',
            'required' => 'Email must be filled in'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password must be filled in'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/auth_header.php");
            $this->load->view("auth/login");
            $this->load->view("layout/auth_footer.php");
        } else {
            $this->cek_login();
        }
    }

    function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('Barang');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',['required' => 'Nama harus diisi']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah diregistrasi!',
            'valid_email' => 'Email is not valid',
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password cocok',
                'min_length' => 'Password terlalu pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', ['required' => 'Password harus diisi', 'matches' => 'Password cocok']);
        $this->form_validation->set_rules('NIK', 'NIK', 'required|trim', ['required' => 'NIK harus diisi']);
        $this->form_validation->set_rules('usia', 'Usia', 'required|trim', ['required' => 'Usia harus diisi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi']);
        $this->form_validation->set_rules('notelp', 'NoTelp', 'required|trim', ['required' => 'Nomor telepon harus diisi']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('layout/auth_reg_header.php', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('layout/auth_reg_footer.php');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'status' => "Karyawan",
            ];
            $this->userrole->insert($data);
            $dataKar = [
                'email' => $this->input->post('email'),
                'nama_karyawan' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'notelp' => $this->input->post('notelp'),
                'NIK' => $this->input->post('NIK'),
                'usia' => $this->input->post('usia'),
            ];
            $this->Karyawan_model->insert($dataKar);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account created!</div>');
            redirect('Auth');
        }
    }


    function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'status' => $user['status'],
                    'id' => $user['id'],
                ];

                $this->session->set_userdata($data);
                if ($user['status'] == 'Admin') {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Welcome!</div>');
                    redirect('Barang');
                } elseif ($user['status'] == 'Karyawan') {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Welcome!</div>');
                    redirect('HomeKar');
                } else {
                    redirect('Validation');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><span class="fe fe-alert-triangle fe-16 mr-2"/>New email, who is this? 
            Try make it one :)</div>');
            redirect('Auth');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('status');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logged Out! Come again!</div>');
        redirect('Auth');
    }
}
