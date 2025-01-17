<?php 

class Registrasi extends CI_Controller {

    public function index()
    {
        // Validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama wajib diisi!']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]', ['required' => 'Password wajib diisi!', 'matches' => 'Password tidak cocok!']);
        $this->form_validation->set_rules('password_2', 'Konfirmasi Password', 'required|matches[password_1]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke halaman registrasi
            $this->load->view('templates/header');
            $this->load->view('registrasi');
            $this->load->view('templates/footer');
        } else {
            // Jika validasi berhasil, simpan data ke database tanpa hashing
            $data = array(
                'id'        => '', // ID akan otomatis terisi jika menggunakan AUTO_INCREMENT di database
                'nama'      => $this->input->post('nama'),
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password_1'), // Simpan password secara langsung
                'role_id'   => 2, // Role default untuk pengguna biasa
            );

            $this->db->insert('tb_user', $data); // Masukkan data ke tabel tb_user
            redirect('auth/login'); // Arahkan ke halaman login
        }
    }
}