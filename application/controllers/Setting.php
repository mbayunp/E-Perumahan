<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('crud_models');
	}

	public function index()
	{
		$this->load->view('setting/index');
	}

	function tabel()
	{
		$data['setting'] = $this->crud_models->view(null, 'tbl_setting', null)->result();
		$this->load->view('setting/tabel', $data);
	}

	function add()
	{
		$post = $this->input->post(null, true);
		$id        = null;
		$type_save = $post['type_save'];

		$data = [
			'nama' => $post['nama'],
		];

		$upd = [
			'upddate'    => date('Y-m-d H:i:s')
		];

		if ($type_save == 'add') {
			$dataNya = $data;
			$save    = $this->crud_models->save('tbl_setting', $dataNya);
		} else if ($type_save == 'edit') {
			$id      = $post['id'];
			$dataNya = array_merge($data, $upd);
			$save    = $this->crud_models->update('tbl_setting', $dataNya, ['id' => $id]);
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
		$data = $this->crud_models->view(null, 'tbl_setting', ['id' => $id])->row();
		echo json_encode($data);
	}
}
