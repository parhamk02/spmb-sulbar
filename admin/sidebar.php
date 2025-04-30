<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home" class="brand-link">
        <img src="images/tutwuri1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SPMB SULBAR</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/avatar04.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <?php
            if ($_SESSION['level']=="Pengguna") {
            ?>
              <a href="edit-sekolah<?php echo $_SESSION['id']; ?>" class="d-block"><?php echo $_SESSION ['name']; ?></a>
            <?php 
            }else{
            ?>
              <a href="edit-admin<?php echo $_SESSION['id']; ?>" class="d-block"><?php echo $_SESSION ['name']; ?></a>
            <?php
            }
            ?>
          </div>
        </div>
       

        <!-- Sidebar Menu -->
        <nav class="mt-2"> 
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item" class="<?php echo $aktif ?>">
              <a href="dashboard" class="nav-link <?php echo $aktif ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  DASHBOARD
                </p>
              </a>
            </li>

            <?php if($_SESSION['level']=="Admin"){
            ?>
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  DATA                  
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="data-kec" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA KECAMATAN</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-kel" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA KELURAHAN/DESA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-sekolah" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA SEKOLAH</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-jalurspmb" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA JALUR SPMB</p>
                  </a>
                </li>
                <!--<li class="nav-item">
                  <a href="data-domisili" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA DOMISILI</p>
                  </a>
                </li>-->
                <li class="nav-item">
                  <a href="data-jurusan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA JURUSAN SMK</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-jadwal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA JADWAL</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview" class="<?php echo $users ?>">
              <a href="data-admin" class="nav-link <?php echo $users ?>">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                  Users 
                </p>
              </a> 
            </li>
            <li class="nav-item has-treeview" class="">
              <a href="data-spmb" class="nav-link">
                <i class="nav-icon fas fa-check-circle"></i>
                <p>
                  SPMB 
                </p>
              </a> 
            </li>    
            <li class="nav-item has-treeview">
              <a href="data-siswa" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  DATA SISWA
                </p>
              </a> 
            </li>
            <?php 
            }
            if($_SESSION['level']=="Pengguna"){
            ?>
            <li class="nav-item has-treeview">
              <a href="dataspmb" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  DATA SPMB
                </p>
              </a> 
            </li>
            <?php 
            if($_SESSION['jenjang']=="SMK"){
            ?>
            <li class="nav-item">
                  <a href="datajurusan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA JURUSAN</p>
                  </a>
                </li>
            <?php
            }
            ?>
            <li class="nav-item has-treeview">
              <a href="data-siswa" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  DATA SISWA
                </p>
              </a> 
            </li>
            <?php 
            }elseif ($_SESSION['level']=="Dinas") {
            ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  DATA                  
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="data-sekolah" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA SEKOLAH</p>
                  </a>
                </li>
                <!--<li class="nav-item">
                  <a href="data-domisili" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA DOMISILI</p>
                  </a>
                </li>-->
                <li class="nav-item">
                  <a href="data-jadwal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DATA JADWAL</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="data-spmb" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  DATA SPMB
                </p>
              </a> 
            </li>
            <li class="nav-item has-treeview">
              <a href="data-siswa" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  DATA SISWA
                </p>
              </a> 
            </li>
            <?php
            } 
            ?>
            <!--<li class="nav-item has-treeview">
              <a href="menu_nuptk.php" class="nav-link">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                  NUPTK
                </p>
              </a> 
            </li>-->
            <li class="nav-item has-treeview">
              <a href="keluar" class="nav-link">
                <i class="nav-icon fas fa-window-close"></i>
                <p>
                  KELUAR
                </p>
              </a> 
            </li>                         
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>