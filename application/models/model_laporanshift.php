<?php

class model_laporanshift extends CI_Model {

    function getlaporanshift() {
        return $this->db->get('laporanshift');
    }

    function getlaporanshiftpaging($halaman, $batas) {
        $query = "SELECT * FROM laporanshift LIMIT $halaman,$batas";
        return $this->db->query($query);
    }

    function getlaporanshiftbyid($id) {
        $param = array('idlaporanshift' => $id);
        return $this->db->get_where('laporanshift', $param);
    }

    function deletelaporanshift($id) {
        $this->db->where('idlaporanshift', $id);
        $this->db->delete('laporanshift');
    }

    function getlaporanshiftbydate($tgl1, $tgl2) {
        $query = "SELECT * FROM laporanshift WHERE tgllaporanshift BETWEEN '$tgl1' and '$tgl2'";
        return $this->db->query($query);
    }

    function getlaporanshiftbydatepaging($tgl1, $tgl2, $halaman, $batas) {
        $query = "SELECT * FROM laporanshift WHERE tgllaporanshift BETWEEN '$tgl1' and '$tgl2' LIMIT $halaman,$batas";
        return $this->db->query($query);
    }

}
