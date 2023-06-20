<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// $this->load->model('crud_models');
	}

	public function index()
	{
		$dateNow = date('Y-m');
		$data['jumlah_warga'] = $this->db->query("SELECT count(id) as id FROM tbl_warga ")->row()->id;
		$data['jumlah_warga_bayar'] = $this->db->query("SELECT count(id) as id FROM tbl_iuran where  iuran_bulan='$dateNow'")->row()->id;
		$this->load->view('dashboard/index', $data);
	}
}
