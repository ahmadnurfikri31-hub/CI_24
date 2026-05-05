<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class anggota extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');

    }
    public function tambah()
    {
        $data['status'] = $this->anggota_model->get_status_enum();
    
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/tambah', $data);
        $this->load->view('templates/footer');
    }
    public function simpan()
    {
        $data= [
            'nomor_anggota'=> $this->input->post('nomor_anggota'),
                'nama'=>$this->input->post('nama'),
                'alamat'=>$this->input->post('alamat'),
                'telepon'=> $this->input->post('telepon'),
                'email'=> $this->input->post('email'),
                'tanggal_daftar'=>$this->input->post('tanggal_daftar'),
                'status'=> $this->input->post('status'),
        ];
        $this->session->set_flashdata('swal', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Data berhasil ditambahkan'
        ]);

        $this->anggota_model->insert($data);
        redirect('anggota');
    }
    public function hapus($id)
    {
        // if($this->Kategori_model->is_used($id)){
            // $this->session->set_flashdata('error','Kategori tidak bisa dihapus karena masih digunakan');
        // }else {
            $this->anggota_model->delete($id);
             $this->session->set_flashdata('swal', [
        'icon' => 'success',
        'title' => 'Dihapus!',
        'text' => 'Data anggota berhasil dihapus'
    ]);
        // }
        redirect('anggota');
    }
    public function edit($id)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/edit',$data);
        $this->load->view('templates/footer');

    }
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama','required');
        if($this->form_validation->run()==FALSE){
            redirect('anggota/edit/'.$id);
        }else{
            $data=[
                'nomor_anggota'=> $this->input->post('nomor_anggota'),
                'nama'=>$this->input->post('nama'),
                'telepon'=> $this->input->post('telepon'),
                'email'=> $this->input->post('email'),
                'status'=> $this->input->post('status'),
            ];
            $this->anggota_model->update($id,$data);
            $this->session->set_flashdata('succes','Data Berhasil Di Update');
            redirect('anggota');
        }
    }
}