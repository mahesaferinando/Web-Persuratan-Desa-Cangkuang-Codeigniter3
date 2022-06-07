<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-6">
      <div class="card o-hidden border-3 shadow-lg my-1 mx-2 mt-3" style="background-color: rgba(164, 182 , 232, 0.7);">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <h1 class="row justify-content-center">
                  <img src="<?= base_url('assets/img/logo/logo.png') ?>" width="100" height="100">
                </h1>
                <h1 class="h4 text-gray-900 mb-4 row justify-content-center">
                  <b>
                    Desa Cangkuang
                  </b>
                </h1>
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Selamat datang! Silakan masuk dengan menggunakan NIK</h1>
                </div>

                <?= $this->session->flashdata('message'); ?>
                <?php unset($_SESSION['message']); ?>

                <form class="user" method="post" action="<?= base_url('auth/') ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukan NIK" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-success btn-user btn-block">
                    Masuk
                  </button>

                </form>
                <hr>
                <!--<div class="text-center">
                    <a class="small" href="forgot-password.html">Lupa kata sandi?</a>
                  </div>-->
                <!-- <div class="text-center">
                  <a class="small" href="<?= base_url('auth/registration') ?>">Buat akunmu!</a>
                </div> -->
              </div>
              <b>
                <font size="1" class="row justify-content-center" color="black">Copyright &copy; DESA CANGKUANG <?= date('Y') ?>
                </font>
              </b>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>