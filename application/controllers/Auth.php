<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function login()
	{
		if ($this->session->userdata('status') !== 'login') {
			if ($this->input->post('username')) {
				$username = $this->input->post('username');
				if ($this->auth_model->getUser($username)->num_rows() > 0) {
					$data = $this->auth_model->getUser($username)->row();
					$toko = $this->auth_model->getToko();
					if (password_verify($this->input->post('password'), $data->password)) {
						$userdata = array(
							'id' => $data->id,
							'username' => $data->username,
							'password' => $data->password,
							'status' => 'login',
							'toko' => $toko
						);
						$this->session->set_userdata($userdata);
						echo json_encode('sukses');
					} else {
						echo json_encode('passwordsalah');
					}
				} else {
					echo json_encode('tidakada');
				}
			} else {
				$this->load->view('login');
			}
		} else {
			redirect('/');
		}
	}


	public function register()
	{
		// Pastikan pengguna belum login
		if ($this->session->userdata('status') !== 'login') {
			// Pastikan ada data yang dikirimkan melalui POST
			if ($this->input->post('username')) {
				$username = $this->input->post('username');

				// Periksa apakah username sudah ada di database
				if ($this->auth_model->getUser($username)->num_rows() > 0) {
					echo json_encode('user_exists');
				} else {
					// Jika username belum ada, lakukan proses registrasi
					$data = array(
						'username' => $username,
						'email' => $this->input->post('email'),
						'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT), // Enkripsi password
						'notelpn' => $this->input->post('notelpn'),

					);

					// Panggil model untuk menyimpan data registrasi ke dalam database
					$registration_result = $this->auth_model->registerUser($data);

					if ($registration_result) {
						// Registrasi sukses, atur flash data
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="margin-top: 0px; background-color: #298a67; color: #fff;">Registrasi Berhasil</div>');
					} else {
						// Registrasi gagal, atur flash data
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="margin-top: 10px;">Registrasi Gagal. Silakan coba lagi.</div>');
					}

					// Redirect kembali ke halaman register
					redirect('register');
				}
			} else {
				// Jika tidak ada data POST, tampilkan halaman registrasi
				$this->load->view('register'); // Gantilah dengan view yang sesuai
			}
		} else {
			// Jika pengguna sudah login, redirect ke halaman utama
			redirect('/');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */