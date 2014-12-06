<?php

class auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
    }

    function login() {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hasil = $this->model_operator->login($username, $password);
            if ($hasil == 1) {
                //update last login
                $this->db->where('username', $username);
                $this->db->update('operator', array('lastlogin' => date('Y-m-d')));
                $this->session->set_userdata(array('status_login' => 'oke'));
                redirect('dashboard');
            } else {
                redirect('auth/login');
            }
        } else {
            $this->load->view('form_login');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

}
