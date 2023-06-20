<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('crud_models');
	}

	public function index()
	{
		$this->load->view('pengeluaran/index');
	}

	function tabel()
	{
		$data['pengeluaran'] = $this->crud_models->view(null, 'tbl_pengeluaran', null)->result();
		$this->load->view('pengeluaran/tabel', $data);
	}

	function add()
	{
		$post      = $this->input->post(null, true);
		$id        = null;
		$type_save = $post['type_save'];

		$data = [
			'nama'                => $post['nama'],
			'nominal'             => $post['nominal'],
			'keterangan'          => $post['keterangan'],
			'tanggal_pengeluaran' => $post['tanggal_pengeluaran'],
		];

		$add = [
			'adddate' => date('Y-m-d H:i:s')
		];
		$upd = [
			'upddate' => date('Y-m-d H:i:s')
		];

		if ($type_save == 'add') {
			$dataNya = array_merge($data, $add);
			$save    = $this->crud_models->save('tbl_pengeluaran', $dataNya);
		} else if ($type_save == 'edit') {
			$id      = $post['id'];
			$dataNya = array_merge($data, $upd);
			$save    = $this->crud_models->update('tbl_pengeluaran', $dataNya, ['id' => $id]);
		}

		if ($save > 0) {
			$massage = ['status' => true];
		} else {
			$massage = ['status' => false];
		}
		echo json_encode($massage);
	}

	function edit($id)
	{
		$data = $this->crud_models->view(null, 'tbl_pengeluaran', ['id' => $id])->row();
		echo json_encode($data);
	}

	function cekIuran()
	{
		$nominal     = $this->db->query("select sum(nominal_iuran) as nominal from tbl_iuran where status=1")->row()->nominal;
		$pengeluaran = $this->db->query("select sum(nominal) as nominal from tbl_pengeluaran ")->row();
		$data        = $nominal - (empty($pengeluaran) ? 0 : $pengeluaran->nominal);
		echo json_encode($data);
	}
}
