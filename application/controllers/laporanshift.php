<?php

class laporanshift extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_laporanshift');
//        check_session();
    }

    function index() {
//        $data['record'] = $this->model_laporanshift->getlaporanshift();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'index.php/laporanshift/index/';
        $config['total_rows'] = $this->model_laporanshift->getlaporanshift()->num_rows();
        $config['per_page'] = 3;
        $this->pagination->initialize($config);
        $data['paging'] = $this->pagination->create_links();
        $halaman = $this->uri->segment(3);
        $halaman = $halaman == '' ? 0 : $halaman;

        $data['record'] = $this->model_laporanshift->getlaporanshiftpaging($halaman, $config['per_page']);
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

    function search() {
        $data['tgl1'] = "";
        $data['tgl2'] = "";

        $posttgl1 = $this->input->post('tgl1');
        $posttgl2 = $this->input->post('tgl2');

        if (!empty($posttgl1) && !empty($posttgl2)) {
            $data['tgl1'] = $this->input->post('tgl1');
            $data['tgl2'] = $this->input->post('tgl2');
            $this->session->set_userdata('pencarian_tgl1', $data['tgl1']);
            $this->session->set_userdata('pencarian_tgl2', $data['tgl2']);
        } else {
            $data['tgl1'] = $this->session->userdata('pencarian_tgl1');
            $data['tgl2'] = $this->session->userdata('pencarian_tgl2');
        }

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'index.php/laporanshift/search/';
        $config['total_rows'] = $this->model_laporanshift->getlaporanshiftbydate($data['tgl1'], $data['tgl2'])->num_rows();
        $config['per_page'] = 3;
        $this->pagination->initialize($config);
        $data['paging'] = $this->pagination->create_links();
        $halaman = $this->uri->segment(3);
        $halaman = $halaman == '' ? 0 : $halaman;

        if (isset($_POST['submit'])) {
            $data['record'] = $this->model_laporanshift->getlaporanshiftbydatepaging($data['tgl1'], $data['tgl2'], $halaman, $config['per_page']);
            $this->template->load('template', 'laporanshift/lihatdata', $data);
        } else {
            $data['record'] = $this->model_laporanshift->getlaporanshiftbydatepaging($data['tgl1'], $data['tgl2'], $halaman, $config['per_page']);
            $this->template->load('template', 'laporanshift/lihatdata', $data);
        }
    }

    function excel() {
        header("content-type=application/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporanshift.xls");
        $data['record'] = $this->model_laporanshift->getlaporanshift();
        $this->load->view('laporanshift/lihatdata_excel', $data);
    }

    function pdf() {
        $this->load->library('cfpdf');
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(20);
        $pdf->Text(115, 10, 'Laporan Shift Produksi');
        $pdf->Cell(10, 7, '', '', 1);

        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(10);
        $pdf->Cell(8, 7, 'No', 1, 0);
        $pdf->Cell(27, 7, 'Tanggal', 1, 0);
        $pdf->Cell(10, 7, 'Shift', 1, 0);
        $pdf->Cell(10, 7, 'Line', 1, 0);
        $pdf->Cell(45, 7, 'Motif', 1, 0);
        $pdf->Cell(15, 7, 'KW1S', 1, 0);
        $pdf->Cell(15, 7, 'KW1M', 1, 0);
        $pdf->Cell(15, 7, 'KW1L', 1, 0);
        $pdf->Cell(25, 7, 'RndKW1(%)', 1, 0);
        $pdf->Cell(15, 7, 'KW2S', 1, 0);
        $pdf->Cell(15, 7, 'KW2M', 1, 0);
        $pdf->Cell(15, 7, 'KW2L', 1, 0);
        $pdf->Cell(25, 7, 'RndKW2(%)', 1, 0);
        $pdf->Cell(15, 7, 'Reject', 1, 0);
        $pdf->Cell(25, 7, 'RndRjct(%)', 1, 1);

        $data = $this->model_laporanshift->getlaporanshift();
        $no = 1;
        $totalkw1s = 0;
        $totalkw1m = 0;
        $totalkw1l = 0;
        $totalrendkw1 = 0;
        $totalkw2s = 0;
        $totalkw2m = 0;
        $totalkw2l = 0;
        $totalrendkw2 = 0;
        $totalreject = 0;
        $totalrendreject = 0;

        foreach ($data->result() as $r) {
            $pdf->Cell(8, 7, $no, 1, 0);
            $pdf->Cell(27, 7, $r->tgllaporanshift, 1, 0);
            $pdf->Cell(10, 7, $r->shift, 1, 0);
            $pdf->Cell(10, 7, $r->line, 1, 0);
            $pdf->Cell(45, 7, $r->motif, 1, 0);
            $pdf->Cell(15, 7, $r->kw1s, 1, 0);
            $pdf->Cell(15, 7, $r->kw1m, 1, 0);
            $pdf->Cell(15, 7, $r->kw1l, 1, 0);
            $pdf->Cell(25, 7, $r->rendkw1, 1, 0);
            $pdf->Cell(15, 7, $r->kw2s, 1, 0);
            $pdf->Cell(15, 7, $r->kw2m, 1, 0);
            $pdf->Cell(15, 7, $r->kw2l, 1, 0);
            $pdf->Cell(25, 7, $r->rendkw2, 1, 0);
            $pdf->Cell(15, 7, $r->reject, 1, 0);
            $pdf->Cell(25, 7, $r->rendreject, 1, 1);
            $totalkw1s = $totalkw1s + $r->kw1s;
            $totalkw1m = $totalkw1m + $r->kw1m;
            $totalkw1l = $totalkw1l + $r->kw1l;
            $totalrendkw1 = $totalrendkw1 + $r->rendkw1;
            $totalkw2s = $totalkw2s + $r->kw2s;
            $totalkw2m = $totalkw2m + $r->kw2m;
            $totalkw2l = $totalkw2l + $r->kw2l;
            $totalrendkw2 = $totalrendkw2 + $r->rendkw2;
            $totalreject = $totalreject + $r->reject;
            $totalrendreject = $totalrendreject + $r->rendreject;
            $no++;
        }
        $pdf->Cell(100, 7, 'Total', 1, 0);
        $pdf->Cell(15, 7, $totalkw1s, 1, 0);
        $pdf->Cell(15, 7, $totalkw1m, 1, 0);
        $pdf->Cell(15, 7, $totalkw1l, 1, 0);
        $pdf->Cell(25, 7, $totalrendkw1, 1, 0);
        $pdf->Cell(15, 7, $totalkw2s, 1, 0);
        $pdf->Cell(15, 7, $totalkw2m, 1, 0);
        $pdf->Cell(15, 7, $totalkw2l, 1, 0);
        $pdf->Cell(25, 7, $totalrendkw2, 1, 0);
        $pdf->Cell(15, 7, $totalreject, 1, 0);
        $pdf->Cell(25, 7, $totalrendreject, 1, 1);

        $pdf->Output();
    }

    function edit() {
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
                $idlaporanshift = $this->input->post('idlaporanshift', true);
                $this->db->where('idlaporanshift', $idlaporanshift);
                $this->db->update('laporanshift', $data);
                redirect('laporanshift');
            } else {
                $id = $this->uri->segment(3);
                $data['record'] = $this->model_laporanshift->getlaporanshiftbyid($id)->row_array();
                $this->template->load('template', 'laporanshift/editdata', $data);
            }
        } else {
            $id = $this->uri->segment(3);
            $data['record'] = $this->model_laporanshift->getlaporanshiftbyid($id)->row_array();
            $this->template->load('template', 'laporanshift/editdata', $data);
        }
    }

}
