        <!-- Begin Page Content -->
        <font color="black">
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-black-800 row justify-content-center">Pendaftaran Bantuan Sosial</h1>

                <form class="container" action="<?= $aksi ?>" method="post" enctype="multipart/form-data">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="lead">
                                <b class="row justify-content-center text-center">
                                    Di halaman ini pengguna bisa mendaftarkan keluarga sendiri atau keluarga orang lain untuk mendapatkan bantuan sosial yang masih berdomisili di Desa Cangkuang.
                                </b>
                            </p>
                            <hr color="black">

                            <div class="p-20">
                                <div class="row justify-content-center text-center">

                                    <div class="col-md-6" style="border-right: 1px solid black;">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                            Klik untuk melihat persyaratan BLT
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="text-align: justify;">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Ketentuan Bantuan Langsung Tunai</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="lead">

                                                            <b>
                                                                <h6 class="row justify-content-center text-center">Kriteria BLT:</h6>
                                                            </b>

                                                            1. Calon penerima bansos merupakan masyarakat yang termasuk dalam data RT/RW dan berada di Desa.
                                                            <br>
                                                            2. Calon penerima kehilangan mata pencarian akibat pandemi Covid-19.
                                                            <br>
                                                            3. Calon penerima tidak terdaftar sebagai penerima bantuan sosial (bansos) lain dari pemerintah pusat. Hal tersebut berarti calon penerima BLT dari Dana Desa tidak menerima Program Keluarga Harapan (PKH), Kartu Sembako, Paket Sembako, Bantuan Pangan Non Tunai (BPNT) hingga Kartu Prakerja.
                                                            <br>
                                                            4. Apabila calon penerima bansos tidak terdaftar di program lain, tetapi belum terdaftar oleh RT/RW, maka bisa langsung melapor ke kepala desa.
                                                            <br>
                                                            5. Jika penerima sudah terdaftar dan valid maka BLT akan diberikan melalui tunai dan non tunai. Non tunai diberikan melalui transfer ke rekening bank penerima dan tunai boleh menghubungi aparat desa, bank milik negara atau diambil langsung di kantor pos terdekat.
                                                            <br>
                                                            6. Bukan sebagai anggota keluarga Pegawai Begeri Sipil, TNI maupun POLRI
                                                            <br>
                                                            <br>

                                                            Kelengkapan berkas:
                                                            <br>
                                                            - KTP
                                                            <br>
                                                            - KK
                                                            <br>
                                                            - Surat Pengantar RT RW

                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Klik untuk melihat persyaratan PKH
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: justify;">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ketentuan Program Keluarga Harapan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="lead">

                                                            <b>
                                                                <h6 class="row justify-content-center text-center">Kriteria PKH:</h6>
                                                            </b>

                                                            PKH ditunjukan kepada Keluarga yang kurang mampu dalam segi ekonomi, maupun masuk dalam kategori Fakir miskin. yang berdomisili di Desa Cangkuang, berikut kriterianya:
                                                            <br>
                                                            1. ibu hamil/menyusui, memiki anak berusia 0 sampai dengan 5 tahun 11 bulan.
                                                            <br>
                                                            2. Memiliki anak SD/MI atau sederajat, memiliki anak SMP/MTs atau sederajat.
                                                            <br>
                                                            3.Memiliki anak anak SMA/MA atau sederajat.
                                                            <br>
                                                            4.Anak usia 6 sampai dengan 21 tahun yang belum menyelesaikan wajib belajar 12 tahun.
                                                            <br>
                                                            5.Keluarga lanjut usia diutamakan mulai dari 70 tahun dan penyandang disabilitas diutamakan penyandang disabilitas berat.
                                                            <br>
                                                            6. Bukan sebagai anggota keluarga Pegawai Begeri Sipil, TNI maupun POLRI
                                                            <br>
                                                            <br>

                                                            Kelengkapan berkas:
                                                            <br>
                                                            - KTP
                                                            <br>
                                                            - KK
                                                            <br>
                                                            - Foto Selfie dengan Rumah
                                                            <br>
                                                            - Foto Rumah

                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div style="text-align: justify;">
                                <h6 class="row justify-content-center text center">
                                    <b>
                                        Pengingat:
                                    </b>
                                </h6>

                                <p>
                                    Diterima pendaftaran bukan berarti akan pasti diterima sebagai terpilih penerima bantuan, namun akan ada proses lebih lanjut oleh TIM Survei Desa Cangkuang untuk keterangan lebih lanjut. anda bisa melihat status pendaftaran diterima atau ditolak dalam halaman Status Pengajuan Surat & pengajuan pendaftaran. Jika diterima maka anda telah melengkapi berkas dengan sesuai dan akan dilakukan penyurveian Oleh Tim Survei Desa Cangkuang, Apabila tertolak maka ada data yang belum sesuai atau belum melengkapi berkas dengan benar.
                                </p>
                            </div>

                            <hr color="black">

                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <b>
                                        <h class="text-black-800 row justify-content-center">Isi dengan data orang yang akan menerima bantuan</h>
                                        <hr width="150" align="Center" color="black">
                                    </b>
                                    <div class="p-20">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" id="nama" style="color: black;" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Nomor Induk Penduduk</label>
                                                    <input type="text" name="nik" class="form-control" id="nik" maxlength="16" onkeypress="return hanyaAngka(event)" pattern=".{16,}" title="NIK harus 16 digit angka" style="color: black;" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Nomor Kartu Keluarga</label>
                                                    <input type="text" name="nokk" class="form-control" id="nokk" maxlength="16" onkeypress="return hanyaAngka(event)" pattern=".{16,}" title="NIK harus 16 digit angka" style="color: black;" required>
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

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="">Tanggal Lahir </label>
                                                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" style="color: black;" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Jenis Bantuan Sosial</label>
                                                    <select name="jenisbansos" id="jenisbansos" class="form-control" style="color: black;" required>
                                                        <option value="">---Pilih salah satu---</option>
                                                        <option value="Program Keluarga Harapan (PKH)">Program Keluarga Harapan (PKH)</option>
                                                        <option value="Bantuan Langsung Tunai (BLT)">Bantuan Langsung Tunai (BLT)</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Alamat</label>
                                                    <textarea name="alamat" id="alamat" class="form-control" required style="color: black;"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Alasan mengajukan bantuan sosial</label>
                                                    <textarea name="alasanbansos" id="alasanbansos" class="form-control" required maxlength="200" placeholder="Maksimal 200 karakter..." style="color: black;"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>">
                                                </div>

                                            </div>
                                        </div>

                                        <hr color="black">
                                        <b>
                                            <h class="text-black-800 row justify-content-center text-center">Unggah berkas berbentuk PDF dan ukuran maksimal 10 MB</h>
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

                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </font>
        <!-- /.container-fluid -->
        <!-- End of Main Content -->

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