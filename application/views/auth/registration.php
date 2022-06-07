<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto" style="background-color: rgba(180, 180 , 180, 0.9);">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Isi formulir dibawah ini</h1>
            </div>
            <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">

              <div class="form-group" class="valid-feedback">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="NIK" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="nokk" name="nokk" placeholder="Nomor Kartu Keluarga" value="<?= set_value('nokk'); ?>">
                <?= form_error('nokk', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group row">

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control" id="tmptlahir" name="tmptlahir" placeholder="Tempat dan Tanggal Lahir" value="<?= set_value('tmptlahir'); ?>">
                </div>

                <div class="col-sm-6">
                  <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" placeholder="Tempat dan Tanggal Lahir" value="<?= set_value('tanggallahir'); ?>">
                </div>

                <?= form_error('tmptlahir', '<small class="text-danger pl-3">', '</small>'); ?>

              </div>

              <div class="form-group">
                <select class="form-control " id="jkelamin" name="jkelamin" placeholder="Jenis Kelamin" value="<?= set_value('jkelamin'); ?>">
                  <option value="">---Pilih salah satu---</option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <?= form_error('jkelamin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>


              <div class="form-group row">

                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control" id="password1" name="password1" placeholder="Kata Sandi">
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="col-sm-6">
                  <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulang Kata Sandi">
                </div>

              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <button type="submit" class="btn btn-success btn-user btn-block">
                Daftar
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="<?= base_url('auth/') ?>">Sudah punya akun? Masuk disini!</a>
            </div>
          </div>
          <font size="1" class="row justify-content-center" color="black">Copyright &copy; <?= date('Y') ?></font>
        </div>
      </div>
    </div>
  </div>

</div>