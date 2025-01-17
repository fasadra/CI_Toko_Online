<?php

class Dashboard_admin extends CI_Controller{
    public function __construct(){
        parent::__construct();

        // Check if user is logged in and has the role_id of 1 (Admin)
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('auth/login');  // Make sure this path is correct for your login page
        }
    }

    public function index(){
        // Load views for the admin dashboard
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
}
?>