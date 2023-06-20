<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('crud_models');
	}

	public function index()
	{
		// $data['nama_warga'] = $this->crud_models->view('nama, id', 'tbl_warga', null)->result();
		// $data['nominalIuran'] = $this->crud_models->view('nama', 'tbl_setting', ['type' => 'nominal_iuran'])->row()->nama;
		$this->load->view('report/index');
	}

	function tabel()
	{
		$post = $this->input->post(null, true);
		$tanggalAwal = $post['tanggalAwal'];
		$tanggalAkhir = $post['tanggalAkhir'];

		$data['jumlah_warga_yang_bayar'] = $this->db->query("SELECT count(id) as id FROM tbl_iuran WHERE iuran_bulan BETWEEN '$tanggalAwal' and '$tanggalAkhir'")->row()->id;
		$data['jumlah_warga_nominal_yang_bayar'] = $this->db->query("SELECT sum(nominal_iuran) as id FROM tbl_iuran WHERE iuran_bulan BETWEEN '$tanggalAwal' and '$tanggalAkhir'")->row()->id;
		$data['jumlah_pengeluaran'] = $this->db->query("SELECT count(id) as id FROM tbl_pengeluaran WHERE tanggal_pengeluaran BETWEEN '$tanggalAwal%' and '$tanggalAkhir%'")->row()->id;
		$data['jumlah_pengeluaran_nominal'] = $this->db->query("SELECT sum(nominal) as id FROM tbl_pengeluaran WHERE tanggal_pengeluaran BETWEEN '$tanggalAwal%' and '$tanggalAkhir%'")->row()->id;


		$this->load->view('report/tabel', $data);
	}
}
