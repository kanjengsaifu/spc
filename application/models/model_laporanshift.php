<?php
class model_laporanshift extends CI_Model{
    function getlaporanshift(){
        return $this->db->get('laporanshift');
    }
    
    function deletelaporanshift($id){
        $this->db->where('idlaporanshift', $id);
        $this->db->delete('laporanshift');
    }
    
    function laporanbydate(){
        $query="";
        return $this->db->query($query);
    }
}