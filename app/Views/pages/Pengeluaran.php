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
            <!-- Topbar Search -->
            <h1> Pengeluaran </h1>
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
                        <h4 class="m-0 font-weight-bold text-dark">Transaksi Keluar
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#myModalTambah" ><i class="fa fa-plus"> Pengeluaran</i></button>
                        </h4>
                        </div>
                        <div class="card-body">
                        <?php if(session()->getFlashdata('Pesan')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('Pesan'); ?>
                                </div>
                            <?php endif;  if(session()->getFlashdata('Kosong')): ?>
                                <div class="alert alert-warning" role="alert">
                                    <?= session()->getFlashdata('Kosong'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pm as $p) :?>
                                        <tr>
                                            <td><?= $i++;  ?></td>
                                            <td><?= $p['tgl_pengeluaran'];  ?></td>
                                            <td>Rp. <?=number_format($p['jumlah'],2,',','.');  ?></td>
                                            <td><?= $p['catatan'];  ?></td>
                                            <td>
                                                <!-- Button for edit & delete modal -->
                                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalEdit<?= $p['id_pengeluaran']; ?>"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModalHapus<?= $p['id_pengeluaran']; ?>"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="myModalEdit<?= $p['id_pengeluaran']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Data Pengeluaran</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="/Pengeluaran/edit/<?= $p['id_pengeluaran']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Id</label>
                                                                <input type="text" name="id_pengeluaran" class="form-control" value="<?= $p['id_pengeluaran']; ?>" readonly>      
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Tanggal</label>
                                                                <input type="date" name="tgl_pengeluaran" class="form-control" value="<?= $p['tgl_pengeluaran']; ?>">      
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jumlah</label>
                                                                <input type="number" name="jumlah" class="form-control" value="<?= $p['jumlah']; ?>">      
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Catatan</label>
                                                                <input type="text" name="catatan" class="form-control" value="<?= $p['catatan']; ?>" >   
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">  
                                                            <button type="submit" class="btn btn-success">Edit</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Modal Edit -->
                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="myModalHapus<?= $p['id_pengeluaran']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data Pengeluaran</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">  
                                                        <a href="/Pengeluaran/delete/<?= $p['id_pengeluaran']; ?>" class="btn btn-danger">Hapus</a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Modal Hapus -->
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModalTambah" role="dialog">
                        <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                            <h4 class="modal-title">Tambah Pengeluaran</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- body modal -->
                            <form action="/Pengeluaran/save" method="post">
                                <?= csrf_field();  ?>
                                <div class="modal-body">
                                Tanggal : 
                                <input type="date" class="form-control" name="tgl_pengeluaran">
                                Jumlah : 
                                <input type="number" class="form-control" name="jumlah">
                                Catatan : 
                                <input type="text" class="form-control" name="catatan"> 
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-success" >Tambah</button>
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- akhir modal -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?= $this->endSection();  ?>