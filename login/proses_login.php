<?php

include "../include/koneksi.php";
session_start();

if (isset($_POST['login'])) {

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$user' AND password='$pass' ");

    $selek = mysqli_fetch_assoc($sql);
    $row = mysqli_num_rows($sql);

    if ($row >= 1) {

        if ($selek["role"] == "developer") {
            $_SESSION['status'] = "Sukses";
            $_SESSION['qwe'] = $selek['nama'];
            $_SESSION['fungsi'] = $selek['fungsi'];
            $_SESSION['role'] = $selek['role'];
            $_SESSION['id'] = $selek['id_user'];
            $_SESSION['nomor'] = $selek['nomor'];
            header("location:../dashboard/");
        } else if ($selek["role"] == "admin") {
            $_SESSION['status'] = "Sukses";
            $_SESSION['qwe'] = $selek['nama'];
            $_SESSION['fungsi'] = $selek['fungsi'];
            $_SESSION['role'] = $selek['role'];
            $_SESSION['id'] = $selek['id_user'];
            $_SESSION['nomor'] = $selek['nomor'];
            header("location:../dashboard/");
        } else if ($selek["role"] == "user") {
            $_SESSION['status'] = "Sukses";
            $_SESSION['qwe'] = $selek['nama'];
            $_SESSION['fungsi'] = $selek['fungsi'];
            $_SESSION['role'] = $selek['role'];
            $_SESSION['id'] = $selek['id_user'];
            $_SESSION['nomor'] = $selek['nomor'];
            header("location:../dashboard/dashboard.php");
        }
    } else {
        $_SESSION['status'] = "Gagal";

        echo "
        <script> 
        window.location.href='index.php';
        </script>";
    }
} else {
    echo "<script>
	window.location.href='../login/error.php';
	</script>";
}
