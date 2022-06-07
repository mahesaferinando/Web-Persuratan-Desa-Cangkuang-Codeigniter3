<!-- Begin Page Content -->
<font style="color: black;">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Arsip Surat Keterangan Kelahiran</h1>

        <div id="sklahir" class="">

            <div style="overflow-x:auto;">
                <table class="table table-striped table-bordered mt-4" bgcolor="white" id="example" width="100%">
                    <thead style="text-align:center">
                        <tr>
                            <th scope="col">Nama Anak</th>
                            <th scope="col">Nama Ibu</th>
                            <th scope="col">Nama Ayah</th>
                            <th scope="col">Arsip Surat</th>
                        </tr>
                    </thead>
                    <tbody style="text-align:center">
                        <?php if (is_array($sklahir) || is_object($sklahir)) {
                            foreach ($sklahir as $data1) { ?>

                                <tr>
                                    <td class="align-middle" style="width: 10%">
                                        <?php echo $data1->nama_anak; ?>
                                    </td>

                                    <td class="align-middle" style="width: 10%">
                                        <?php echo $data1->nama_ibu; ?>
                                    </td>

                                    <td class="align-middle" style="width: 10%">
                                        <?php echo $data1->nama_ayah; ?>
                                    </td>

                                    <td class="align-middle" style="width: 10%">
                                        <?php echo anchor('cetaksurat/arsipsktm/' . $data1->id, '<div style="" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i> Unduh</div>') ?>
                                    </td>

                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
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