<font color="black">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Status Persetujuan Bantuan Sosial</h1>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <div style="overflow-x:auto;">
                    <table class="table table-striped table-bordered mt-4" bgcolor="white" id="example" width="100%">
                        <thead style="text-align:center">
                            <tr>
                                <th scope="col">Nama Pengaju</th>
                                <th scope="col">Nama Penerima Bantuan</th>
                                <th scope="col">NIK Penerima Bantuan</th>
                                <th scope="col">Tanggal Pengajuan</th>z
                                <th scope="col">Jenis Bantuan Sosial</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <?php if (is_array($status) || is_object($status)) {
                                foreach ($status as $data1) { ?>
                                    <tr>

                                        <td class="align-middle">
                                            <?php echo $data1->name; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->nama; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->nik; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php $originalDate = $data1->tglbuat;
                                            $newDate = strftime("%d %B %Y", strtotime($originalDate)); ?>
                                            <?php echo $newDate; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->jenisbansos; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php
                                            if ($data1->kondisi == 0) {
                                                echo "Bantuan belum dikonfirmasi";
                                            } elseif ($data1->kondisi == 1) {
                                                echo "Bantuan disetujui";
                                            } else {
                                                echo "Bantuan ditolak karena berkas tidak lengkap";
                                            }
                                            ?>
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