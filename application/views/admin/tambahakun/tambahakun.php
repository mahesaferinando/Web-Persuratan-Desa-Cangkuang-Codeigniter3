<!-- Begin Page Content -->
<font style="color: black;">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Pembuatan Akun</h1>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <div class="text-center mt-4">
                    <h6 class="row justify-content-center">
                        <?= $this->session->flashdata('pesan1'); ?>
                        <?php unset($_SESSION['pesan1']); ?>
                    </h6>
                </div>


                <a class="btn btn-success mb-3" href="<?= base_url('admin/daftaruser') ?>">Daftar User</a>

                <form action="<?= $aksi; ?>" method="POST">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" title="Isi dengan nama user" style="color: black;" placeholder="Masukan Nama">
                    </div>

                    <div class="form-group">
                        <label for="">Nomor Induk Penduduk</label>
                        <input type="text" name="email" class="form-control" id="email" maxlength="16" onkeypress="return hanyaAngka(event)" pattern=".{16,}" title="NIK harus 16 digit angka" placeholder="Masukan Nomor Induk Penduduk" style="color: black;" required>
                    </div>

                    <div class="form-group">
                        <label for="">Nomor Kartu Keluarga</label>
                        <input type="text" name="nokk" class="form-control" id="nokk" maxlength="16" onkeypress="return hanyaAngka(event)" pattern=".{16,}" title="No. KK harus 16 digit angka" placeholder="Masukan Nomor Kartu Keluarga" style="color: black;" required>
                    </div>

                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tmptlahir" id="" title="Isi dengan tempat lahir user" placeholder="Masukan Tempat Lahir User" style="color: black;">
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggallahir" id="" placeholder="Tanggal Lahir" title="Isi dengan tanggal lahir user" style="color: black;">
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select type="text" name="jkelamin" class="form-control" id="jkelamin" style="color: black;" required>
                            <option value="">---Pilih salah satu---</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea placeholder="Masukan Alamat User" type="text" class="form-control" name="alamat" id="" style="color: black;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Status dalam Keluarga</label>
                        <select class="form-control" name="status" id="status" style="color: black;" required>
                            <option value="">---Pilih salah satu---</option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Menantu">Menantu</option>
                            <option value="Cucu">Cucu</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Mertua">Mertua</option>
                            <option value="Famili Lain">Famili Lain</option>
                            <option value="Pembantu">Pembantu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" class="form-control" style="color: black;" required>
                            <option value="">---Pilih Salah Satu---</option>
                            <?php foreach ($pekerjaan as $kerja) : ?>
                                <option value="<?= $kerja->pekerjaan ?>"><?= $kerja->pekerjaan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Agama</label>
                        <select type="text" name="agama" class="form-control" id="agama" style="color: black;" required>
                            <option value="">---Pilih salah satu---</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Status Perkawinan</label>
                        <select name="statuskawin" id="statuskawin" class="form-control" style="color: black;" required>
                            <option value="">---Pilih salah satu---</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Kata Sandi</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="password" id="id_password" placeholder="Masukan Kata Sandi" title="Isi dengan tanggal lahir user" style="color: black;" autocomplete="current-password">
                            <i class="far fa-eye" id="togglePassword" style="position: absolute; top: 10px; right: 10px; cursor: pointer;"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div>

    </div>
</font>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Keluar" jika Anda ingin mengakhiri sesi di website ini.</div>
            <div class="modal-footer">
                <button class="btn btn-dark" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-success" href="<?= base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>