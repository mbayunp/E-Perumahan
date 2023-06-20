<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	function index()
	{
		check_already_login();
		$this->load->view('auth/index');
	}

	function process()
	{
		$post = $this->input->post(null, true);

		// print_r(md5($this->input->post('pasword')));
		// die();
		if (isset($post['login'])) {
			$this->form_validation->set_rules('user', 'user', 'trim|required', ['required' => 'Username tidak boleh kosong']);
			$this->form_validation->set_rules('pasword', 'pasword', 'trim|required', ['required' => 'Password tidak boleh kosong']);
			if ($this->form_validation->run()) {
				$username  = $post['user'];
				$password = md5($post['pasword']);
				$cekDb = $this->db->from('tbl_user')->where('username', $username)->where('password', $password)->get()->row();
				if ($cekDb) {
					$params = [
						'id' => $cekDb->id,
						'nama' => $cekDb->nama
					];
					$this->session->set_userdata($params);
					$this->session->set_flashdata('notif', 'Login Berhasil ');
					redirect('dashboard');
				} else {
					// jika tidak ada username
					$this->session->set_flashdata('notif', 'Username dan Password Salah');
					redirect('auth');
				}
			} else {
				// menajlankan validation
				$this->session->set_flashdata('notif', validation_errors());
				redirect('auth');
			}
		}
	}

	function logout()
	{
		// echo 'wowo';
		$params = ['id', 'nama'];
		// $params = ['user_id'];
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('notif', 'Berhasil Logout!!');
		redirect('auth');
	}

	function cekcetak()
	{
		$this->load->view('auth/cekcetak');
	}

	function getDataPembayaran()
	{

		$this->load->model('crud_models');
		$no_kk = $this->input->post('no_kk', true);
		$cekQuery = $this->crud_models->view('id', 'tbl_warga', ['nomor_kk' => $no_kk])->row();
		$html = false;
		if ($cekQuery == null) {
			$data = ['status' => false, 'html' => $html];
		} else {
			$query = $this->crud_models->view('iuran_bulan', 'tbl_iuran', ['id_warga' => $cekQuery->id])->result();
			$html .= '<div class="input-group mb-3">
			
			<select name="iuran_bulan" class="form-control">
					<option value="#">Pilih Iuran Bulan</option>';
			foreach ($query as $data) {
				$html .= '<option value="' . $data->iuran_bulan . '">' . $data->iuran_bulan . '</option>';
			}
			$html .= '</select>
					
					</div>';
			$data = ['status' => true, 'html' => $html];
		}
		echo json_encode($data);
	}


	public function html()
	{
		$post = $this->input->post(null, true);
		$iuran_bulan = $post['iuran_bulan'];
		$no_kk = $post['no_kk'];
		if ($no_kk == null || $iuran_bulan == null) {
			$this->session->set_flashdata('notif', 'Mohon untuk di isi nomor Kartu Keluarga dan Pilih Bulan iuran');
			redirect('auth/cekcetak');
		} else {
			$query = "SELECT tanggal_bayar, iuran_bulan, nominal_iuran, (SELECT nama FROM tbl_warga WHERE id=id_warga) as nama FROM tbl_iuran WHERE iuran_bulan LIKE '%$iuran_bulan%'";
			$runQuery = $this->db->query($query)->row();
			if ($runQuery == null) {
				$this->session->set_flashdata('notif', 'Terjadi kesalahan harap hubungi ketua RT');
				redirect('auth/cekcetak');
			} else {
				$data = ['row' => $runQuery];
				$this->load->view('auth/cetak', $data);
			}
		}
	}
}
