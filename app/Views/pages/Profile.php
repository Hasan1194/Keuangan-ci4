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
            <h1> Data Admin </h1>
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
            
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-dark">Data Admin
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#myModalTambah" ><i class="fa fa-plus"> Admin</i></button>
                        </h4>
                        
                        </div>
                        <div class="card-body">
                            <?php if(session()->getFlashdata('Pesan')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('Pesan'); ?>
                                </div>
                            <?php endif;  if(session()->getFlashdata('Kosong')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('Kosong'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php foreach ($pm as $p) :?>
                                        <tr>
                                            <td><?= $p['id_admin'];  ?></td>
                                            <td><?= $p['nama'];  ?></td>
                                            <td><?= $p['email'];  ?></td>
                                            <td><?=$p['password'];  ?></td>
                                            <td>
                                                <!-- Button for edit & delete modal -->
                                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalEdit<?= $p['id_admin']; ?>"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="myModalEdit<?= $p['id_admin']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Data Profile</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="/Profile/edit/<?= $p['id_admin']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Id</label>
                                                                <input type="number" name="id_admin" class="form-control" value="<?= $p['id_admin']; ?>" readonly>      
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input type="text" name="nama" class="form-control" value="<?= $p['nama']; ?>">      
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" name="email" class="form-control" value="<?= $p['email']; ?>">      
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="text" name="password" class="form-control" value="<?= $p['password']; ?>">      
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
                            <h4 class="modal-title">Tambah Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- body modal -->
                            <form action="/Profile/save" method="post">
                                <?= csrf_field();  ?>
                                <div class="modal-body">
                                Nama : 
                                <input type="text" class="form-control" name="nama">
                                Email : 
                                <input type="text" class="form-control" name="email">
                                Password : 
                                <input type="text" class="form-control" name="password">
                                
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