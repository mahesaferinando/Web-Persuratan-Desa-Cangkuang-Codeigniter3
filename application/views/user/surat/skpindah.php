<!-- Begin Page Content -->
<font color="black">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Surat Keterangan Pindah</h1>


        <form class="container" action="<?= $aksi ?>" method="post" enctype="multipart/form-data">
            <div class="container mt-3">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">

                        <h5 align="center">Contoh Tampilan Surat</h5>
                        <br>
                        <h1 style="text-align:center">
                            <img id="sktmrs" src="<?= base_url('assets/img/templates/skpindah.jpg'); ?>" width="75%" alt="Surat Keterangan Kematian" title='Surat Keterangan Kematian'>
                        </h1>
                        <hr color="black">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home2" role="tabpanel">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Isi dengan data orang yang mengajukan pindah</h>
                                    <hr width="150" align="Center" color="black">
                                </b>
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" name="namapengaju" class="form-control" id="namapengaju" value="<?= $user['name']; ?>" style="color: black;" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Nomor Induk Penduduk</label>
                                                <input type="text" name="nik_pengaju" class="form-control" id="nik_pengaju" value="<?= $user['email']; ?>" maxlength="16" onkeypress="return hanyaAngka(event)" pattern=".{16,}" title="NIK harus 16 digit angka" style="color: black;" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Nomor Kartu Keluarga</label>
                                                <input type="text" name="nokk" class="form-control" id="nokk" maxlength="16" onkeypress="return hanyaAngka(event)" pattern=".{16,}" title="NIK harus 16 digit angka" value="<?= $user['nokk']; ?>" style="color: black;" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" name="tl_pengaju" class="form-control" id="tl_pengaju" style="color: black;" value="<?= $user['tmptlahir']; ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Tanggal Lahir </label>
                                                <input type="text" name="tgl_pengaju" class="form-control" id="tgl_pengaju" style="color: black;" value="<?= strftime("%d %B %Y", strtotime($user["tanggallahir"]));  ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Status Perkawinan</label>
                                                <input type="text" name="status" class="form-control" id="status" style="color: black;" value="<?= $user['statuskawin']; ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Pekerjaan</label>
                                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" style="color: black;" value="<?= $user['pekerjaan']; ?>" readonly>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="">Nama Lengkap Ibu</label>
                                                <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" style="color: black;" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Nama Lengkap Ayah</label>
                                                <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" style="color: black;" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Pendidikan</label>
                                                <select name="pendidikan" id="pendidikan" class="form-control" style="color: black;" required>
                                                    <option value="">---Pilih Salah Satu---</option>
                                                    <option value="Sekolah Dasar">Sekolah Dasar</option>
                                                    <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                                                    <option value="Sekolah Menengah Atas">Sekolah Menengah Atas</option>
                                                    <option value="Akademi / Universitas">Akademi / Universitas</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Alamat Asal</label>
                                                <textarea type="text" name="alamat_asal" class="form-control" id="alamat_asal" style="color: black;" readonly><?= $user['alamat']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Pindah Ke</label>
                                                <textarea name="pindahke" id="pindahke" class="form-control" style="color: black;" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Kode Pos</label>
                                                <input type="number" name="kodepos" class="form-control" id="kodepos" style="color: black;" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Alasan Pindah</label>
                                                <input type="text" name="alasan" class="form-control" id="alasan" style="color: black;" required>
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" name="jenissurat" value="Surat Keterangan Pindah">
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <hr color="black">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Isi dengan data pengikut ke 1 (opsional)</h>
                                </b>
                                <hr width="150" align="Center" color="black">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home2" role="tabpanel">
                                        <div class="p-20">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap Pengikut 1</label>
                                                        <select name="namapengikut1" id="namapengikut1" class="form-control" style="color: black;" onchange="setanggota(this.value, 1)">
                                                            <option value="">---Pilih Salah Satu---</option>
                                                            <?php foreach ($anggota as $ag) : ?>
                                                                <option value="<?= $ag->name ?>"><?= $ag->name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">NIK Pengikut 1</label>
                                                        <input type="text" name="nikpengikut1" class="form-control" id="nikpengikut1" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin </label>
                                                        <input type="text" name="jkpengikut1" class="form-control" id="jkpengikut1" style="color: black;" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Hubungan Keluarga</label>
                                                        <input type="text" name="hubpengikut1" class="form-control" id="hubpengikut1" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr color="black">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Isi dengan data pengikut ke 2 (opsional)</h>
                                </b>
                                <hr width="150" align="Center" color="black">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home2" role="tabpanel">
                                        <div class="p-20">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap Pengikut 2</label>
                                                        <select name="namapengikut2" id="namapengikut2" class="form-control" style="color: black;" onchange="setanggota(this.value, 2)">
                                                            <option value="">---Pilih Salah Satu---</option>
                                                            <?php foreach ($anggota as $ag) : ?>
                                                                <option value="<?= $ag->name ?>"><?= $ag->name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">NIK Pengikut 2</label>
                                                        <input type="text" name="nikpengikut2" class="form-control" id="nikpengikut2" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin </label>
                                                        <input type="text" name="jkpengikut2" class="form-control" id="jkpengikut2" style="color: black;" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Hubungan Keluarga</label>
                                                        <input type="text" name="hubpengikut2" class="form-control" id="hubpengikut2" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr color="black">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Isi dengan data pengikut ke 3 (opsional)</h>
                                </b>
                                <hr width="150" align="Center" color="black">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home2" role="tabpanel">
                                        <div class="p-20">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap Pengikut 3</label>
                                                        <select name="namapengikut3" id="namapengikut3" class="form-control" style="color: black;" onchange="setanggota(this.value, 3)">
                                                            <option value="">---Pilih Salah Satu---</option>
                                                            <?php foreach ($anggota as $ag) : ?>
                                                                <option value="<?= $ag->name ?>"><?= $ag->name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">NIK Pengikut 3</label>
                                                        <input type="text" name="nikpengikut3" class="form-control" id="nikpengikut3" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin </label>
                                                        <input type="text" name="jkpengikut3" class="form-control" id="jkpengikut3" style="color: black;" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Hubungan Keluarga</label>
                                                        <input type="text" name="hubpengikut3" class="form-control" id="hubpengikut3" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr color="black">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Isi dengan data pengikut ke 4 (opsional)</h>
                                </b>
                                <hr width="150" align="Center" color="black">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home2" role="tabpanel">
                                        <div class="p-20">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap Pengikut 4</label>
                                                        <select name="namapengikut4" id="namapengikut4" class="form-control" style="color: black;" onchange="setanggota(this.value, 4)">
                                                            <option value="">---Pilih Salah Satu---</option>
                                                            <?php foreach ($anggota as $ag) : ?>
                                                                <option value="<?= $ag->name ?>"><?= $ag->name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">NIK Pengikut 4</label>
                                                        <input type="text" name="nikpengikut4" class="form-control" id="nikpengikut4" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin </label>
                                                        <input type="text" name="jkpengikut4" class="form-control" id="jkpengikut4" style="color: black;" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Hubungan Keluarga</label>
                                                        <input type="text" name="hubpengikut4" class="form-control" id="hubpengikut4" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr color="black">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Isi dengan data pengikut ke 5 (opsional)</h>
                                </b>
                                <hr width="150" align="Center" color="black">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home2" role="tabpanel">
                                        <div class="p-20">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap Pengikut 5</label>
                                                        <select name="namapengikut5" id="namapengikut5" class="form-control" style="color: black;" onchange="setanggota(this.value, 5)">
                                                            <option value="">---Pilih Salah Satu---</option>
                                                            <?php foreach ($anggota as $ag) : ?>
                                                                <option value="<?= $ag->name ?>"><?= $ag->name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">NIK Pengikut 5</label>
                                                        <input type="text" name="nikpengikut5" class="form-control" id="nikpengikut5" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin </label>
                                                        <input type="text" name="jkpengikut5" class="form-control" id="jkpengikut5" style="color: black;" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Hubungan Keluarga</label>
                                                        <input type="text" name="hubpengikut5" class="form-control" id="hubpengikut5" style="color: black;" readonly>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr color="black">
                                <b>
                                    <h class="text-black-800 row justify-content-center text-center">Unggah KTP, Kartu Keluarga dan semua KTP pengikut (jika ada dan sudah memiliki KTP) dalam satu file berformat PDF dengan ukuran tidak melebihi 10 MB</h>
                                </b>
                                <hr width="150" align="Center" color="black">

                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="berkas" name="berkas" accept="application/pdf" required>
                                        <label class="custom-file-label" for="berkas" style="color: black;">Pilih berkas</label>
                                    </div>
                                </div>

                            </div>

                            <br>
                            <!-- Button trigger modal -->
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa-print" aria-hidden="true"> </i>
                                    Buat Surat
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah data - data yang dimasukan sudah sesuai dan benar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-primary">Buat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <br>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-print" aria-hidden="true"> </i> Submit
                                </button>
                            </div> -->
        </form>
    </div>

    </div>
    </div>
    </form>
    </div>
</font>
<!-- /.container-fluid -->
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

<script>
    function setanggota(name, i) {

        const temp1 = (<?php echo json_encode($anggota); ?>);
        const target = (temp1.find(i => i.name === name));
        document.getElementById('nikpengikut' + i).value = target.email;
        document.getElementById('jkpengikut' + i).value = target.jkelamin;
        document.getElementById('hubpengikut' + i).value = target.statuskeluarga;

    }
</script>