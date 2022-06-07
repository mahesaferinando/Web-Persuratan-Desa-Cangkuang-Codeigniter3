        <!-- Begin Page Content -->
        <font color="black">
          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-black-800 row justify-content-center">Surat yang perlu dicetak</h1>

            <div class="jumbotron jumbotron-fluid">
              <div class="container">

                <div class="row">
                  <!-- Earnings (Monthly) Card Example -->

                  <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('admin/cetaksktm'); ?>" class="btn">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Keterangan Tidak Mampu</div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800"> <?php echo $jumlahsktm; ?> Surat perlu dicetak</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-scroll fa-2x text-gray-800"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('admin/cetaksklahir'); ?>" class="btn">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Keterangan Kelahiran</div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlahsklahir; ?> Surat perlu dicetak</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-scroll fa-2x text-gray-800"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('admin/cetakskkematian'); ?>" class="btn">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Keterangan Kematian</div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahskkematian; ?> Surat perlu dicetak</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-scroll fa-2x text-gray-800"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Pending Requests Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('admin/cetakskpindah'); ?>" class="btn">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Keterangan Pindah</div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahskpindah; ?> Surat perlu dicetak</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-scroll fa-2x text-gray-800"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Pending Requests Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('admin/bansos'); ?>" class="btn">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengajuan Bantuan Sosial</div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahbansos; ?> Pengajuan perlu dipersetujui</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-scroll fa-2x text-gray-800"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                </div>

              </div>
            </div>

          </div>
        </font>
        <!-- /.container-fluid -->
        <!-- End of Main Content -->