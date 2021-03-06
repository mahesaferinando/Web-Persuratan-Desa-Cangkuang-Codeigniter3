<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules(
			'email',
			'Email',
			'trim|required',
			[
				'required' => 'NIK harus diisi'
			]
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required',
			[
				'required' => 'Kata sandi harus diisi'
			]
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		//cek keberadaan user
		if ($user) {
			//cek akivasi
			if ($user['is_active'] == 1) {
				//cek kata sandi
				if (password_verify($password, $user['password'])) {
					$data =
						[
							'email' => $user['email'],
							'role_id' => $user['role_id'],
						];
					$this->session->set_userdata($data);

					//cek role
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi salah! Silakan masukan lagi kata sandi lagi.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasi! Silakan aktivasi terlebih dahulu.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIK tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules(
			'name',
			'Name',
			'required|trim',
			[
				'required' => 'Nama harus diisi'
			]
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim',
			[
				'required' => 'NIK harus diisi',
			]
		);

		$this->form_validation->set_rules(
			'nokk',
			'Nokk',
			'required',
			[
				'required' => 'Nomor Kartu Keluarga harus diisi'
			]
		);

		$this->form_validation->set_rules(
			'tmptlahir',
			'Tmptlahir',
			'required',
			[
				'required' => 'Tempat dan Tanggal Lahir harus diisi'
			]
		);

		$this->form_validation->set_rules(
			'jkelamin',
			'Jkelamin',
			'required',
			[
				'required' => 'Jenis Kelamin harus diisi'
			]
		);

		$this->form_validation->set_rules(
			'alamat',
			'Alamat',
			'required',
			[
				'required' => 'Alamat harus diisi'
			]
		);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'required' => 'Kata sandi harus diisi',
			'matches' => 'Kata sandi tidak sama!',
			'min_length' => 'Kata sandi minimal 3 karakter'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman daftar akun';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => $this->input->post('email', true),
				'image' => 'def.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time(),
				'nokk' => $this->input->post('nokk', true),
				'tmptlahir' => $this->input->post('tmptlahir', true),
				'tanggallahir' => $this->input->post('tanggallahir', true),
				'alamat' => $this->input->post('alamat', true),
				'jkelamin' => $this->input->post('jkelamin', true)
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun telah dibuat, silakan masuk.</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Akun anda telah keluar.</div>');
		redirect('auth');
	}

	public function blokir()
	{
		$this->load->view('auth/blokir');
	}
}
