<?php

class Cetaksurat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Desa_model');
        $this->load->helper(array('url'));
        $this->load->helper('date');
        date_default_timezone_set("Asia/Jakarta");
        setlocale(LC_TIME, 'id_ID.utf8');
    }

    function laporansktm()
    {
        $start_date = $this->input->get('tgl_mulai');
        $end_date = $this->input->get('tgl_akhir');
        $filtertgl = NULL;
        if (isset($start_date)) {
            $filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
        }

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        // $pdf->SetFont('Arial', '', 12);
        // $pdf->SetX(135);
        // $pdf->Cell(0, 0, 'Cangkuang,', 0, 1, 'L');
        // $pdf->SetX(160);
        // $pdf->Cell(0, 0, strftime('%d %B %Y'), 0, 1, 'L');
        $pdf->Ln(7);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(200, 7, 'Laporan Pembuatan Surat SKTM', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Berikut ini merupakan laporan daftar warga dalam pembuatan Surat Keterangan Tidak Mampu - Rumah Sakit :', 0, 'J');
        $pdf->Ln(4);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(20);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(55, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(70, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(10, 6, '', 0, 1);

        $sktm = ($this->Desa_model->cetaklaporansktm(1, $filtertgl));
        $no = 0;

        foreach ($sktm as $data) {
            $date = $data->tglbuat;
            $timestamp = strtotime($date);
            // $date = strftime("%d %B %Y", $timestamp);
            $date = date("d F Y", $timestamp);
            $no++;
            $pdf->SetX(20);
            $pdf->Cell(10, 6, $no, 1, 0, 'C');
            $pdf->Cell(35, 6, $date, 1, 0, 'C');
            $pdf->Cell(55, 6, $data->nama_pengaju, 1, 0, 'C');
            $pdf->Cell(70, 6, $data->nik_pengaju, 1, 0, 'C');
            $pdf->Cell(10, 6, '', 0, 1);
        }

        $pdf->Ln(10);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);


        $pdf->Output();
    }

    function laporanskpindah()
    {
        $start_date = $this->input->get('tgl_mulai');
        $end_date = $this->input->get('tgl_akhir');
        $filtertgl = NULL;
        if (isset($start_date)) {
            $filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
        }

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->Ln(7);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(200, 7, 'Laporan Pembuatan Surat Keterangan Pindah', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Berikut ini merupakan laporan daftar warga dalam pembuatan Surat Keterangan Pindah :', 0, 'J');
        $pdf->Ln(4);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(20);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(55, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(35, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(35, 6, 'No. KK', 1, 0, 'C');
        $pdf->Cell(10, 6, '', 0, 1);

        $sktm = ($this->Desa_model->cetaklaporanskpindah(1, $filtertgl));
        $no = 0;

        foreach ($sktm as $data) {
            $date = $data->tglbuat;
            $timestamp = strtotime($date);
            $date = date("d F Y",  $timestamp());
            $no++;
            $pdf->SetX(20);
            $pdf->Cell(10, 6, $no, 1, 0, 'C');
            $pdf->Cell(35, 6, $date, 1, 0, 'C');
            $pdf->Cell(55, 6, $data->namapengaju, 1, 0, 'C');
            $pdf->Cell(35, 6, $data->nik_pengaju, 1, 0, 'C');
            $pdf->Cell(35, 6, $data->nokk, 1, 0, 'C');
            $pdf->Cell(10, 6, '', 0, 1);
        }

        $pdf->Ln(10);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);


        $pdf->Output();
    }

    function laporanskkelahiran()
    {
        $start_date = $this->input->get('tgl_mulai');
        $end_date = $this->input->get('tgl_akhir');
        $filtertgl = NULL;
        if (isset($start_date)) {
            $filtertgl = 'tgl_buat_sklahir BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
        }

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->Ln(7);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(200, 7, 'Laporan Pembuatan Surat Keterangan Kelahiran', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Berikut ini merupakan laporan daftar warga dalam pembuatan Surat Keterangan Kelahiran :', 0, 'J');
        $pdf->Ln(4);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(20);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(55, 6, 'Nama Anak', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Nama Ibu', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Nama Ayah', 1, 0, 'C');
        $pdf->Cell(10, 6, '', 0, 1);

        $sktm = ($this->Desa_model->cetaklaporanskkelahiran(1, $filtertgl));
        $no = 0;

        foreach ($sktm as $data) {
            $date = $data->tgl_buat_sklahir;
            $timestamp = strtotime($date);
            $date = date("d F Y", $timestamp);
            $no++;
            $pdf->SetX(20);
            $pdf->Cell(10, 6, $no, 1, 0, 'C');
            $pdf->Cell(35, 6, $date, 1, 0, 'C');
            $pdf->Cell(55, 6, $data->nama_anak, 1, 0, 'C');
            $pdf->Cell(35, 6, $data->nama_ibu, 1, 0, 'C');
            $pdf->Cell(35, 6, $data->nama_ayah, 1, 0, 'C');
            $pdf->Cell(10, 6, '', 0, 1);
        }

        $pdf->Ln(10);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);


        $pdf->Output();
    }

    function laporanskkematian()
    {
        $start_date = $this->input->get('tgl_mulai');
        $end_date = $this->input->get('tgl_akhir');
        $filtertgl = NULL;
        if (isset($start_date)) {
            $filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
        }

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->Ln(7);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(200, 7, 'Laporan Pembuatan Surat Keterangan Kematian', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Berikut ini merupakan laporan daftar warga dalam pembuatan Surat Keterangan Kematian :', 0, 'J');
        $pdf->Ln(4);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(32);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(60, 6, 'Nama Orang yang Meninggal', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Penyebab', 1, 0, 'C');
        $pdf->Cell(10, 6, '', 0, 1);

        $sktm = ($this->Desa_model->cetaklaporanskkematian(1, $filtertgl));
        $no = 0;

        foreach ($sktm as $data) {
            $date = $data->tglbuat;
            $timestamp = strtotime($date);
            $date = date("d F Y",  $timestamp);
            $no++;
            $pdf->SetX(32);
            $pdf->Cell(10, 6, $no, 1, 0, 'C');
            $pdf->Cell(35, 6, $date, 1, 0, 'C');
            $pdf->Cell(60, 6, $data->nama, 1, 0, 'C');
            $pdf->Cell(40, 6, $data->penyebab, 1, 0, 'C');
            $pdf->Cell(10, 6, '', 0, 1);
        }

        $pdf->Ln(10);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d M Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);


        $pdf->Output();
    }

    function laporanbansos()
    {
        $start_date = $this->input->get('tgl_mulai');
        $end_date = $this->input->get('tgl_akhir');
        $filtertgl = NULL;
        if (isset($start_date)) {
            $filtertgl = 'tglbuat BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"';
        }

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(200, 7, 'Daftar Laporan Penerimaan Bantuan Sosial', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Berikut ini merupakan daftar warga Desa Cangkuang yang meminta untuk mengajukan bantuan sosial :', 0, 'J');
        $pdf->Ln(4);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(5);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(47, 6, 'Nama Penerima', 1, 0, 'C');
        $pdf->Cell(38, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Jenis Bansos', 1, 0, 'C');
        $pdf->Cell(10, 6, '', 0, 1);

        $sktm = ($this->Desa_model->cetaklaporanbansos($filtertgl));
        $no = 0;

        foreach ($sktm as $data) {
            $date = $data->tglbuat;
            $timestamp = strtotime($date);
            $date = date("d F Y", $timestamp);
            $no++;
            $pdf->SetX(5);
            $pdf->Cell(10, 6, $no, 1, 0, 'C');
            $pdf->Cell(35, 6, $date, 1, 0, 'C');
            $pdf->Cell(47, 6, $data->nama, 1, 0, 'C');
            $pdf->Cell(38, 6, $data->nik, 1, 0, 'C');
            $pdf->Cell(70, 6, $data->jenisbansos, 1, 0, 'C');
            $pdf->Cell(10, 6, '', 0, 1);
        }

        $pdf->Ln(10);
        $pdf->SetX(100);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);


        $pdf->Output();
    }

    function sktm($id)
    {
        $data = array(
            "tglproses_sktm" => date("d M Y")
        );
        ($this->Desa_model->edit_sktm($id, $data));

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(190, 9, 'SURAT KETERANGAN TIDAK MAMPU', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(190, 3, 'Nomor :         /         / 2007 / X / ' . date('Y'), 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Yang bertanda tangan dibawah ini, Kepala Desa Cangkuang Kecamatan Rancaekek Kabupaten Bandung, menerangakan bahwa :', 0, 'J');
        $pdf->Ln(4);

        $sktm = ($this->Desa_model->cetaksktm($id));

        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->nama_pengaju);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nomor Induk Kependudukan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->nik_pengaju);
        $pdf->Ln(2);

        $sktm = ($this->Desa_model->cetaksktm($id));
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sktm->tl_pengaju . $sktm = ', ' .  $sktm->tanggallahir_pengaju);
        $pdf->Ln(2);

        $sktm = ($this->Desa_model->cetaksktm($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Jenis Kelamin');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->jk);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->agama);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Status Perkawinan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->status);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Pekerjaan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->pekerjaan);
        $pdf->Ln(2);

        $pdf->SetMargins(92, 30, 10);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Alamat');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->alamat);
        $pdf->Ln(2);

        $pdf->Ln(7);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '    Bahwa nama tersebut diatas, betul - betul penduduk warga Desa Cangkuang Kecamatan Rancaekek Kabupaten Bandung, sampai saat ini orang tersebut keadaan ekonomi keluarganya tidak mampu berdasarkan Pelaporan dan keterangan RT dan RW setempat Nomor : SP/52/0603/X/' . date('Y'), 0, 'J');

        $pdf->Ln(3);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '    Surat keterangan ini dipergunakan untuk permohonan Keringanan/ Pembebasan biaya rumah sakit dengan Atas Nama :', 0, 'J');

        $pdf->Ln(3);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->nama_pemohon);
        $pdf->Ln(2);

        $sktm = ($this->Desa_model->cetaksktm($id));
        $date = $sktm->tgllahir_pemohon;
        $timestamp = strtotime($date);
        $waktu = date("d F Y", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sktm->tl_pemohon . $sktm = ', ' .  $waktu);
        $pdf->Ln(2);


        $pdf->Ln(10);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '    Demikian keterangan ini dibuat, agar yang berkepentingan menjadi maklum dan dapat dipergunakan sebagaimana mestinya.', 0, 'J');
        $pdf->Ln(10);

        $pdf->SetY(215);
        $pdf->SetX(25);
        $pdf->Write(5, 'Reg / No');
        $pdf->SetX(45);
        $pdf->Write(5, ':');

        $pdf->SetY(218);
        $pdf->SetX(34);
        $pdf->Cell(0, 20, 'Melihat / Mengetahui,', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(37);
        $pdf->Cell(0, 30, 'Camat Rancaekek', 0, 0, 'L', 0);
        $pdf->SetX(30);
        $pdf->Cell(0, 90, '(........................................)', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);

        $pdf->Output();
    }

    function arsipsktm($id)
    {

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(190, 9, 'SURAT KETERANGAN TIDAK MAMPU', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(190, 3, 'Nomor :         /         / 2007 / X / ' . date('Y'), 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Yang bertanda tangan dibawah ini, Kepala Desa Cangkuang Kecamatan Rancaekek Kabupaten Bandung, menerangakan bahwa :', 0, 'J');
        $pdf->Ln(4);

        $sktm = ($this->Desa_model->cetaksktm($id));

        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->nama_pengaju);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nomor Induk Kependudukan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->nik_pengaju);
        $pdf->Ln(2);

        $sktm = ($this->Desa_model->cetaksktm($id));
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sktm->tl_pengaju . $sktm = ', ' .  $sktm->tanggallahir_pengaju);
        $pdf->Ln(2);

        $sktm = ($this->Desa_model->cetaksktm($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Jenis Kelamin');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->jk);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->agama);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Status Perkawinan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->status);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Pekerjaan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->pekerjaan);
        $pdf->Ln(2);

        $pdf->SetMargins(92, 30, 10);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Alamat');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->alamat);
        $pdf->Ln(2);

        $pdf->Ln(7);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '    Bahwa nama tersebut diatas, betul - betul penduduk warga Desa Cangkuang Kecamatan Rancaekek Kabupaten Bandung, sampai saat ini orang tersebut keadaan ekonomi keluarganya tidak mampu berdasarkan Pelaporan dan keterangan RT dan RW setempat Nomor : SP/52/0603/X/' . date('Y'), 0, 'J');

        $pdf->Ln(3);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '    Surat keterangan ini dipergunakan untuk permohonan Keringanan/ Pembebasan biaya rumah sakit dengan Atas Nama :', 0, 'J');

        $pdf->Ln(3);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sktm->nama_pemohon);
        $pdf->Ln(2);

        $sktm = ($this->Desa_model->cetaksktm($id));
        $date = $sktm->tgllahir_pemohon;
        $timestamp = strtotime($date);
        $waktu = date("d F Y", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sktm->tl_pemohon . $sktm = ', ' .  $waktu);
        $pdf->Ln(2);


        $pdf->Ln(10);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '    Demikian keterangan ini dibuat, agar yang berkepentingan menjadi maklum dan dapat dipergunakan sebagaimana mestinya.', 0, 'J');
        $pdf->Ln(10);

        $pdf->SetY(215);
        $pdf->SetX(25);
        $pdf->Write(5, 'Reg / No');
        $pdf->SetX(45);
        $pdf->Write(5, ':');

        $pdf->SetY(218);
        $pdf->SetX(34);
        $pdf->Cell(0, 20, 'Melihat / Mengetahui,', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(37);
        $pdf->Cell(0, 30, 'Camat Rancaekek', 0, 0, 'L', 0);
        $pdf->SetX(30);
        $pdf->Cell(0, 90, '(........................................)', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);

        $pdf->Output();
    }

    function skkematian($id)
    {
        $data = array(
            "tglproses_skkematian" => date("d M Y")
        );
        ($this->Desa_model->edit_skkematian($id, $data));

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(190, 9, 'SURAT KETERANGAN KEMATIAN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(190, 3, 'Nomor :         /         / 2007 / X / ' . date('Y'), 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Kepala Desa Cangkuang Kecamatan Rancaekek Kabupaten Bandung, dengan ini menerangkan bahwa :', 0, 'J');
        $pdf->Ln(4);

        $skkematian = ($this->Desa_model->cetakskkematian($id));

        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Nama Lengkap');
        $pdf->SetX(80);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Write(5, ': ' . $skkematian->nama);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));
        $date = $skkematian->tgl_lahir;
        $timestamp = strtotime($date);
        $date = date("d F Y",  $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(80);
        $pdf->Write(5, ': ');
        $pdf->SetX(82);
        $pdf->Write(5, '' . $skkematian->tl . $skkematian = ', ' .  $date);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Jenis Kelamin');
        $pdf->SetX(80);
        $pdf->Write(5, ': ' . $skkematian->jk);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(80);
        $pdf->Write(5, ': ' . $skkematian->agama);
        $pdf->Ln(2);

        $pdf->Ln(7);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Menurut Pelapor dan keterangan RT 002 RW 003 Nomor : SP/00/0307/X/2022, Nama tercantum di atas telah meninggal pada :', 0, 'J');
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Hari');
        $pdf->SetX(80);
        $pdf->Write(5, ': ' . $skkematian->hari);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));
        $date = $skkematian->tgl_kematian;
        $timestamp = strtotime($date);
        $date = date("d F Y", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tanggal Kematian');
        $pdf->SetX(80);
        $pdf->Write(5, ': ');
        $pdf->SetX(82);
        $pdf->Write(5, '' . $skkematian = '' .  $date);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Di');
        $pdf->SetX(80);
        $pdf->Write(5, ': ' . $skkematian->tmpt_kematian);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));
        $date = $skkematian->jam;
        $timestamp = strtotime($date);
        $date = strftime("%H.%M ", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Jam');
        $pdf->SetX(80);
        $pdf->Write(5, ': ');
        $pdf->SetX(82);
        $pdf->Write(5, '' .  $date . $skkematian = 'WIB');
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Alamat');
        $pdf->SetX(80);
        $pdf->Write(5, ': ');
        $pdf->MultiCell(0, 5, $skkematian->alamat, 0, 'J');
        $pdf->Ln(2);

        // $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Penyebab');
        $pdf->SetX(80);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Write(5, ': ' . $skkematian->penyebab);
        $pdf->Ln(2);


        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(10);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Demikan Surat keterangan ini dibuat dan dipergunakan sebagaimana mestinya.', 0, 'J');
        $pdf->Ln(10);

        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(47);
        $pdf->Cell(0, 30, 'Pelapor', 0, 0, 'L', 0);
        $pdf->SetX(30);
        $pdf->Cell(0, 90, '(........................................)', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);

        $pdf->Output();
    }

    function arsipskkematian($id)
    {

        $data = array(
            "tglproses_skkematian" => date("d M Y")
        );
        ($this->Desa_model->edit_skkematian($id, $data));

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(190, 9, 'SURAT KETERANGAN KEMATIAN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(190, 3, 'Nomor :         /         / 2007 / X / ' . date('Y'), 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Kepala Desa Cangkuang Kecamatan Rancaekek Kabupaten Bandung, dengan ini menerangkan bahwa :', 0, 'J');
        $pdf->Ln(4);

        $skkematian = ($this->Desa_model->cetakskkematian($id));

        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Nama Lengkap');
        $pdf->SetX(80);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Write(5, ': ' . $skkematian->nama);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));
        $date = $skkematian->tgl_lahir;
        $timestamp = strtotime($date);
        $date = date("d F Y",  $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(80);
        $pdf->Write(5, ': ');
        $pdf->SetX(82);
        $pdf->Write(5, '' . $skkematian->tl . $skkematian = ', ' .  $date);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Jenis Kelamin');
        $pdf->SetX(80);
        $pdf->Write(5, ': ' . $skkematian->jk);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(80);
        $pdf->Write(5, ': ' . $skkematian->agama);
        $pdf->Ln(2);

        $pdf->Ln(7);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Menurut Pelapor dan keterangan RT 002 RW 003 Nomor : SP/00/0307/X/2022, Nama tercantum di atas telah meninggal pada :', 0, 'J');
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Hari');
        $pdf->SetX(80);
        $pdf->Write(5, ': ' . $skkematian->hari);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));
        $date = $skkematian->tgl_kematian;
        $timestamp = strtotime($date);
        $date = date("d F Y", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tanggal Kematian');
        $pdf->SetX(80);
        $pdf->Write(5, ': ');
        $pdf->SetX(82);
        $pdf->Write(5, '' . $skkematian = '' .  $date);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Di');
        $pdf->SetX(80);
        $pdf->Write(5, ': ' . $skkematian->tmpt_kematian);
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));
        $date = $skkematian->jam;
        $timestamp = strtotime($date);
        $date = strftime("%H.%M ", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Jam');
        $pdf->SetX(80);
        $pdf->Write(5, ': ');
        $pdf->SetX(82);
        $pdf->Write(5, '' .  $date . $skkematian = 'WIB');
        $pdf->Ln(2);

        $skkematian = ($this->Desa_model->cetakskkematian($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Alamat');
        $pdf->SetX(80);
        $pdf->Write(5, ': ');
        $pdf->MultiCell(0, 5, $skkematian->alamat, 0, 'J');
        $pdf->Ln(2);

        // $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Penyebab');
        $pdf->SetX(80);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Write(5, ': ' . $skkematian->penyebab);
        $pdf->Ln(2);


        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(10);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Demikan Surat keterangan ini dibuat dan dipergunakan sebagaimana mestinya.', 0, 'J');
        $pdf->Ln(10);

        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(47);
        $pdf->Cell(0, 30, 'Pelapor', 0, 0, 'L', 0);
        $pdf->SetX(30);
        $pdf->Cell(0, 90, '(........................................)', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);

        $pdf->Output();
    }

    function sklahir($id)
    {

        $data = array(
            "tglproses_sklahir" => date("d M Y")
        );
        ($this->Desa_model->edit_sklahir($id, $data));

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(190, 9, 'SURAT KETERANGAN KELAHIRAN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(190, 3, 'Nomor :         /         / 2007 / X / ' . date('Y'), 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Kepala Desa Cangkuang Kecamatan Rancaekek Kabupaten Bandung, dengan ini menerangkan bahwa pada:', 0, 'J');
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Hari');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->hari_lahir);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));
        $date = $sklahir->tgl_anak;
        $timestamp = strtotime($date);
        $waktu = date("d F Y", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sklahir->tl_anak . $sklahir = ', ' .  $waktu);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->agama_anak);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));
        $date = $sklahir->jam;
        $timestamp = strtotime($date);
        $date = strftime("%H.%M ", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Jam');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' .  $date . $sklahir = 'WIB');
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Telah lahir anak yang bernama :');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Ln(2);
        $pdf->MultiCell(0, 5, $sklahir->nama_anak, 0, 'C');
        $pdf->Ln(2);

        $pdf->Ln(2);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Anak ke');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->anakke);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Dari seorang ibu yang bernama :');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Ln(2);
        $pdf->MultiCell(0, 5, $sklahir->nama_ibu, 0, 'C');
        $pdf->Ln(2);

        $pdf->Ln(2);
        $sklahir = ($this->Desa_model->cetakskkelahiran($id));
        // $date = $sklahir->tgl_ibu;
        // $timestamp = strtotime($date);
        // $waktu = date("d M Y", $timestamp);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sklahir->tl_ibu . $sklahir = ', ' .   $sklahir->tgl_ibu);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->agama_ibu);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Pekerjaan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->pekerjaan_ibu);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Istri dari :');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Ln(2);
        $pdf->MultiCell(0, 5, $sklahir->nama_ayah, 0, 'C');
        $pdf->Ln(2);

        $pdf->Ln(2);
        $sklahir = ($this->Desa_model->cetakskkelahiran($id));
        // $date = $sklahir->tgl_ayah;
        // $timestamp = strtotime($date);
        // $waktu = date("d M Y", $timestamp);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sklahir->tl_ayah . $sklahir = ', ' .  $sklahir->tgl_ayah);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->agama_ayah);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Pekerjaan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->pekerjaan_ayah);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Alamat');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->MultiCell(0, 5, $sklahir->alamat, 0, 'J');
        $pdf->Ln(2);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(3);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Demikan keterangan ini di buat menurut laporan dan keterangan RT dan RW dengan nomor: SP/00/0214/IX/2022, dan dapat dipergunakan sebagaimana mestinya.', 0, 'J');
        $pdf->Ln(3);

        $pdf->SetY(230);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);

        $pdf->Output();
    }

    function arsipsklahir($id)
    {

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(190, 9, 'SURAT KETERANGAN KELAHIRAN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(190, 3, 'Nomor :         /         / 2007 / X / ' . date('Y'), 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Kepala Desa Cangkuang Kecamatan Rancaekek Kabupaten Bandung, dengan ini menerangkan bahwa pada:', 0, 'J');
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Hari');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->hari_lahir);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));
        $date = $sklahir->tgl_anak;
        $timestamp = strtotime($date);
        $waktu = date("d F Y", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sklahir->tl_anak . $sklahir = ', ' .  $waktu);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->agama_anak);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));
        $date = $sklahir->jam;
        $timestamp = strtotime($date);
        $date = strftime("%H.%M ", $timestamp);
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Jam');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' .  $date . $sklahir = 'WIB');
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Telah lahir anak yang bernama :');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Ln(2);
        $pdf->MultiCell(0, 5, $sklahir->nama_anak, 0, 'C');
        $pdf->Ln(2);

        $pdf->Ln(2);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Anak ke');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->anakke);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Dari seorang ibu yang bernama :');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Ln(2);
        $pdf->MultiCell(0, 5, $sklahir->nama_ibu, 0, 'C');
        $pdf->Ln(2);

        $pdf->Ln(2);
        $sklahir = ($this->Desa_model->cetakskkelahiran($id));
        // $date = $sklahir->tgl_ibu;
        // $timestamp = strtotime($date);
        // $waktu = date("d M Y", $timestamp);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sklahir->tl_ibu . $sklahir = ', ' .   $sklahir->tgl_ibu);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->agama_ibu);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Pekerjaan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->pekerjaan_ibu);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Istri dari :');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Ln(2);
        $pdf->MultiCell(0, 5, $sklahir->nama_ayah, 0, 'C');
        $pdf->Ln(2);

        $pdf->Ln(2);
        $sklahir = ($this->Desa_model->cetakskkelahiran($id));
        // $date = $sklahir->tgl_ayah;
        // $timestamp = strtotime($date);
        // $waktu = date("d M Y", $timestamp);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $sklahir->tl_ayah . $sklahir = ', ' .  $sklahir->tgl_ayah);
        $pdf->Ln(2);

        $sklahir = ($this->Desa_model->cetakskkelahiran($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Agama');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->agama_ayah);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Pekerjaan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $sklahir->pekerjaan_ayah);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Alamat');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->MultiCell(0, 5, $sklahir->alamat, 0, 'J');
        $pdf->Ln(2);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(3);
        $pdf->SetX(20);
        $pdf->MultiCell(0, 5, '       Demikan keterangan ini di buat menurut laporan dan keterangan RT dan RW dengan nomor: SP/00/0214/IX/2022, dan dapat dipergunakan sebagaimana mestinya.', 0, 'J');
        $pdf->Ln(3);

        $pdf->SetY(230);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);

        $pdf->Output();
    }

    function skpindah($id)
    {

        $data = array(
            "tglproses_skpindah" => date("d M Y")
        );
        ($this->Desa_model->edit_skpindah($id, $data));

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(190, 9, 'SURAT KETERANGAN PINDAH', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(190, 3, 'Nomor :         /         / 2007 / X / ' . date('Y'), 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(4);

        $skpindah = ($this->Desa_model->cetakskpindah($id));

        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->namapengaju);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nomor Kartu Keluarga');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->nokk);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nomor Induk Penduduk');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->nik_pengaju);
        $pdf->Ln(2);

        $skpindah = ($this->Desa_model->cetakskpindah($id));
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $skpindah->tl_pengaju . $skpindah = ', ' . $skpindah->tgl_pengaju);
        $pdf->Ln(2);

        $skpindah = ($this->Desa_model->cetakskpindah($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Status Perkawinan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->status);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Pekerjaan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->pekerjaan);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap Ibu');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->nama_ibu);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap Ayah');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->nama_ayah);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Pendidikan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->pendidikan);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Alamat');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->MultiCell(0, 5, $skpindah->alamat_asal, 0, 'J');
        $pdf->Ln(2);

        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Pindah Ke');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->MultiCell(0, 5, $skpindah->pindahke, 0, 'J');
        $pdf->Ln(2);

        $pdf->SetX(30);
        $pdf->Write(5, 'Kode Pos');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->kodepos);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Alasan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->alasan);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Pengikut');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');

        $pdf->Ln(8);
        $pdf->SetY(187);
        $pdf->SetX(20);
        $pdf->Cell(40, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(50, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Jenis Kelamin', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Hub. Keluarga', 1, 0, 'C');

        $pdf->SetX(20);
        $pdf->SetY(193);
        $pdf->Cell(40, 6, $skpindah->namapengikut1, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut1, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut1, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut1, 1, 0, 'C');
        $pdf->Ln(2);

        $pdf->SetX(20);
        $pdf->SetY(199);
        $pdf->Cell(40, 6, $skpindah->namapengikut2, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut2, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut2, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut2, 1, 0, 'C');
        $pdf->Ln(2);

        $pdf->SetX(20);
        $pdf->SetY(205);
        $pdf->Cell(40, 6, $skpindah->namapengikut3, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut3, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut3, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut3, 1, 0, 'C');
        $pdf->Ln(2);

        $pdf->SetX(20);
        $pdf->SetY(211);
        $pdf->Cell(40, 6, $skpindah->namapengikut4, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut4, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut4, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut4, 1, 0, 'C');
        $pdf->Ln(2);

        $pdf->SetX(20);
        $pdf->SetY(217);
        $pdf->Cell(40, 6, $skpindah->namapengikut5, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut5, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut5, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut5, 1, 0, 'C');
        $pdf->Ln(2);


        $pdf->SetY(221);
        $pdf->SetX(34);
        $pdf->Cell(0, 20, 'Melihat / Mengetahui,', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(37);
        $pdf->Cell(0, 30, 'Camat Rancaekek', 0, 0, 'L', 0);
        $pdf->SetX(30);
        $pdf->Cell(0, 90, '(........................................)', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);

        $pdf->Output();
    }

    function arsipskpindah($id)
    {

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', '', 20);
        // mencetak string
        $pdf->Image('assets/img/logo/logo.png', 22, 10, -650);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 8, 'PEMERINTAH KABUPATEN BANDUNG', 0, 4, 'C');
        $pdf->Cell(210, 8, 'KECAMATAN RANCAEKEK', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(210, 8, 'DESA CANGKUANG', 0, 4, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(193, 6, 'Jln. Cangkuang - Haurpugur No. 53 Rancaekek Telp : 022  87702265 e-mail: desa_cangkuang2007@yahoo.com ', 0, 3, 'C');

        //pindah baris
        $pdf->Ln(7);
        //buat garis horisontal
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 40, 190, 40);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 41, 190, 41);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(190, 9, 'SURAT KETERANGAN PINDAH', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(190, 3, 'Nomor :         /         / 2007 / X / ' . date('Y'), 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetMargins(20, 30, 20);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(4);

        $skpindah = ($this->Desa_model->cetakskpindah($id));

        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->namapengaju);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nomor Kartu Keluarga');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->nokk);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nomor Induk Penduduk');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->nik_pengaju);
        $pdf->Ln(2);

        $skpindah = ($this->Desa_model->cetakskpindah($id));
        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Tempat Tanggal Lahir');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->SetX(92);
        $pdf->Write(5, '' . $skpindah->tl_pengaju . $skpindah = ', ' . $skpindah->tgl_pengaju);
        $pdf->Ln(2);

        $skpindah = ($this->Desa_model->cetakskpindah($id));

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Status Perkawinan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->status);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Pekerjaan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->pekerjaan);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap Ibu');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->nama_ibu);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Nama Lengkap Ayah');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->nama_ayah);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Pendidikan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->pendidikan);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Alamat');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->MultiCell(0, 5, $skpindah->alamat_asal, 0, 'J');
        $pdf->Ln(2);

        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Pindah Ke');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');
        $pdf->MultiCell(0, 5, $skpindah->pindahke, 0, 'J');
        $pdf->Ln(2);

        $pdf->SetX(30);
        $pdf->Write(5, 'Kode Pos');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->kodepos);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->Write(5, 'Alasan');
        $pdf->SetX(90);
        $pdf->Write(5, ': ' . $skpindah->alasan);
        $pdf->Ln(2);

        $pdf->Ln(5);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Write(5, 'Pengikut');
        $pdf->SetX(90);
        $pdf->Write(5, ': ');

        $pdf->Ln(8);
        $pdf->SetY(187);
        $pdf->SetX(20);
        $pdf->Cell(40, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(50, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Jenis Kelamin', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Hub. Keluarga', 1, 0, 'C');

        $pdf->SetX(20);
        $pdf->SetY(193);
        $pdf->Cell(40, 6, $skpindah->namapengikut1, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut1, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut1, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut1, 1, 0, 'C');
        $pdf->Ln(2);

        $pdf->SetX(20);
        $pdf->SetY(199);
        $pdf->Cell(40, 6, $skpindah->namapengikut2, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut2, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut2, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut2, 1, 0, 'C');
        $pdf->Ln(2);

        $pdf->SetX(20);
        $pdf->SetY(205);
        $pdf->Cell(40, 6, $skpindah->namapengikut3, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut3, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut3, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut3, 1, 0, 'C');
        $pdf->Ln(2);

        $pdf->SetX(20);
        $pdf->SetY(211);
        $pdf->Cell(40, 6, $skpindah->namapengikut4, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut4, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut4, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut4, 1, 0, 'C');
        $pdf->Ln(2);

        $pdf->SetX(20);
        $pdf->SetY(217);
        $pdf->Cell(40, 6, $skpindah->namapengikut5, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->nikpengikut5, 1, 0, 'C');
        $pdf->Cell(35, 6, $skpindah->jkpengikut5, 1, 0, 'C');
        $pdf->Cell(50, 6, $skpindah->hubpengikut5, 1, 0, 'C');
        $pdf->Ln(2);


        $pdf->SetY(221);
        $pdf->SetX(34);
        $pdf->Cell(0, 20, 'Melihat / Mengetahui,', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 20, ('Cangkuang, ') . date("d F Y"), 0, 0, 'C', 0);
        $pdf->SetX(130);
        $pdf->Cell(0, 30, 'an. Kepala Desa Cangkuang', 0, 0, 'C', 0);
        $pdf->SetX(37);
        $pdf->Cell(0, 30, 'Camat Rancaekek', 0, 0, 'L', 0);
        $pdf->SetX(30);
        $pdf->Cell(0, 90, '(........................................)', 0, 0, 'L', 0);
        $pdf->SetX(130);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 90, 'H. DADAN KARDANA', 0, 0, 'C', 0);

        $pdf->Output();
    }
}
