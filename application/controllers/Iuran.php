<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iuran extends CI_Controller
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
        $data['nominalIuran'] = $this->crud_models
            ->view('nama', 'tbl_setting', ['type' => 'nominal_iuran'])
            ->row()->nama;
        $this->load->view('iuran/index', $data);
    }

    function tabel()
    {
        $data['iuran'] = $this->crud_models
            ->view(null, 'tbl_iuran', null)
            ->result();
        $this->load->view('iuran/tabel', $data);
    }

    function add()
    {
        $post = $this->input->post(null, true);
        $id = null;
        $type_save = $post['type_save'];

        $nominalIuran = $this->crud_models
            ->view('nama', 'tbl_setting', ['type' => 'nominal_iuran'])
            ->row()->nama;
        $iuranBulan = $post['iuran_bulan'];
        $idWarga = $post['id_warga'];

        $data = [
            'id_warga' => $post['id_warga'],
            'iuran_bulan' => $iuranBulan,
            'nominal_iuran' => $nominalIuran,
            'status' => $post['status'],
        ];

        $add = [
            // 'tanggal' => date('Y-m-d'),
            'adddate' => date('Y-m-d H:i:s'),
            'tanggal_bayar' => date('Y-m-d H:i:s'),
        ];
        $upd = [
            'upddate' => date('Y-m-d H:i:s'),
        ];
        $queryCekIuran = "select id_warga,iuran_bulan from tbl_iuran where iuran_bulan='$iuranBulan' and id_warga='$idWarga'";
        $cekIuran = $this->db->query($queryCekIuran)->row();
        if ($type_save == 'add') {
            $dataNya = array_merge($data, $add);
            if (empty($cekIuran)) {
                $save = $this->crud_models->save('tbl_iuran', $dataNya);
            } else {
                $save = 2;
            }
        } elseif ($type_save == 'edit') {
            $id = $post['id'];
            $dataNya = array_merge($data, $upd);
            // $cekSendiri = $this->db->select('id_warga')->where(['id_warga'=> $id])->get('tbl_iuran')->row();
            $save = $this->crud_models->update('tbl_iuran', $dataNya, [
                'id' => $id,
            ]);
        }

        if ($save == 1) {
            $massage = ['status' => true];
        } elseif ($save == 2) {
            $massage = ['status' => '2'];
        } else {
            $massage = ['status' => false];
        }
        echo json_encode($massage);
    }

    function edit($id)
    {
        $data = $this->crud_models
            ->view(null, 'tbl_iuran', ['id' => $id])
            ->row();
        echo json_encode($data);
    }
}
