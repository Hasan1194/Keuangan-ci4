<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | MaKun</title>
    <link rel="stylesheet" href="<?= base_url('Assets/vendor/fontawesome-free/css/all.min.css'); ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('Assets/css/sb-admin-2.min.css'); ?>">
    <link rel="shortcut icon" type="image/png" href="Assets/img/makunpng.png">
</head>
<body class="bg-gradient-warning">
    <div class="container">
        <form method="post" action="<?= base_url('/login') ?>" autocomplete="on">
            <?php if(session()->getFlashdata('fail')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                            <p>Silahkan Login untuk melanjutkan!</p>
                                        </div>
                                        <div class="form-group">
                                            <input name="email" required type="text" class="form-control form-control-user" placeholder="Email..." id="exampleInputEmail" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user" placeholder="Password..." id="exampleInputPassword" >
                                        </div>
                                        <hr>
                                        <button type="submit" name="login" class="btn btn-dark btn-user btn-block">
                                            <i class="fa fa-spinner fa-fw"></i>Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="<?= base_url('vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>
</body>
</html>
