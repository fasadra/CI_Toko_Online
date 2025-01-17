<?php
class Invoice extends CI_Controller
{
    public function index()
    {
        // Ambil semua data invoice dari model
        $data['invoice'] = $this->model_invoice->tampil_data();

        // Load view dengan data
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail($id_invoice) // Tambahkan parameter $id_invoice
    {
        // Validasi apakah $id_invoice dikirim
        if (empty($id_invoice)) {
            show_error('ID Invoice tidak ditemukan', 404, 'Error');
        }

        // Ambil data berdasarkan ID Invoice
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

        // Load view dengan data
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }
}