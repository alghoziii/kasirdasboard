<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('pengguna')->row();
	}

	public function getUser($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('pengguna');
	}

	public function getToko()
	{
		$this->db->select('nama, alamat');
		return $this->db->get('toko')->row();
	}

	public function registerUser($data)
	{
		// Masukkan data registrasi ke dalam tabel pengguna
		$this->db->insert('pengguna', $data);

		// Periksa apakah proses penyisipan berhasil
		return $this->db->affected_rows() > 0;
	}
}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
