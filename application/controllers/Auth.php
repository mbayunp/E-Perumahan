<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('crud_models');
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
            $this->form_validation->set_rules('user', 'user', 'trim|required', [
                'required' => 'Username tidak boleh kosong',
            ]);
            $this->form_validation->set_rules(
                'pasword',
                'pasword',
                'trim|required',
                ['required' => 'Password tidak boleh kosong']
            );
            if ($this->form_validation->run()) {
                $username = $post['user'];
                $password = md5($post['pasword']);
                $cekDb = $this->db
                    ->from('tbl_user')
                    ->where('username', $username)
                    ->where('password', $password)
                    ->get()
                    ->row();
                if ($cekDb) {
                    $params = [
                        'id' => $cekDb->id,
                        'nama' => $cekDb->nama,
                    ];
                    $this->session->set_userdata($params);
                    $this->session->set_flashdata('notif', 'Login Berhasil ');
                    redirect('dashboard');
                } else {
                    // jika tidak ada username
                    $this->session->set_flashdata(
                        'notif',
                        'Username dan Password Salah'
                    );
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
        $cekQuery = $this->crud_models
            ->view('id', 'tbl_warga', ['nomor_nik_ktp' => $no_kk])
            ->row();
        $html = false;
        if ($cekQuery == null) {
            $data = ['status' => false, 'html' => $html];
        } else {
            $query = $this->crud_models
                ->view('iuran_bulan', 'tbl_iuran', [
                    'id_warga' => $cekQuery->id,
                ])
                ->result();
            $html .= '<div class="input-group mb-3">
			
			<select name="iuran_bulan" class="form-control">
					<option value="#">Pilih Iuran Bulan</option>';
            foreach ($query as $data) {
                $html .=
                    '<option value="' .
                    $data->iuran_bulan .
                    '">' .
                    $data->iuran_bulan .
                    '</option>';
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
            $this->session->set_flashdata(
                'notif',
                'Mohon untuk di isi nomor Kartu Keluarga dan Pilih Bulan iuran'
            );
            redirect('auth/cekcetak');
        } else {
            $query = "SELECT tanggal_bayar, iuran_bulan, nominal_iuran, (SELECT nama FROM tbl_warga WHERE id=id_warga) as nama FROM tbl_iuran WHERE iuran_bulan LIKE '%$iuran_bulan%'";
            $runQuery = $this->db->query($query)->row();
            if ($runQuery == null) {
                $this->session->set_flashdata(
                    'notif',
                    'Terjadi kesalahan harap hubungi ketua RT'
                );
                redirect('auth/cekcetak');
            } else {
                $data = ['row' => $runQuery];
                $this->load->view('auth/cetak', $data);
            }
        }
    }
    public function upload_bukti()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Periksa apakah file berhasil diunggah
            if (
                isset($_FILES['gambar']) &&
                $_FILES['gambar']['error'] === UPLOAD_ERR_OK
            ) {
                $no_kk = $this->input->post('no_kk');
                $nama_file = $_FILES['gambar']['name'];
                $tmp_file = $_FILES['gambar']['tmp_name'];

                $tujuan = FCPATH . 'assets/bukti/' . rawurlencode($tmp_file);

                // Pindahkan file yang diunggah ke folder tujuan
                if (move_uploaded_file($tmp_file, $tujuan)) {
                    // File berhasil diunggah
                    // Lakukan operasi database sesuai kebutuhan (misalnya menyimpan data ke tabel)

                    // Convert no_kk to id
                    $warga = $this->crud_models->get_by_column(
                        'tbl_warga',
                        'nomor_nik_ktp',
                        $no_kk
                    );
                    if ($warga) {
                        $id_warga = $warga->id;

                        $data = [
                            'id_warga' => $id_warga,
                            'gambar' => rawurlencode($nama_file),
                        ];

                        $save = $this->crud_models->save('tbl_bukti', $data);
                        if ($save > 0) {
                            $this->session->set_flashdata(
                                'notif',
                                'File berhasil diunggah dan data berhasil disimpan.'
                            );
                        } else {
                            $this->session->set_flashdata(
                                'notif',
                                'File berhasil diunggah tetapi gagal menyimpan data.'
                            );
                        }
                    } else {
                        $this->session->set_flashdata(
                            'notif',
                            'ID Warga tidak valid.'
                        );
                    }

                    redirect('auth/cekcetak'); // Ganti redirect URL sesuai kebutuhan
                } else {
                    $this->session->set_flashdata(
                        'notif',
                        'Gagal mengunggah file.'
                    );
                }
            } else {
                $this->session->set_flashdata(
                    'notif',
                    'Terjadi kesalahan dalam unggah file.'
                );
            }
        }

        // ... (existing code)
    }
}
