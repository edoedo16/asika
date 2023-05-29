<?php

session_start();

if (isset($_SESSION['nama'])) {

    header("location:../dashboard/");
    unset($_SESSION['nama']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../assets/images/logopertamina.png" type="image/png" />
    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <title>ASIKA - PGE</title>
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">

                        <div class="card shadow">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center mb-4">
                                        <div class="">
                                            <img src="../assets/images/logopertamina.png" width="80" height="80">
                                        </div>
                                        <div class="mb-0">
                                            <img src="../assets/images/logotypepertamina.png" width="80" height="25">
                                        </div>
                                    </div>
                                    <!-- alert -->
                                    <?php

                                    if (isset($_SESSION['alert'])) {

                                        if ($_SESSION['alert'] == "success") {

                                    ?>


                                            <div class="col-12">
                                                <div class="alert alert-outline-success shadow-sm alert-dismissible fade show py-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 text-success"><?= $_SESSION['pesan'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                            unset($_SESSION['alert']);
                                        } else if ($_SESSION['alert'] == "gagal") {
                                        ?>
                                            <div class="col-12">
                                                <div class="alert alert-outline-danger shadow-sm alert-dismissible fade show py-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="font-35 text-danger"><i class='bx bxs-check-circle'></i>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 text-danger"><?= $_SESSION['pesan'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                            unset($_SESSION['alert']);
                                        }
                                    }

                                    ?>
                                    <!-- end alert -->
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                                        </div>
                                        <h5 class="mb-0 text-danger">Daftar akun</h5>
                                    </div>
                                    <hr>

                                    <div class="form-body">
                                        <form class="row g-4" action="../dashboard/action/proses.php" method="POST">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama" autocomplete="off" placeholder=" Masukan Nama Lengkap" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Nomor WhatsApp</label>
                                                <input type="text" class="form-control" name="nomor" autocomplete="off" placeholder=" Masukan Nomor WhatsApp" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Fungsi</label>
                                                <input type="text" class="form-control" name="fungsi" autocomplete="off" placeholder=" Masukan Fungsi" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Username</label>
                                                <input type="hidden" value="tambahusersementara" name="aksi">
                                                <input type="text" class="form-control" name="user" id="user" autocomplete="off" placeholder=" Masukan Username" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="pass" id="pass" autocomplete="off" placeholder="Masukan Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>

                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="login" class="btn btn-danger">Daftar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 text-center mt-3 ">
                                        <a href="index.php"> Kembali </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->



    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../assets/plugins/chartjs/chart.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="../assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/jquery-knob/excanvas.js"></script>
    <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>


    <script src="../assets/js/index.js"></script>


    <!--app JS-->
    <script src="../assets/js/app.js"></script>
</body>

</html>