        <!-- Begin Page Content -->
        <font style="color: black;">
          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-black-800 row justify-content-center"><?= $title; ?></h1>


            <div class="col-lg-6">
              <?= $this->session->flashdata('message'); ?>
              <?php unset($_SESSION['message']); ?>
            </div>

            <div class="jumbotron jumbotron-fluid">

              <div class="card mb-3 mx-5" style="max-width: 1024px;">
                <div class="row no-gutters">

                  <div class="col-md-4 mt-4">
                    <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img">
                  </div>

                  <div class="col-md-8">
                    <div class="card-body ">
                      <h4>Nama Lengkap</h4>
                      <h5 class="card-title "><?= $user['name']; ?></h5>
                      <hr>
                      <h4>NIK</h4>
                      <p class="card-text"><?= $user['email']; ?></p>
                      <!-- <p class="card-text"><small class="text-muted">Akun ini dibuat pada <?= date('l d F Y', $user['date_created']) ?> </small></p> -->
                      <hr>
                      <h4>No. Kartu Keluarga</h4>
                      <p class="card-text"><?= $user['nokk']; ?></p>
                      <hr>
                      <h4>Alamat</h4>
                      <p class="card-text"><?= $user['alamat']; ?></p>
                    </div>
                  </div>

                </div>
              </div>

            </div>

          </div>
        </font>
        <!-- /.container-fluid -->

        <!-- End of Main Content -->