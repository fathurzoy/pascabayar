  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="<?= base_url(); ?>/admin/dashboard.php">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="<?= base_url(); ?>/admin/profile.php">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="#">
                          <i class="bi bi-circle"></i><span>Alerts</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Components Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="<?= base_url() ?>/admin/user.php">
                  <i class="bi bi-people-fill"></i><span>User</span>
              </a>
          </li><!-- End Tarif Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="<?= base_url() ?>/admin/pelanggan.php">
                  <i class="bx bxs-user-account"></i><span>Pelanggan</span>
              </a>
          </li><!-- End Tarif Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="<?= base_url() ?>/admin/tarif.php">
                  <i class="bx bxs-customize"></i><span>Tarif</span>
              </a>
          </li><!-- End Tarif Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="/admin/logout.php">
                  <i class="bi bi-box-arrow-in-right"></i>
                  <span>Logout</span>
              </a>
          </li><!-- End Login Page Nav -->


      </ul>

  </aside><!-- End Sidebar-->