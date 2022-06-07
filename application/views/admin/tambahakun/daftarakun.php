<!-- Begin Page Content -->
<font style="color: black;">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Daftar Akun</h1>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <div style="overflow-x:auto;">
                    <table class="table table-striped table-bordered mt-4" bgcolor="white" id="example" width="100%">
                        <thead style="text-align:center">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">No. KK</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tangal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Status Keluarga</th>
                                <th scope="col">Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <?php if (is_array($akun) || is_object($akun)) {
                                foreach ($akun as $data1) { ?>
                                    <tr>

                                        <td class="align-middle" style="width: 15%;">
                                            <?php echo $data1->name; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->email; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->nokk; ?>
                                        </td>

                                        <td class="align-middle" style="width: 15%;">
                                            <?php echo $data1->tmptlahir; ?>
                                        </td>

                                        <td class="align-middle" style="width: 20%;">
                                            <?php $originalDate = $data1->tanggallahir;
                                            $newDate = strftime("%d %B %Y", strtotime($originalDate)); ?>
                                            <?php echo $newDate; ?>
                                        </td>

                                        <td class="align-middle" style="width: 30%;">
                                            <?php echo $data1->alamat; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->statuskeluarga; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $data1->jkelamin; ?>
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