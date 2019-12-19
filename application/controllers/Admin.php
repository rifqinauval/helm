<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $config['base_url'] = 'http://localhost/helm/admin/data_produk/__construct';
        $config['total_rows'] = $this->helm->countAllHelm();
        $config['per_page'] = 3;

        //initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        //$data['helm'] = $this->helm->getProduk(1, 3);
        $data['helm_jadi'] = $this->helm->getProduk($config['per_page'], $data['start']);
    }

    public function index()
    {

        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footbar');
    }

    public function data_produk()
    {

        $data['title'] = 'Data Produk';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->db->get('helm_jadi')->result_array();
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('admin/data_produk', $data);
        // $this->load->view('templates/footbar');

        if ($this->input->post('keyword')) {
            $data['produk'] = $this->Helm_model->cariDataHelm();
        }

        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        // $this->form_validation->set_rules('gambar', 'Gambar', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data_produk', $data);
            $this->load->view('templates/footbar');
        } else {
            $merek = $this->input->post('merek');
            $tipe = $this->input->post('tipe');
            $ukuran = $this->input->post('ukuran');
            $jenis = $this->input->post('jenis');
            $warna = $this->input->post('warna');
            $harga = $this->input->post('harga');
            $gambar = $_FILES['gambar'];
            if ($gambar = "") {
            } else {
                $config['upload_path'] = './assets/img/produk';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    echo "gagal";
                    die;
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }
            // $gambar = $this->input->post('gambar')
            $data = array(
                'merek' => $merek,
                'tipe' => $tipe,
                'ukuran' => $ukuran,
                'jenis' => $jenis,
                'warna' => $warna,
                'harga' => $harga,
                'gambar' => $gambar
            );

            $this->db->insert('helm_jadi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil ditambahkan!</div>');
            redirect('admin/data_produk');
        }
    }

    public function role()
    {

        $data['title'] = 'Role';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footbar');
    }


    public function roleAccess($role_id)
    {

        $data['title'] = 'Role Access';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footbar');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'menu_id' => $menu_id,
            'role_id' => $role_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success">Access Change ! </div>');
    }

    public function tambah_produk()
    {
        $data['title'] = 'Data Produk';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->db->get('helm_jadi')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_produk', $data);
        $this->load->view('templates/footbar');

        $merek = $this->input->post('merek');
        $tipe = $this->input->post('tipe');
        $ukuran = $this->input->post('ukuran');
        $jenis = $this->input->post('jenis');
        $warna = $this->input->post('warna');
        $harga = $this->input->post('harga');
        // $gambar = $this->input->post('gambar')
        $data = array(
            'merek' => $merek,
            'tipe' => $tipe,
            'ukuran' => $ukuran,
            'jenis' => $jenis,
            'warna' => $warna,
            'harga' => $harga
        );

        $this->Helm_model->tambahProduk($data, 'helm_jadi');
        redirect('admin/data_produk');
    }

    public function hapus($id)
    {
        $this->Helm_model->hapusDataProduk($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/data_produk');
    }

    public function ubah($id)
    {
        $data['title'] = 'ubah Produk';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Helm_model->getProdukById($id);



        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        // $this->form_validation->set_rules('gambar', 'Gambar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_produk', $data);
            $this->load->view('templates/footbar');
        } else {
            $this->Helm_model->ubahDataProduk();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/data_produk');
        }
    }
}
