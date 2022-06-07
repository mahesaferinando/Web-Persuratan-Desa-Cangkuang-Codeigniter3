    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div class="sticky-top">
        <a class=" sidebar-brand d-flex align-items-center justify-content-center">
          <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo/logo.png') ?>" width="40" height="40">
          </div>
          <div class="sidebar-brand-text mx-3" style="color: white;">Desa Cangkuang</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Query Menu -->

        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "  SELECT `user_menu`.`id`, `menu`
                        FROM `user_menu` JOIN `user_access_menu`
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                       WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
        $menu = $this->db->query($queryMenu)->result_array();

        ?>

        <!-- Looping Menu -->
        <?php foreach ($menu as $m) : ?>
          <div class="sidebar-heading">
            <?= $m['menu']; ?>
          </div>

          <!-- Menyiapkan sub-menu -->
          <?php
          $menuId = $m['id'];
          $querySubMenu = "SELECT *
                        FROM `user_sub_menu` JOIN `user_menu`
                          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                       WHERE `user_sub_menu`.`menu_id` = $menuId
                         AND `user_sub_menu`.`is_active` = 1
                    ";
          $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>

          <?php foreach ($subMenu as $sm) : ?>

            <!-- Nav Item - Dashboard -->
            <?php if ($title == $sm['title']) : ?>
              <li class="nav-item active">
              <?php else : ?>
              <li class="nav-item">
              <?php endif; ?>
              <a class="nav-link pb-1" href="<?= base_url($sm['url']); ?>">


                <!-- <div class="row align-items-center">
                  <div class="col col-lg-2">
                    <i class="<?= $sm['icon']; ?>" style="font-size: 1em;"></i>
                  </div>
                  <div class="col">
                    <?= $sm['title']; ?></span>
                  </div>
                </div> -->



                <i class="<?= $sm['icon']; ?>"></i>
                <span><?= $sm['title']; ?></span>
              </a>
              </li>

            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider mt-1">

          <?php endforeach; ?>

          <!-- Divider -->
          <!-- <hr class="sidebar-divider d-none d-md-block"> -->

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
      </div>
    </ul>
    <!-- End of Sidebar -->