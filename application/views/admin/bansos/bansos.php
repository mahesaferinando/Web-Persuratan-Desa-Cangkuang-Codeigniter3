<!-- Begin Page Content -->
<font style="color: black;">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Persetujuan bantuan sosial</h1>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <div id="bansos" class="">
                    <!-- <h3 class="row justify-content-center mt-3">Daftar surat yang perlu dicetak</h3> -->

                    <div class="text-center mt-4">
                        <h6 class="row justify-content-center">
                            <?= $this->session->flashdata('pesansurat'); ?>
                            <?php unset($_SESSION['pesansurat']); ?>
                        </h6>
                    </div>

                    <table class="table table-striped table-bordered table-sm mt-4" bgcolor="white" id="example">
                        <thead style="text-align:center">
                            <tr>
                                <th scope="col">Nama Pengaju</th>
                                <th scope="col">Nama Penerima</th>
                                <th scope="col">NIK Penerima</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Alasan Menerima</th>
                                <th scope="col">Jenis Bansos</th>
                                <th scope="col">Berkas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <?php if (is_array($bansos) || is_object($bansos)) {
                                foreach ($bansos as $data1) { ?>
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

                                        <td class="align-middle" style="width: 20%">
                                            <?php echo $data1->alamat; ?>
                                        </td>

                                        <td class="align-middle" style="width: 20%">
                                            <?php echo $data1->pekerjaan; ?>
                                        </td>

                                        <td class="align-middle" style="width: 30%">
                                            <?php echo $data1->alasanbansos; ?>
                                        </td>

                                        <td class="align-middle" style="width: 10%">
                                            <?php echo $data1->jenisbansos; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo anchor('assets/upload/bantuan/' . $data1->berkas, '<div class="btn btn-sm btn-primary" ><i class="fa fa-file-download"></i> Unduh</div>') ?>
                                        </td>

                                        <td class="align-middle" style="width: 10%">
                                            <div class="mx-3">
                                                <?php echo anchor('admin/bansosditerima/' . $data1->id, '<div  class="btn btn-sm btn-primary" style="margin-top:10px"><i class="fa fa-check"></i> Diterima</div>') ?>

                                                <?php echo anchor('admin/bansosditolak/' . $data1->id, '<div class="btn btn-sm btn-danger" style="margin-top:10px"><i class="fa fa-times"></i> Ditolak</div>') ?>
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