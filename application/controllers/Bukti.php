<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bukti extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('crud_models');
    }

    public function index()
    {
        $data['nama_warga'] = $this->crud_models
            ->view('nama, id,nomor_telepon', 'tbl_warga', null)
            ->result();
        $data['Bukti'] = $this->crud_models
            ->view('gambar', 'tbl_bukti', null)
            ->result();
        $this->load->view('Bukti/index', $data);
    }

    function tabel()
    {
        $data['bukti'] = $this->crud_models
            ->view(null, 'tbl_bukti', null)
            ->result();
        $this->load->view('Bukti/tabel', $data);
    }
}
