
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title;  ?></title>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?= base_url('Assets/vendor/fontawesome-free/css/all.min.css');  ?> "  type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?= base_url('Assets/css/sb-admin-2.min.css');  ?> " >
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="<?= base_url('Assets/vendor/datatables/dataTables.bootstrap4.min.css');  ?>">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('Assets/') ?>img/makunpng.png">
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layout/sidebar');  ?>
<?= $this->renderSection('content');  ?>
<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Hasan Abdu Rahman | 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('Assets/vendor/jquery/jquery.min.js');  ?> "></script>
    <script src="<?= base_url('Assets/vendor/bootstrap/js/bootstrap.bundle.min.js')  ?> "></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('Assets/vendor/jquery-easing/jquery.easing.min.js');  ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('Assets/js/sb-admin-2.min.js');  ?>"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url('Assets/vendor/chart.js/Chart.min.js');  ?>"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url('Assets/js/demo/chart-area-demo.js');  ?>"></script>
    <script src="<?= base_url('Assets/js/demo/chart-pie-demo.js');  ?>"></script>
    <script src="<?= base_url('Assets/js/demo/chart-bar-demo.js');  ?>"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url('Assets/vendor/datatables/jquery.dataTables.min.js')  ?> "></script>
    <script src="<?= base_url('Assets/vendor/datatables/dataTables.bootstrap4.min.js')  ?> "></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url('Assets/js/demo/datatables-demo.js')  ?> "></script>
</body>
</html>