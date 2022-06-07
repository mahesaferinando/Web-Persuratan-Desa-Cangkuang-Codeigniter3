<!-- Begin Page Content -->
<font color="black">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Surat Keterangan Tidak Mampu</h1>


        <form class="container" action="<?= $aksi ?>" method="post" enctype="multipart/form-data">
            <div class="container mt-3">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5 align="center">Contoh Tampilan Surat</h5>
                        <br>
                        <h1 style="text-align:center">
                            <img id="sktmrs" src="<?= base_url('assets/img/templates/sktmRS.jpg'); ?>" width="75%" alt="Surat Keterangan Tidak Mampu - Rumah Sakit" title='Surat Keterangan Tidak Mampu - Rumah Sakit'>
                        </h1>
                        <hr color="black">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home2" role="tabpanel">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Data Diri Pengaju</h>
                                    <hr width="150" align="Center" color="black">
                                </b>
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" name="nama_pengaju" class="form-control" id="nama_pengaju" value="<?= $user['name']; ?>" style="color: black;" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Nomor Induk Penduduk</label>
                                                <input type="text" name="nik_pengaju" class="form-control" id="nik_pengaju" value="<?= $user['email']; ?>" maxlength="16" onkeypress="return hanyaAngka(event)" pattern=".{16,}" title="NIK harus 16 digit angka" style="color: black;" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" name="tl_pengaju" class="form-control" id="tl_pengaju" value="<?= $user['tmptlahir']; ?>" style="color: black;" readonly required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Tanggal Lahir </label>
                                                <input type="text" name="tanggallahir_pengaju" class="form-control" id="tanggallahir_pengaju" style="color: black;" value="<?= strftime("%d %B %Y", strtotime($user["tanggallahir"]));  ?>" readonly required>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="">Jenis Kelamin </label>
                                                <select name="jk" class="form-control" style="color: black;" required>
                                                    <option value="">---Pilih salah satu---</option>
                                                    <option value="Laki - laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div> -->

                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <input type="text" name="jk" class="form-control" id="jk" value="<?= $user['jkelamin']; ?>" style="color: black;" required readonly>
                                            </div>


                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Agama </label>
                                                <input type="text" name="agama" class="form-control" id="agama" value="<?= $user['agama']; ?>" style="color: black;" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Status Perkawinan</label>
                                                <input type="text" name="status" class="form-control" id="status" value="<?= $user['statuskawin']; ?>" style="color: black;" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Pekerjaan</label>
                                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $user['pekerjaan']; ?>" style="color: black;" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <textarea name="alamat" id="alamat" class="form-control" required style="color: black;" readonly><?= $user['alamat']; ?></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr color="black">
                            <b>
                                <h class="text-black-800 row justify-content-center">Isi Dengan Data Diri Pemohon</h>
                            </b>
                            <hr width="150" align="Center" color="black">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <div class="p-20">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" name="nama_pemohon" class="form-control" id="nama_pemohon" style="color: black;" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Tempat Lahir Pemohon </label>
                                                    <input type="text" name="tl_pemohon" class="form-control" id="tl_pemohon" style="color: black;" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tanggal Lahir Pemohon</label>
                                                    <input type="date" name="tgllahir_pemohon" class="form-control" id="tgllahir_pemohon" maxlength="16" onkeypress="return hanyaAngka(event)" style="color: black;" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Alasan membuat SKTM - RS</label>
                                                    <textarea name="alasansktm" id="alasansktm" class="form-control" maxlength="200" placeholder="Maksimal 200 karakter..." required style="color: black;"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" name="jenissurat" value="Surat Keterangan Tidak Mampu - RS">
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr color="black">
                            <b>
                                <h class="text-black-800 row justify-content-center text-center">Unggah persyaratan seperti KTP penerima, Kartu Keluarga penerima, dan Surat Pengantar RT/RW dalam satu file berformat PDF dengan ukuran tidak melebihi 10 MB</h>
                            </b>
                            <hr width="150" align="Center" color="black">

                            <div class="col-sm-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="berkas" name="berkas" accept="application/pdf" required>
                                    <label class="custom-file-label" for="berkas" style="color: black;">Pilih berkas</label>
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