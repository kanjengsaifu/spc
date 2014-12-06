<?php
class model_laporanshift extends CI_Model{
    function getlaporanshift(){
        return $this->db->get('laporanshift');
    }
}