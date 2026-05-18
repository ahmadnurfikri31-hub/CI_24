<?php
defined('BASEPATH')OR exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property Peminjaman_model $peminjaman_model
 */
class laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
{
    $bulan = $this->input->get('bulan');

    $this->db->select('
        peminjaman.id,
        peminjaman.kode_peminjaman,
        peminjaman.anggota_id,
        peminjaman.tanggal_pinjam,
        peminjaman.status,
        anggota.nama AS nama_anggota
    ');
    $this->db->from('peminjaman');
    $this->db->join('anggota', 'anggota.id = peminjaman.anggota_id', 'left');

    if (!empty($bulan)) {
        $tanggal_awal  = $bulan . '-01';
        $tanggal_akhir = date('Y-m-t', strtotime($tanggal_awal));

        $this->db->where('peminjaman.tanggal_pinjam >=', $tanggal_awal);
        $this->db->where('peminjaman.tanggal_pinjam <=', $tanggal_akhir);
    }

    $data['data'] = $this->db->get()->result();
    $data['bulan'] = $bulan;

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('laporan/peminjaman', $data);
    $this->load->view('templates/footer');
    }
    public function cetak_peminjaman()
{
    $bulan = $this->input->get('bulan');

    $this->db->select('peminjaman.*, anggota.nama AS nama_anggota');
    $this->db->from('peminjaman');
    $this->db->join('anggota', 'anggota.id = peminjaman.anggota_id', 'left');

    if (!empty($bulan)) {
        $tanggal_awal  = $bulan . '-01';
        $tanggal_akhir = date('Y-m-t', strtotime($tanggal_awal));

        $this->db->where('peminjaman.tanggal_pinjam >=', $tanggal_awal);
        $this->db->where('peminjaman.tanggal_pinjam <=', $tanggal_akhir);
    }

    $data['data'] = $this->db->get()->result();
    $data['bulan'] = $bulan;

    $this->load->view('laporan/cetak_pinjam', $data);
}
}