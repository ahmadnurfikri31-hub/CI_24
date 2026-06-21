<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')){
            redirect('login');
        }
        $this->load->model('buku_model');
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    // 🔹 READ (tampil data)
    public function index()
    {
        $data['buku'] = $this->buku_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }

    // 🔹 CREATE (form tambah)
    public function tambah()
    {
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/tambah', $data);
        $this->load->view('templates/footer');
    }

    // 🔹 SIMPAN DATA
    public function simpan()
    {
        $this->form_validation->set_rules('id_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('lokasi_rak', 'Lokasi Rak', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'id_buku' => $this->input->post('Kode buku'),
                'judul' => $this->input->post('Judul'),
                'penulis' => $this->input->post('Penulis'),
                'penerbit' => $this->input->post('Penerbit'),
                'tahun' => $this->input->post('Tahun'),
                'id_kategori' => $this->input->post('Kategori'),
                'stok' => $this->input->post('Stok'),
                'lokasi_rak' => $this->input->post('Lokasi rak')
            ];

            $this->buku_model->insert($data);
            redirect('buku');
        }
    }

    // 🔹 DELETE
    public function hapus($id)
    {
        $this->buku_model->delete($id);
        redirect('buku');
    }

    // 🔹 FORM EDIT
    public function edit($id)
    {
        $data['buku'] = $this->buku_model->get_by_id($id);
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }

    // 🔹 UPDATE DATA
    public function update($id)
    {
        $this->form_validation->set_rules('id_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'id_buku' => $this->input->post('Kode buku'),
                'judul' => $this->input->post('Judul'),
                'penulis' => $this->input->post('Penulis'),
                'penerbit' => $this->input->post('Penerbit'),
                'tahun' => $this->input->post('Tahun'),
                'id_kategori' => $this->input->post('Kategori'),
                'stok' => $this->input->post('Stok'),
                'lokasi_rak' => $this->input->post('Lokasi rak')
            ];

            $this->buku_model->update($id, $data);
            redirect('buku');
        }
    }
}