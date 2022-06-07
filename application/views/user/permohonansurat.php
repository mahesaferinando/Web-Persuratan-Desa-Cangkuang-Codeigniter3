<!-- Begin Page Content -->
<font color="black">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center"><?= $title; ?></h1>

        <div>
            <h6 class="row justify-content-center">
                <?= $this->session->flashdata('pesan1'); ?>
                <?php unset($_SESSION['pesan1']); ?>
            </h6>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="card-deck">

                    <div class="card">
                        <a href="<?= base_url('user/sktm') ?>">
                            <img class="card-img-top" src="<?= base_url('assets/img/thumbnail/rumahsakit.jpg') ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <p class="card-text">
                            <div class="col text-center">
                                <a href="<?= base_url('user/sktm') ?>" class="btn btn-primary">
                                    <i class="fa fa-envelope"></i> Buat Surat
                                </a>
                            </div>
                            </p>
                            <div class="dropdown-divider"></div>
                            <p class="card-text text-center">Surat Keterangan Tidak Mampu - Rumah Sakit</p>
                        </div>
                    </div>

                    <div class="card">
                        <a href="<?= base_url('user/skkelahiran') ?>">
                            <img class="card-img-top" src="<?= base_url('assets/img/thumbnail/kelahiran.jpg') ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <p class="card-text">
                            <div class="col text-center">
                                <a href="<?= base_url('user/skkelahiran') ?>" class="btn btn-primary">
                                    <i class="fa fa-envelope"></i> Buat Surat
                                </a>
                            </div>
                            </p>
                            <div class="dropdown-divider"></div>
                            <p class="card-text text-center">Surat Keterangan Kelahiran</p>
                        </div>
                    </div>

                    <div class="card">
                        <a href="<?= base_url('user/skkematian') ?>">
                            <img class="card-img-top" src="<?= base_url('assets/img/thumbnail/suratkematian.jpg') ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <p class="card-text">
                            <div class="col text-center">
                                <a href="<?= base_url('user/skkematian') ?>" class="btn btn-primary">
                                    <i class="fa fa-envelope"></i> Buat Surat
                                </a>
                            </div>
                            </p>
                            <div class="dropdown-divider"></div>
                            <p class="card-text text-center">Surat Keterangan Kematian</p>
                        </div>
                    </div>

                    <div class="card">
                        <a href="<?= base_url('user/skpindah') ?>">
                            <img class="card-img-top" src="<?= base_url('assets/img/thumbnail/suratpindah.jpg') ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <p class="card-text">
                            <div class="col text-center">
                                <a href="<?= base_url('user/skpindah') ?>" class="btn btn-primary">
                                    <i class="fa fa-envelope"></i> Buat Surat
                                </a>
                            </div>
                            </p>
                            <div class="dropdown-divider"></div>
                            <p class="card-text text-center">Surat Keterangan Surat Pindah</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
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