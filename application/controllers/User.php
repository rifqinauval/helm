<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helm_model');
        $this->load->library('form_validation');
        is_logged_in();

        $this->load->model('Helm_model', 'helm');

        //PAGINATION
        $this->load->library('pagination');

        //config
        $config['base_url'] = 'http://localhost/helm/user/data_produk_user/__construct';
        $config['total_rows'] = $this->helm->countAllHelm();
        $config['per_page'] = 3;

        //initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        //$data['helm'] = $this->helm->getProduk(1, 3);
        $data['helm_jadi'] = $this->helm->getProduk($config['per_page'], $data['start']);

        //Cart
        $this->load->library('cart');
    }

    public function index()
    {

        $data['title'] = 'My Profile';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footbar');
    }

    public function data_produk_user()
    {

        $data['title'] = 'Data Produk';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->db->get('helm_jadi')->result_array();

        if ($this->input->post('keyword')) {
            $data['produk'] = $this->Helm_model->cariDataHelm();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/data_produk_user', $data);
        $this->load->view('templates/footbar');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Helm_model->getProdukById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footbar');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footbar');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                // $config['max_width'] = '1024';
                // $config['max_height'] = '768';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if (old_image != 'defaulf.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated !</div>');
            redirect('user');
        }
    }


    public function changepassword()
    {

        $data['title'] = 'Change Password';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->form_validation->set_rules('current_password', 'Current Pasword', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Pasword', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat Pasword', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            # jika dijalankan maka akan memanggil view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footbar');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                # memberitahu user agar password nya tidak sesuai dengan Current password
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current Password!!!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    # memberitahu user agar passwordnya tidak boleh sama dengan currentPassword
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as Current Password!!!</div>');
                    redirect('user/changepassword');
                } else {
                    # password sudah sesuai
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!!</div>');
                    redirect('user/');
                }
            }
        }
    }

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->Helm_model->find($id);

        $data = array(
            'id'      => $barang->id,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->tipe,

        );
        

        $this->cart->insert($data);
        redirect('user/data_produk_user');
    }

    public function detail_keranjang()
    {
        $data['title'] = 'Detail Data Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/keranjang');
        $this->load->view('templates/footbar');
    }
}
