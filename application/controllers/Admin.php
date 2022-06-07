<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('upload');
		$this->load->library('pdf');
		$this->load->helper('url');
		setlocale(LC_ALL, 'IND');
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jumlahsktm'] = $this->Desa_model->hitungsktm();
		$data['jumlahsklahir'] = $this->Desa_model->hitungsklahir();
		$data['jumlahskkematian'] = $this->Desa_model->hitungskkematian();
		$data['jumlahskpindah'] = $this->Desa_model->hitungskpindah();
		$data['jumlahbansos'] = $this->Desa_model->hitungbansos();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function cetaksktm()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sktm'] = $this->Desa_model->tampilsktm(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/cetaksurat/sktm', $data);
		$this->load->view('templates/footer');
	}

	function sktmselesai($id)
	{
		$data = array(
			"kondisi" => 1,
			"tglselesai_sktm" => strftime("%d %B %Y")
		);
		($this->Desa_model->edit_sktm($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Surat pengajuan sudah selesai</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	function sktmditolak($id)
	{
		$data = array(
			"kondisi" => 2,
			"tglselesai_sktm" => strftime("%d %B %Y")
		);
		($this->Desa_model->edit_sktm($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Surat pengajuan ditolak</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cetaksklahir()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sklahir'] = $this->Desa_model->tampilsklahir(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/cetaksurat/sklahir', $data);
		$this->load->view('templates/footer');
	}

	function sklahirselesai($id)
	{
		$data = array(
			"kondisi" => 1,
			"tglselesai_sklahir" => strftime("%d %B %Y")
		);
		($this->Desa_model->edit_sklahir($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Surat pengajuan sudah selesai</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	function sklahirditolak($id)
	{
		$data = array(
			"kondisi" => 2,
			"tglselesai_sklahir" => strftime("%d %B %Y")
		);
		($this->Desa_model->edit_sklahir($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Surat pengajuan ditolak</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cetakskkematian()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['skkematian'] = $this->Desa_model->tampilskkematian(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/cetaksurat/skkematian', $data);
		$this->load->view('templates/footer');
	}

	function skkematianselesai($id)
	{
		$data = array(
			"kondisi" => 1,
			"tglselesai_skkematian" => strftime("%d %B %Y")
		);
		($this->Desa_model->edit_skkematian($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Surat pengajuan sudah selesai</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	function skkematianditolak($id)
	{
		$data = array(
			"kondisi" => 2,
			"tglselesai_skkematian" => strftime("%d %B %Y")
		);
		($this->Desa_model->edit_skkematian($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Surat pengajuan ditolak</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cetakskpindah()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['skpindah'] = $this->Desa_model->tampilskpindah(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/cetaksurat/skpindah', $data);
		$this->load->view('templates/footer');
	}

	function skpindahselesai($id)
	{
		$data = array(
			"kondisi" => 1,
			"tglselesai_skpindah" => strftime("%d %B %Y")
		);
		($this->Desa_model->edit_skpindah($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Surat pengajuan sudah selesai</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	function skpindahditolak($id)
	{
		$data = array(
			"kondisi" => 2,
			"tglselesai_skpindah" => strftime("%d %B %Y")
		);
		($this->Desa_model->edit_skpindah($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Surat pengajuan ditolak</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function bansos()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['bansos'] = $this->Desa_model->tampilbantuan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/bansos/bansos', $data);
		$this->load->view('templates/footer');
	}

	function bansosditerima($id)
	{
		$data = array(
			"kondisi" => 1
		);
		($this->Desa_model->edit_bansos($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Persetujuan bantuan sosial diterima</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	function bansosditolak($id)
	{
		$data = array(
			"kondisi" => 2
		);
		($this->Desa_model->edit_bansos($id, $data));
		$this->session->set_flashdata("pesansurat", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Persetujuan bantuan sosial ditolak</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function laporanbansos()
	{
		$start_date = $this->input->get('tgl_mulai');
		$end_date = $this->input->get('tgl_akhir');
		$filtertgl = NULL;
		if (isset($start_date)) {
			$filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
		}

		$data['title'] = 'Laporan Bantuan Sosial';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tampilbansos'] = $this->Desa_model->tampilbansos($filtertgl);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/bansos', $data);
		$this->load->view('templates/footer');
	}

	public function laporansurat()
	{
		$data['title'] = 'Laporan Pembuatan Surat Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/surat', $data);
		$this->load->view('templates/footer');
	}

	public function laporansktm()
	{
		$start_date = $this->input->get('tgl_mulai');
		$end_date = $this->input->get('tgl_akhir');
		$filtertgl = NULL;
		if (isset($start_date)) {
			$filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
		}

		$data['title'] = 'Laporan Pembuatan Surat Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['laporansktm'] = $this->Desa_model->laporansktm($filtertgl);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/surat/laporansktm', $data);
		$this->load->view('templates/footer');
	}

	public function laporanskpindah()
	{
		$start_date = $this->input->get('tgl_mulai');
		$end_date = $this->input->get('tgl_akhir');
		$filtertgl = NULL;
		if (isset($start_date)) {
			$filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
		}

		$data['title'] = 'Laporan Pembuatan Surat Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['laporanskpindah'] = $this->Desa_model->laporanskpindah($filtertgl);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/surat/laporanskpindah', $data);
		$this->load->view('templates/footer');
	}

	public function laporansklahir()
	{
		$start_date = $this->input->get('tgl_mulai');
		$end_date = $this->input->get('tgl_akhir');
		$filtertgl = NULL;
		if (isset($start_date)) {
			$filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
		}

		$data['title'] = 'Laporan Pembuatan Surat Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['laporansklahir'] = $this->Desa_model->laporansklahir($filtertgl);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/surat/laporanskkelahiran', $data);
		$this->load->view('templates/footer');
	}

	public function laporanskkematian()
	{
		$start_date = $this->input->get('tgl_mulai');
		$end_date = $this->input->get('tgl_akhir');
		$filtertgl = NULL;
		if (isset($start_date)) {
			$filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
		}

		$data['title'] = 'Laporan Pembuatan Surat Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['laporanskkematian'] = $this->Desa_model->laporanskkematian($filtertgl);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/surat/laporanskkematian', $data);
		$this->load->view('templates/footer');
	}

	public function arsip()
	{
		$data['title'] = 'Arsip Surat Selesai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/arsip/arsip', $data);
		$this->load->view('templates/footer');
	}

	public function arsipsktm()
	{
		$data['title'] = 'Arsip Surat Selesai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sktm'] = $this->Desa_model->tampilarsipsktm(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/arsip/arsipsktm', $data);
		$this->load->view('templates/footer');
	}

	public function arsipsklahir()
	{
		$data['title'] = 'Arsip Surat Selesai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sklahir'] = $this->Desa_model->tampilarsipsklahir(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/arsip/arsipsklahir', $data);
		$this->load->view('templates/footer');
	}

	public function arsipskkematian()
	{
		$data['title'] = 'Arsip Surat Selesai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['skkematian'] = $this->Desa_model->tampilarsipskkematian(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/arsip/arsipskkematian', $data);
		$this->load->view('templates/footer');
	}

	public function arsipskpindah()
	{
		$data['title'] = 'Arsip Surat Selesai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['skpindah'] = $this->Desa_model->tampilarsipskpindah(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/arsip/arsipskpindah', $data);
		$this->load->view('templates/footer');
	}

	public function buatakun()
	{
		$data = array(
			'aksi'                 => site_url('admin/tambahakun'),
			'button'               => 'Tambah'
		);

		$data['title'] = 'Pembuatan Akun';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pekerjaan'] = $this->Desa_model->daftarpekerjaan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/tambahakun/tambahakun', $data);
		$this->load->view('templates/footer');
	}

	public function tambahakun()
	{
		$data = array(
			'name' => ucwords($this->input->post('name', true)),
			'email' => $this->input->post('email', true),
			'image' => 'def.jpg',
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'date_created' => time(),
			'nokk' => $this->input->post('nokk', true),
			'tmptlahir' => ucwords($this->input->post('tmptlahir', true)),
			'tanggallahir' => $this->input->post('tanggallahir', true),
			'alamat' => ucwords($this->input->post('alamat', true)),
			'jkelamin' => $this->input->post('jkelamin', true),
			'pekerjaan' => ucwords($this->input->post('pekerjaan', true)),
			'statuskeluarga' => ucwords($this->input->post('status', true)),
			'statuskawin' => ucwords($this->input->post('statuskawin', true)),
			'agama' => ucwords($this->input->post('agama', true))
		);
		$this->db->insert('user', $data);
		$this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Akun telah dibuat.</div>');
		redirect('admin/buatakun');


		redirect(site_url('user/pembelian'));
	}

	public function daftaruser()
	{
		$data['title'] = 'Pembuatan Akun';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['akun'] = $this->Desa_model->tampiluser(true);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/tambahakun/daftarakun', $data);
		$this->load->view('templates/footer');
	}
}
