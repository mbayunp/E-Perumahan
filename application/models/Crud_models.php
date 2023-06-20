<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Crud_models extends CI_Model
{
    function save($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    function view($select = null, $table = null, $where = null)
    {
        if ($select) {
            $this->db->select($select);
        }
        if ($where) {
            $this->db->where($where);
        }

        return $this->db->get($table);
    }

    function update($table = null, $data = null, $where = null)
    {
        return $this->db->where($where)->update($table, $data);
    }

    function delete($table = null, $where = null)
    {
        return $this->db->where($where)->delete($table);
    }

    function counter_number($table, $idtable)
    {
        $q = $this->db->query("SELECT MAX((" . $idtable . ")) AS idmax FROM " . $table . " where status_id = '1'");

        $kd = ""; //kode awal
        if ($q->num_rows() > 0) { //jika data ada
            foreach ($q->result() as $k) {
                $kd = ((int)$k->idmax) + 1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
            }
        } else { //jika data kosong diset ke kode awal
            $kd = "1";
        }
        return $kd;
    }
}