<!-- Begin Page Content -->
<font style="color: black;">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Laporan Surat Penerimaan Bantuan Sosial</h1>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <form method="get">
                    <div class="row">
                        <div class="col-sm">
                            <input type="date" name="tgl_mulai" class="form-control">
                        </div>
                        <div class="col-sm">
                            <input type="date" name="tgl_akhir" class="form-control">
                        </div>
                        <div class="col-sm">
                            <input type="submit" class="btn btn-info"></button>
                        </div>
                        <?php echo anchor('cetaksurat/laporanbansos?' . $_SERVER['QUERY_STRING'], '<div style=" padding: 7px 20px; font-size: 15px" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i> Cetak Laporan</div>') ?>
                    </div>
                </form>

                <br>

                <div style="overflow-x:auto;">
                    <table class="table table-striped table-bordered mt-4" bgcolor="white" id="example" width="100%">
                        <thead style="text-align:center">
                            <tr>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama Penerima</th>
                                <th scope="col">NIK Penerima</th>
                                <th scope="col">Jenis Bantuan Sosial</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <?php if (is_array($tampilbansos) || is_object($tampilbansos)) {
                                foreach ($tampilbansos as $data1) { ?>
                                    <tr>
                                        <td class="align-middle">
                                            <?php $originalDate = $data1->tglbuat;
                                            $newDate = strftime("%d %B %Y", strtotime($originalDate)); ?>
                                            <?php echo $newDate; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->nama; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->nik; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->jenisbansos; ?>
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