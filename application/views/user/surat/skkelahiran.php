<!-- Begin Page Content -->
<font color="black">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Surat Keterangan Kelahiran</h1>


        <form class="container" action="<?= $aksi ?>" method="post" enctype="multipart/form-data">
            <div class="container mt-3">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">


                        <h5 align="center">Contoh Tampilan Surat</h5>
                        <br>
                        <h1 style="text-align:center">
                            <img id="skkelahiran" src="<?= base_url('assets/img/templates/skkelahiran.jpg'); ?>" width="75%" alt="Surat Keterangan Tidak Mampu - Rumah Sakit" title='Surat Keterangan Kelahiran'>
                        </h1>
                        <hr color="black">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home2" role="tabpanel">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Isi Dengan Data Diri Anak</h>
                                    <hr width="150" align="Center" color="black">
                                </b>
                                <div class="p-20">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="">Nama Lengkap Anak</label>
                                                <input type="text" name="nama_anak" class="form-control" id="nama_pengaju" style="color: black;" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" name="tl_anak" class="form-control" id="tl_anak" style="color: black;" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Tanggal Lahir </label>
                                                <input type="date" name="tgl_anak" class="form-control" id="first" style="color: black;" onchange="setdate()" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Hari Kelahiran</label>
                                                <input type="text" name="hari_lahir" class="form-control" id="second" style="color: black;" required readonly>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Jam Kelahiran </label>
                                                <input type="time" name="jam" class="form-control" id="jam" style="color: black;" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Agama </label>
                                                <select name="agama_anak" id="agama_anak" class="form-control" style="color: black;" required>
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
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jk" id="jk" class="form-control" style="color: black;" required>
                                                    <option value="">---Pilih salah satu---</option>
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Anak Ke-</label>
                                                <input type="number" min="1" name="anakke" class="form-control" id="anakke" onChange="checkInput(this)" onKeyup="checkInput(this)" style="color: black;" required>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr color="black">
                            <b>
                                <h class="text-black-800 row justify-content-center">Data Diri Ibu</h>
                            </b>
                            <hr width="150" align="Center" color="black">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <div class="p-20">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Lengkap Ibu</label>
                                                    <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" style="color: black;" value="<?= $ibu["name"] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Tempat Lahir Ibu</label>
                                                    <input type="text" name="tl_ibu" class="form-control" id="tl_ibu" style="color: black;" value="<?= $ibu["tmptlahir"] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Tanggal Lahir Ibu</label>
                                                    <input type="text" name="tgl_ibu" class="form-control" id="tgl_ibu" style="color: black;" value="<?= strftime("%d %B %Y", strtotime($ibu["tanggallahir"]));  ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="">Agama Ibu</label>
                                                    <input type="text" name="agama_ibu" class="form-control" id="agama_ibu" style="color: black;" value="<?= $ibu["agama"] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Pekerjaan Ibu</label>
                                                    <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu" style="color: black;" value="<?= $ibu["pekerjaan"] ?>" readonly>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <hr color="black">
                                <b>
                                    <h class="text-black-800 row justify-content-center">Data Diri Ayah</h>
                                </b>
                                <hr width="150" align="Center" color="black">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home2" role="tabpanel">
                                        <div class="p-20">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap Ayah</label>
                                                        <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" style="color: black;" value="<?= $ayah["name"] ?>" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Tempat Lahir Ayah</label>
                                                        <input type="text" name="tl_ayah" class="form-control" id="tl_ayah" style="color: black;" value="<?= $ayah["tmptlahir"] ?>" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Tanggal Lahir Ayah </label>
                                                        <input type="text" name="tgl_ayah" class="form-control" id="tgl_ayah" style="color: black;" value="<?= strftime("%d %B %Y", strtotime($ayah["tanggallahir"]));  ?>" readonly>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="">Agama Ayah</label>
                                                        <input type="text" name="agama_ayah" class="form-control" id="agama_ayah" style="color: black;" value="<?= $ayah["agama"] ?>" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Pekerjaan ayah</label>
                                                        <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" style="color: black;" value="<?= $ayah["pekerjaan"] ?>" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Alamat</label>
                                                        <textarea name="alamat" id="alamat" class="form-control" style="color: black;" readonly><?= $ayah["alamat"] ?></textarea>
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label for="">Alasan membuat Surat Keterangan Kelahiran</label>
                                                        <textarea name="alasansklahir" id="alasansklahir" class="form-control" style="color: black;" maxlength="200" placeholder="Maksimal 200 karakter..." required></textarea>
                                                    </div> -->

                                                    <div class="form-group">
                                                        <input type="hidden" name="jenissurat" value="Surat Keterangan Kelahiran">
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
                                    <h class="text-black-800 row justify-content-center text-center">Unggah KTP, Kartu Keluarga, Pengantar RT/RW dan Surat Keterangan dari Bidan / Rumah Sakit dalam satu file berformat PDF dengan ukuran tidak melebihi 10 MB</h>
                                </b>
                                <hr width="150" align="Center" color="black">

                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="berkas" name="berkas" accept="application/pdf" required>
                                        <label class="custom-file-label" for="berkas" style="color: black;">Pilih berkas</label>
                                    </div>
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