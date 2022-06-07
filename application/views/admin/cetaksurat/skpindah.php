<!-- Begin Page Content -->
<font style="color: black;">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Cetak Surat Keterangan Pindah</h1>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <div id="sktm" class="">
                    <h3 class="row justify-content-center mt-3">Daftar surat yang perlu dicetak</h3>

                    <div class="text-center mt-4">
                        <h6 class="row justify-content-center">
                            <?= $this->session->flashdata('pesansurat'); ?>
                            <?php unset($_SESSION['pesansurat']); ?>
                        </h6>
                    </div>

                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-bordered mt-4" bgcolor="white" id="example" width="100%">
                            <thead style="text-align:center">
                                <tr>
                                    <th scope="col">Nama Pengaju</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">No. KK</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Berkas</th>
                                    <th scope="col">Cetak</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                <?php if (is_array($skpindah) || is_object($skpindah)) {
                                    foreach ($skpindah as $data1) { ?>
                                        <tr>
                                            <td class="align-middle">
                                                <?php echo $data1->namapengaju; ?>
                                            </td>

                                            <td class="align-middle">
                                                <?php echo $data1->nik_pengaju; ?>
                                            </td>

                                            <td class="align-middle">
                                                <?php echo $data1->nokk; ?>
                                            </td>

                                            <td class="align-middle">
                                                <?php echo $data1->alasan; ?>
                                            </td>

                                            <td class="align-middle" style="width: 10%">
                                                <?php echo anchor('assets/upload/skpindah/' . $data1->berkas, '<div style="" class="btn btn-sm btn-primary"><i class="fa fa-file-download"></i> Unduh</div>') ?>
                                            </td>

                                            <td class="align-middle" style="width: 10%">
                                                <?php echo anchor('cetaksurat/skpindah/' . $data1->id, '<div style="" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i> Cetak</div>') ?>
                                            </td>

                                            <td class="align-middle" style="width: 10%">
                                                <div class="mx-2">
                                                    <?php echo anchor('admin/skpindahselesai/' . $data1->id, '<div style="margin-top:10px" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Selesai</div>') ?>

                                                    <?php echo anchor('admin/skpindahditolak/' . $data1->id, '<div style="margin-top:10px" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Ditolak</div>') ?>
                                                </div>
                                            </td>

                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
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