<?php

class laporanshift extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_laporanshift');
    }

    function index() {
        $data['record'] = $this->model_laporanshift->getlaporanshift();
//        $this->load->view('laporanshift/lihatdata', $data);
        $this->template->load('template', 'laporanshift/lihatdata', $data);
    }

    function post() {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('tgllaporanshift', 'Tgllaporanshift', 'trim|required');
            $this->form_validation->set_rules('shift', 'Shift', 'trim|required|numeric');
            $this->form_validation->set_rules('line', 'Line', 'trim|required|numeric');
            $this->form_validation->set_rules('motif', 'Motif', 'trim|required|min_length[1]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('kw1s', 'Kw1s', 'trim|required|numeric');
            $this->form_validation->set_rules('kw1m', 'Kw1m', 'trim|required|numeric');
            $this->form_validation->set_rules('kw1l', 'Kw1l', 'trim|required|numeric');
            $this->form_validation->set_rules('kw2s', 'Kw2s', 'trim|required|numeric');
            $this->form_validation->set_rules('kw2m', 'Kw2m', 'trim|required|numeric');
            $this->form_validation->set_rules('kw2l', 'Kw2l', 'trim|required|numeric');

            $tgllaporanshift = $this->input->post('tgllaporanshift', true);
            $shift = $this->input->post('shift', true);
            $line = $this->input->post('line', true);
            $motif = $this->input->post('motif', true);
            $kw1s = $this->input->post('kw1s', true);
            $kw1m = $this->input->post('kw1m', true);
            $kw1l = $this->input->post('kw1l', true);
            $rendkw1 = $this->input->post('rendkw1', true);
            $kw2s = $this->input->post('kw2s', true);
            $kw2m = $this->input->post('kw2m', true);
            $kw2l = $this->input->post('kw2l', true);
            $rendkw2 = $this->input->post('rendkw2', true);
            $reject = $this->input->post('reject', true);
            $rendreject = $this->input->post('rendreject', true);
            $data = array(
                'tgllaporanshift' => $tgllaporanshift,
                'shift' => $shift,
                'line' => $line,
                'motif' => $motif,
                'kw1s' => $kw1s,
                'kw1m' => $kw1m,
                'kw1l' => $kw1l,
                'rendkw1' => $rendkw1,
                'kw2s' => $kw2s,
                'kw2m' => $kw2m,
                'kw2l' => $kw2l,
                'rendkw2' => $rendkw2,
                'reject' => $reject,
                'rendreject' => $rendreject
            );
//             die($tgllaporanshift);
            if ($this->form_validation->run() == TRUE) {
                $this->db->insert('laporanshift', $data);
                redirect('laporanshift');
            } else {
                $this->template->load('template', 'laporanshift/inputdata');
            }
        } else {
//            $this->load->view('laporanshift/inputdata');
            $this->template->load('template', 'laporanshift/inputdata');
        }
    }

    function delete() {
        $id = $this->uri->segment(3);
        $this->model_laporanshift->deletelaporanshift($id);
        redirect('laporanshift');
    }

    function laporan() {
        $data['record']=  $this->model_laporanshift->laporanbydate();
        $this->template->load('template', 'laporanshift/laporan', $data);
    
        
    }

}
