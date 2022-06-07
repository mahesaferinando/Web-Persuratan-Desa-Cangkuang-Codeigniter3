<?php

/**
 * 
 */
class Desa_model extends CI_Model
{
    public $admin                       = 'admin';
    public $sktm                        = 'sktm';
    public $sklahir                     = 'sklahir';
    public $skkematian                  = 'skkematian';
    public $skpindah                    = 'skpindah';
    public $bantuansosial               = 'bantuansosial';
    public $daftarpekerjaan             = 'daftarpekerjaan';
    public $order                       = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    function cek_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get($this->admin)->row();
    }

    function daftarpekerjaan()
    {
        $this->db->select('*');
        $this->db->from($this->daftarpekerjaan);
        // $this->db->order_by('pekerjaan', 'asc');
        return $this->db->get()->result();
    }

    function tambahsktm($data) //array
    {
        return $this->db->insert($this->sktm, $data);
    }

    function tambahsklahir($data)
    {
        return $this->db->insert($this->sklahir, $data);
    }

    function tambahskkematian($data)
    {
        return $this->db->insert($this->skkematian, $data);
    }

    function tambahskpindah($data)
    {
        return $this->db->insert($this->skpindah, $data);
    }

    function tambahbansos($data)
    {
        return $this->db->insert($this->bantuansosial, $data);
    }

    function hitungsktm()
    {
        $this->db->where('kondisi =', 0);
        $query = $this->db->get('sktm');
        return $query->num_rows();
    }

    function hitungsklahir()
    {
        $this->db->where('kondisi =', 0);
        $query = $this->db->get('sklahir');
        return $query->num_rows();
    }

    function hitungskkematian()
    {
        $this->db->where('kondisi =', 0);
        $query = $this->db->get('skkematian');
        return $query->num_rows();
    }

    function hitungskpindah()
    {
        $this->db->where('kondisi =', 0);
        $query = $this->db->get('skpindah');
        return $query->num_rows();
    }

    function hitungbansos()
    {
        $this->db->where('kondisi =', 0);
        $query = $this->db->get('bantuansosial');
        return $query->num_rows();
    }

    function tampilsktm($sktm = true)
    {
        if ($sktm) $this->db->where('kondisi =', 0);
        return $this->db->get($this->sktm)->result();
    }

    function edit_sktm($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->sktm, $data);
    }

    function cetaksktm($id)
    {
        $this->db->select('*');
        $this->db->from('sktm');
        $this->db->join('user', 'user.id=sktm.id_user');
        $this->db->where('sktm.id', $id);
        return $this->db->get()->row();
    }

    function cetakskkematian($id)
    {
        $this->db->select('*');
        $this->db->from('skkematian');
        $this->db->join('user', 'user.id=skkematian.id_user');
        $this->db->where('skkematian.id', $id);
        return $this->db->get()->row();
    }

    function cetakskkelahiran($id)
    {
        $this->db->select('*');
        $this->db->from('sklahir');
        $this->db->join('user', 'user.id=sklahir.id_user');
        $this->db->where('sklahir.id', $id);
        return $this->db->get()->row();
    }

    function cetakskpindah($id)
    {
        $this->db->select('*');
        $this->db->from('skpindah');
        $this->db->where('skpindah.id', $id);
        return $this->db->get()->row();
    }

    function tampilsklahir($sklahir = true)
    {
        if ($sklahir) $this->db->where('kondisi =', 0);
        return $this->db->get($this->sklahir)->result();
    }

    function edit_sklahir($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->sklahir, $data);
    }

    function tampilskkematian($skkematian = true)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('skkematian', 'skkematian.id_user=user.id');
        if ($skkematian) $this->db->where('kondisi =', 0);
        return $this->db->get()->result();
    }

    function edit_skkematian($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->skkematian, $data);
    }

    function tampilskpindah($sklahir = true)
    {
        if ($sklahir) $this->db->where('kondisi =', 0);
        return $this->db->get($this->skpindah)->result();
    }

    function edit_skpindah($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->skpindah, $data);
    }

    function tampilbantuan()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('bantuansosial', 'bantuansosial.id_user=user.id');
        $this->db->where('kondisi =', 0);
        return $this->db->get()->result();
    }

    function edit_bansos($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->bantuansosial, $data);
    }

    function laporansktm()
    {
        $this->db->where('kondisi =', 1);
        $query = $this->db->get('sktm');
        return $query->result();
    }

    function laporanskpindah()
    {
        $this->db->where('kondisi =', 1);
        $query = $this->db->get('skpindah');
        return $query->result();
    }

    function laporansklahir()
    {
        $this->db->where('kondisi =', 1);
        $query = $this->db->get('sklahir');
        return $query->result();
    }

    function laporanskkematian()
    {
        $this->db->where('kondisi =', 1);
        $query = $this->db->get('skkematian');
        return $query->result();
    }

    function cetaklaporansktm($kondisi = NULL, $filtertgl = NULL)
    {
        $this->db->select('*');
        $this->db->from('sktm');
        if (isset($kondisi)) $this->db->where('kondisi', $kondisi);
        if (isset($filtertgl)) $this->db->where($filtertgl);
        return $this->db->get()->result();
    }

    function cetaklaporanskpindah($kondisi = NULL, $filtertgl = NULL)
    {
        $this->db->select('*');
        $this->db->from('skpindah');
        if (isset($kondisi)) $this->db->where('kondisi', $kondisi);
        if (isset($filtertgl)) $this->db->where($filtertgl);
        return $this->db->get()->result();
    }

    function cetaklaporanskkelahiran($kondisi = NULL, $filtertgl = NULL)
    {
        $this->db->select('*');
        $this->db->from('sklahir');
        if (isset($kondisi)) $this->db->where('kondisi', $kondisi);
        if (isset($filtertgl)) $this->db->where($filtertgl);
        return $this->db->get()->result();
    }

    function cetaklaporanskkematian($kondisi = NULL, $filtertgl = NULL)
    {
        $this->db->select('*');
        $this->db->from('skkematian');
        if (isset($kondisi)) $this->db->where('kondisi', $kondisi);
        if (isset($filtertgl)) $this->db->where($filtertgl);
        return $this->db->get()->result();
    }

    function tampilbansos()
    {
        $this->db->select('*');
        $this->db->from('bantuansosial');
        return $this->db->get()->result();
    }

    function cetaklaporanbansos($filtertgl = NULL)
    {
        $this->db->select('*');
        $this->db->from('bantuansosial');
        if (isset($filtertgl)) $this->db->where($filtertgl);
        return $this->db->get()->result();
    }

    function statussuratsktm($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('sktm', 'sktm.id_user=user.id');
        $this->db->where('user.id', $id);
        return $this->db->get()->result();
    }

    function statussuratsklahir($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('sklahir', 'sklahir.id_user=user.id');
        $this->db->where('user.id', $id);
        return $this->db->get()->result();
    }

    function statussuratskpindah($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('skpindah', 'skpindah.id_user=user.id');
        $this->db->where('user.id', $id);
        return $this->db->get()->result();
    }

    function statussuratskkematian($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('skkematian', 'skkematian.id_user=user.id');
        $this->db->where('user.id', $id);
        return $this->db->get()->result();
    }

    function statusbansos($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('bantuansosial', 'bantuansosial.id_user=user.id');
        $this->db->where('user.id', $id);
        return $this->db->get()->result();
    }

    function tampilarsipsktm($sktm = true)
    {
        if ($sktm) $this->db->where('kondisi =', 1);
        return $this->db->get($this->sktm)->result();
    }

    function tampilarsipsklahir($sklahir = true)
    {
        if ($sklahir) $this->db->where('kondisi =', 1);
        return $this->db->get($this->sklahir)->result();
    }

    function tampilarsipskkematian($sklahir = true)
    {
        if ($sklahir) $this->db->where('kondisi =', 1);
        return $this->db->get($this->skkematian)->result();
    }

    function tampilarsipskpindah($sklahir = true)
    {
        if ($sklahir) $this->db->where('kondisi =', 1);
        return $this->db->get($this->skpindah)->result();
    }

    function tampiluser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id =', 2);
        return $this->db->get()->result();
    }

    function useristri()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }

    function anggota($nokk)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nokk', $nokk);
        return $this->db->get()->result();
    }

    function datasklahiribu($nokk)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nokk', $nokk);
        $this->db->where('statuskeluarga', 'Istri');
        return $this->db->get()->row_array();
    }

    function datasklahirayah($nokk)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nokk', $nokk);
        $this->db->where('statuskeluarga', 'Kepala Keluarga');
        return $this->db->get()->row_array();
    }
}
