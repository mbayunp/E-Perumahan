<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('crud_models');
	}

	public function index()
	{
		$this->load->view('warga/index');
	}

	function tabel()
	{
		$data['warga'] = $this->crud_models->view(null, 'tbl_warga', null)->result();
		$this->load->view('warga/tabel', $data);
	}

	function add()
	{
		$post = $this->input->post(null, true);
		$id        = null;
		$type_save = $post['type_save'];

		$data = [
			'nama' => $post['nama'],
			'nomor_nik_ktp' => $post['nomor_nik_ktp'],
			'nomor_kk' => $post['nomor_kk'],
			'nomor_telepon' => $post['nomor_telepon'],
			'nomor_rumah' => $post['nomor_rumah'],
			'alamat' => $post['alamat'],
			'status_tinggal' => $post['status_tinggal'],
		];

		$add = [
			'adddate'    => date('Y-m-d H:i:s')
		];
		$upd = [
			'upddate'    => date('Y-m-d H:i:s')
		];

		if ($type_save == 'add') {
			$dataNya = array_merge($data, $add);
			$save    = $this->crud_models->save('tbl_warga', $dataNya);
		} else if ($type_save == 'edit') {
			$id      = $post['id'];
			$dataNya = array_merge($data, $upd);
			$save    = $this->crud_models->update('tbl_warga', $dataNya, ['id' => $id]);
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
		$data = $this->crud_models->view(null, 'tbl_warga', ['id' => $id])->row();
		echo json_encode($data);
	}
}
