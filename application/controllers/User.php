<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Desa_model');
		$this->load->library('upload');
		$this->load->helper('url');
		setlocale(LC_ALL, 'IND');
	}

	public function index()
	{
		$data['title'] = 'Profil Akun';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profil';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//cek gambar jika akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profil/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'def.jpg') {
						unlink(FCPATH . 'assets/img/profil/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Anda telah diperbarui.</div>');
			redirect('user');
		}
	}


	public function gantiKataSandi()
	{
		$data['title'] = 'Ganti Kata Sandi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		//rules kata sandi
		$this->form_validation->set_rules('current_password', 'Kata Sandi saat ini', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'Kata Sandi baru', 'required|trim|min_length[3]|matches[new_password2]', [
			'required' => 'Kata sandi harus diisi',
			'matches' => 'Kata sandi tidak sama!',
			'min_length' => 'Kata sandi minimal 3 karakter'
		]);
		$this->form_validation->set_rules('new_password2', 'Ulangi Kata Sandi baru', 'required|trim|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/gantikatasandi', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				//cek kata sandi saat ini
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi saat ini salah</div>');
				redirect('user/gantikatasandi');
			} else {
				if ($current_password == $new_password) {
					//cek kata sandi tidak boleh sama dengan kata sandi lama
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi tidak boleh sama</div>');
					redirect('user/gantikatasandi');
				} else {
					//password berhasil dirubah
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi berhasil diubah</div>');
					redirect('user/gantikatasandi');
				}
			}
		}
	}

	public function permohonansurat()
	{
		$data['title'] = 'Permohonan Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/permohonansurat', $data);
		$this->load->view('templates/footer');
	}

	public function sktm()
	{
		$data = array(
			'aksi'                 => site_url('user/sktmtambah'),
			'button'               => 'Tambah'
		);
		$data['title'] = 'Permohonan Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pekerjaan'] = $this->Desa_model->daftarpekerjaan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/surat/sktm', $data);
		$this->load->view('templates/footer');
	}

	public function sktmtambah()
	{
		$this->load->library('upload');
		$nmfile = "" . time();
		$config['upload_path'] = './assets/upload/sktm/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '10240';
		// $config['max_width']  = '100000';
		// $config['max_height']  = '100000';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);


		if (!empty($_FILES['berkas'])) {
			if ($this->upload->do_upload('berkas')) {
				$gbr = $this->upload->data();
				$data = array(
					'berkas'                 	=> $gbr['file_name'],
					'id_user'					=> $this->input->post('id_user'),
					'nama_pengaju'				=> ucwords($this->input->post('nama_pengaju')),
					'nik_pengaju'				=> $this->input->post('nik_pengaju'),
					'tl_pengaju'				=> ucwords($this->input->post('tl_pengaju')),
					'tanggallahir_pengaju'		=> $this->input->post('tanggallahir_pengaju'),
					'jk'						=> ucwords($this->input->post('jk')),
					'agama'						=> ucwords($this->input->post('agama')),
					'status'					=> ucwords($this->input->post('status')),
					'pekerjaan'					=> ucwords($this->input->post('pekerjaan')),
					'alamat'					=> ucwords($this->input->post('alamat')),
					'nama_pemohon'				=> ucwords($this->input->post('nama_pemohon')),
					'tl_pemohon'				=> ucwords($this->input->post('tl_pemohon')),
					'tgllahir_pemohon'			=> $this->input->post('tgllahir_pemohon'),
					'alasansktm'				=> $this->input->post('alasansktm'),
					'jenissurat'				=> ucwords($this->input->post('jenissurat'))
				);
				$this->Desa_model->tambahsktm($data, $this->input->post('id'));
				$this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Surat Pengajuan sudah dibuat. Mohon untuk cek halaman Status Pengajuan Surat secara berkala sebelum mengambil surat pengajuan di kantor Desa.</div>');
				redirect('user/permohonansurat');
			} else {
				$this->session->set_flashdata("pesan1", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Unggah foto gagal. Mohon unggah foto KTP dengan format JPG, JPEG, PNG dan ukuran tidak melebihi 4 MB</div></div>");
				redirect('user/permohonansurat');
			}
		}
	}

	public function skkelahiran()
	{
		$data = array(
			'aksi'                 => site_url('user/sklahirtambah'),
			'button'               => 'Tambah'
		);
		$data['title'] = 'Permohonan Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pekerjaan'] = $this->Desa_model->daftarpekerjaan();
		$data['ibu'] = $this->Desa_model->datasklahiribu($data['user']['nokk']);
		$data['ayah'] = $this->Desa_model->datasklahirayah($data['user']['nokk']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/surat/skkelahiran', $data);
		$this->load->view('templates/footer');
	}

	public function sklahirtambah()
	{
		$this->load->library('upload');
		$nmfile = "" . time();
		$config['upload_path'] = './assets/upload/skkelahiran/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '10240';
		// $config['max_width']  = '10000';
		// $config['max_height']  = '10000';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);


		if (!empty($_FILES['berkas'])) {
			if ($this->upload->do_upload('berkas')) {
				$gbr = $this->upload->data();
				$data = array(
					'berkas'            => $gbr['file_name'],
					'id_user'			=> $this->input->post('id_user'),
					'nama_anak'			=> ucwords($this->input->post('nama_anak')),
					'hari_lahir'		=> ucwords($this->input->post('hari_lahir')),
					'tl_anak'			=> ucwords($this->input->post('tl_anak')),
					'tgl_anak'			=> $this->input->post('tgl_anak'),
					'jam'				=> $this->input->post('jam'),
					'agama_anak'		=> ucwords($this->input->post('agama_anak')),
					'jk'				=> ucwords($this->input->post('jk')),
					'anakke'			=> $this->input->post('anakke'),
					'nama_ibu'			=> ucwords($this->input->post('nama_ibu')),
					'tl_ibu'			=> ucwords($this->input->post('tl_ibu')),
					'tgl_ibu'			=> $this->input->post('tgl_ibu'),
					'agama_ibu'			=> ucwords($this->input->post('agama_ibu')),
					'pekerjaan_ibu'		=> ucwords($this->input->post('pekerjaan_ibu')),
					'nama_ayah'			=> ucwords($this->input->post('nama_ayah')),
					'tl_ayah'			=> ucwords($this->input->post('tl_ayah')),
					'tgl_ayah'			=> $this->input->post('tgl_ayah'),
					'agama_ayah'		=> ucwords($this->input->post('agama_ayah')),
					'pekerjaan_ayah'	=> ucwords($this->input->post('pekerjaan_ayah')),
					'alamat'			=> ucwords($this->input->post('alamat')),
					'jenissurat'		=> ucwords($this->input->post('jenissurat'))
				);
				$this->Desa_model->tambahsklahir($data, $this->input->post('id'));
				$this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Surat Pengajuan sudah dibuat.  Mohon untuk cek halaman Status Pengajuan Surat secara berkala sebelum mengambil surat pengajuan di kantor Desa.</div>');
				redirect('user/permohonansurat');
			} else {
				$this->session->set_flashdata("pesan1", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Unggah foto gagal. Mohon unggah persyaratan dengan format PDF dan ukuran tidak melebihi 10 MB</div></div>");
				redirect('user/permohonansurat');
			}
		}
	}

	public function skkematian()
	{
		$data = array(
			'aksi'                 => site_url('user/skkematiantambah'),
			'button'               => 'Tambah'
		);
		$data['title'] = 'Permohonan Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pekerjaan'] = $this->Desa_model->daftarpekerjaan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/surat/skkematian', $data);
		$this->load->view('templates/footer');
	}

	public function skkematiantambah()
	{
		$this->load->library('upload');
		$nmfile = "" . time();
		$config['upload_path'] = './assets/upload/skkematian/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '4096';
		// $config['max_width']  = '100000';
		// $config['max_height']  = '100000';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);


		if (!empty($_FILES['berkas'])) {
			if ($this->upload->do_upload('berkas')) {
				$gbr = $this->upload->data();
				$data = array(
					'berkas'           => $gbr['file_name'],
					'id_user'		=> $this->input->post('id_user'),
					'nama'			=> ucwords($this->input->post('nama')),
					'tl'			=> ucwords($this->input->post('tl')),
					'tgl_lahir'		=> $this->input->post('tgl_lahir'),
					'jk'			=> ucwords($this->input->post('jk')),
					'agama'			=> ucwords($this->input->post('agama')),
					'tgl_kematian'	=> $this->input->post('tgl_kematian'),
					'hari'			=> ucwords($this->input->post('hari')),
					'tmpt_kematian'	=> ucwords($this->input->post('tmpt_kematian')),
					'jam'			=> $this->input->post('jam'),
					'alamat'		=> ucwords($this->input->post('alamat')),
					'penyebab'		=> ucwords($this->input->post('penyebab')),
					'jenissurat'		=> ucwords($this->input->post('jenissurat'))

				);
				$this->Desa_model->tambahskkematian($data);
				$this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Surat Pengajuan sudah dibuat.  Mohon untuk cek halaman Status Pengajuan Surat secara berkala sebelum mengambil surat pengajuan di kantor Desa.</div>');
				redirect('user/permohonansurat');
			} else {
				$this->session->set_flashdata("pesan1", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Unggah foto gagal. Mohon unggah foto KTP dengan format JPG, JPEG, PNG dan ukuran tidak melebihi 4 MB</div></div>");
				redirect('user/permohonansurat');
			}
		}
	}

	public function skpindah()
	{
		$data = array(
			'aksi'                 => site_url('user/skpindahtambah'),
			'button'               => 'Tambah'
		);
		$data['title'] = 'Permohonan Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pekerjaan'] = $this->Desa_model->daftarpekerjaan();
		$data['anggota'] = $this->Desa_model->anggota($data['user']['nokk']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/surat/skpindah', $data);
		$this->load->view('templates/footer');
	}

	public function skpindahtambah()
	{
		$this->load->library('upload');
		$nmfile = "" . time();
		$config['upload_path'] = './assets/upload/skpindah/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '10240';
		// $config['max_width']  = '10000';
		// $config['max_height']  = '10000';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);


		if (!empty($_FILES['berkas'])) {
			if ($this->upload->do_upload('berkas')) {
				$gbr = $this->upload->data();
				$data = array(
					'berkas'            => $gbr['file_name'],
					'id_user'			=> $this->input->post('id_user'),
					'namapengaju'		=> ucwords($this->input->post('namapengaju')),
					'nokk'				=> ucwords($this->input->post('nokk')),
					'nik_pengaju'		=> $this->input->post('nik_pengaju'),
					'tl_pengaju'		=> ucwords($this->input->post('tl_pengaju')),
					'tgl_pengaju'		=> $this->input->post('tgl_pengaju'),
					'pekerjaan'			=> ucwords($this->input->post('pekerjaan')),
					'status'			=> ucwords($this->input->post('status')),
					'nama_ibu'			=> ucwords($this->input->post('nama_ibu')),
					'nama_ayah'			=> ucwords($this->input->post('nama_ayah')),
					'pendidikan'		=> ucwords($this->input->post('pendidikan')),
					'alamat_asal'		=> ucwords($this->input->post('alamat_asal')),
					'pindahke'			=> ucwords($this->input->post('pindahke')),
					'kodepos'			=> $this->input->post('kodepos'),
					'alasan'			=> ucwords($this->input->post('alasan')),
					'namapengikut1'		=> ucwords($this->input->post('namapengikut1')),
					'nikpengikut1'		=> $this->input->post('nikpengikut1'),
					'jkpengikut1'		=> ucwords($this->input->post('jkpengikut1')),
					'hubpengikut1'		=> ucwords($this->input->post('hubpengikut1')),
					'namapengikut2'		=> ucwords($this->input->post('namapengikut2')),
					'nikpengikut2'		=> $this->input->post('nikpengikut2'),
					'jkpengikut2'		=> ucwords($this->input->post('jkpengikut2')),
					'hubpengikut2'		=> ucwords($this->input->post('hubpengikut2')),
					'namapengikut3'		=> ucwords($this->input->post('namapengikut3')),
					'nikpengikut3'		=> $this->input->post('nikpengikut3'),
					'jkpengikut3'		=> ucwords($this->input->post('jkpengikut3')),
					'hubpengikut3'		=> ucwords($this->input->post('hubpengikut3')),
					'namapengikut4'		=> ucwords($this->input->post('namapengikut4')),
					'nikpengikut4'		=> $this->input->post('nikpengikut4'),
					'jkpengikut4'		=> ucwords($this->input->post('jkpengikut4')),
					'hubpengikut4'		=> ucwords($this->input->post('hubpengikut4')),
					'namapengikut5'		=> ucwords($this->input->post('namapengikut5')),
					'nikpengikut5'		=> $this->input->post('nikpengikut5'),
					'jkpengikut5'		=> ucwords($this->input->post('jkpengikut5')),
					'hubpengikut5'		=> ucwords($this->input->post('hubpengikut5')),
					'jenissurat'		=> ucwords($this->input->post('jenissurat'))
				);
				$this->Desa_model->tambahskpindah($data, $this->input->post('id'));
				$this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Surat Pengajuan sudah dibuat.  Mohon untuk cek halaman Status Pengajuan Surat secara berkala sebelum mengambil surat pengajuan di kantor Desa.</div>');
				redirect('user/permohonansurat');
			} else {
				$this->session->set_flashdata("pesan1", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Unggah foto gagal. Mohon unggah foto persyaratan dengan format PDF dan ukuran tidak melebihi 10 MB</div></div>");
				redirect('user/permohonansurat');
			}
		}
	}

	public function bantuan()
	{
		$data = array(
			'aksi'                 => site_url('user/bantuantambah'),
			'button'               => 'Tambah'
		);
		$data['title'] = 'Pendaftaran Bantuan Sosial';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pekerjaan'] = $this->Desa_model->daftarpekerjaan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/bantuan/bantuan', $data);
		$this->load->view('templates/footer');
	}

	public function bantuantambah()
	{
		$this->load->library('upload');
		$nmfile = "" . time();
		$config['upload_path'] = './assets/upload/bantuan/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '10240';
		// $config['max_width']  = '100000';
		// $config['max_height']  = '100000';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);


		if (!empty($_FILES['berkas'])) {
			if ($this->upload->do_upload('berkas')) {
				$gbr = $this->upload->data();
				$data = array(
					'berkas'         	=> $gbr['file_name'],
					'id_user'			=> $this->input->post('id_user'),
					'nama'				=> ucwords($this->input->post('nama')),
					'nik'				=> $this->input->post('nik'),
					'nokk'				=> $this->input->post('nokk'),
					'pekerjaan'			=> ucwords($this->input->post('pekerjaan')),
					'tgl_lahir'			=> $this->input->post('tgl_lahir'),
					'jenisbansos'		=> $this->input->post('jenisbansos'),
					'alamat'			=> ucwords($this->input->post('alamat')),
					'alasanbansos'		=> $this->input->post('alasanbansos')
				);
				$this->Desa_model->tambahbansos($data, $this->input->post('id'));
				$this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Pendaftaran bantuan sosial telah berhasil. Mohon untuk cek halaman Status Pengajuan Bantuan Sosial secara berkala untuk mengetahui status persetujuan bantuan sosial</div>');
				redirect('user/permohonansurat');
			} else {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Unggah foto gagal. Mohon unggah persyaratan dengan format PDF dan ukuran tidak melebihi 10 MB</div></div>");
				redirect('user/permohonansurat');
			}
		}
	}

	public function statussurat()
	{
		$data['title'] = 'Status Pengajuan Surat & Bantuan Sosial';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/status/statussurat', $data);
		$this->load->view('templates/footer');
	}

	public function statussktm($id)
	{
		$data['title'] = 'Status Pengajuan Surat & Bantuan Sosial';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status'] = $this->Desa_model->statussuratsktm($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/status/statussktm', $data);
		$this->load->view('templates/footer');
	}


	public function statussklahir($id)
	{
		$data['title'] = 'Status Pengajuan Surat & Bantuan Sosial';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status'] = $this->Desa_model->statussuratsklahir($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/status/statussklahir', $data);
		$this->load->view('templates/footer');
	}


	public function statusskkematian($id)
	{
		$data['title'] = 'Status Pengajuan Surat & Bantuan Sosial';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status'] = $this->Desa_model->statussuratskkematian($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/status/statusskkematian', $data);
		$this->load->view('templates/footer');
	}


	public function statusskpindah($id)
	{
		$data['title'] = 'Status Pengajuan Surat & Bantuan Sosial';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status'] = $this->Desa_model->statussuratskpindah($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/status/statusskpindah', $data);
		$this->load->view('templates/footer');
	}

	public function statusbansos($id)
	{
		$data['title'] = 'Status Pengajuan Surat & Bantuan Sosial';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status'] = $this->Desa_model->statusbansos($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/status/statusbansos', $data);
		$this->load->view('templates/footer');
	}
}
