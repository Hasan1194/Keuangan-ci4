<?= $this->extend('layout/template');  ?>
<?= $this->section('content');  ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Search --**    -->
            <h1> Laporan </h1>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('nama');  ?></span>
                        <img class="img-profile rounded-circle"
                            src="<?= base_url('Assets/img/bee.png');  ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/Profile">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">Laporan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th >Nama</th>
                                            <th>Jumlah Transaksi</th>
                                            <th>Jumlah Total Uang</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pemasukan</td>
                                            <td><?= count($pm); ?></td>
                                        <td>Rp. 
                                            <?php 
                                                $total_pemasukan = 0;
                                                foreach ($pm as $a) {
                                                    $total_pemasukan += $a['jumlah'];
                                                }
                                                echo number_format($total_pemasukan, 2, ',', '.');  
                                            ?>
                                        </td>
                                            <td>
                                                <a href="<?= base_url('/exportPendapatan'); ?>" class="btn btn-primary btn-md"><i class="fas fa-download"></i> Cetak</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pengeluaran</td>
                                            <td><?= count($p); ?></td>
                                            <td>Rp. 
                                                <?php 
                                                    $total_pengeluaran = 0;
                                                    foreach ($p as $b) {
                                                        $total_pengeluaran += $b['jumlah'];
                                                    }
                                                    echo number_format($total_pengeluaran, 2, ',', '.');  
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/exportPengeluaran'); ?>" class="btn btn-primary btn-md"><i class="fas fa-download"></i> Cetak</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?= $this->endSection();  ?>