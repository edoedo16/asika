<?php

include "fungsi.php";

session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "tambahreservasi") {
        $berhasil = tambah_reservasi($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Reservasi Berhasil ditambahkan.";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Reservasi gagal ditambahkan.";
        }

        echo "<script>
                    window.location.href='../dashboard.php';
                </script>";
    } else if ($_POST['aksi'] == "hapusreservasi") {

        $berhasil  = hapus_reservasi($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Reservasi Berhasil dibatalkan";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Reservasi gagal dibatalkan";
        }

        echo "<script>
                    window.location.href='../dashboard.php'
                    </script>";
    } else if ($_POST['aksi'] == "editreservasi") {
        $berhasil = edit_reservasi($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Reservasi Berhasil diedit";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Reservasi gagal diedit";
        }

        echo "<script>
                    window.location.href='../dashboard.php'
                    </script>";
    } else if ($_POST['aksi'] == "tambahmobil") {
        $berhasil = tambah_data_mobil($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data Mobil berhasil ditambahkan";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data Mobil gagal ditambahkan";
        }

        echo "<script>
                    window.location.href='../daftar-mobil.php'
                    </script>";
    } else if ($_POST['aksi'] == "hapusmobil") {
        $berhasil = hapus_data_mobil($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data Mobil berhasil dihapus";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data Mobil gagal dihapus";
        }

        echo "<script>
                    window.location.href='../daftar-mobil.php'
                    </script>";
    } else if ($_POST['aksi'] == "editmobil") {
        $berhasil = edit_data_mobil($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data Mobil berhasil diedit";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data Mobil gagal diedit";
        }

        echo "<script>
                    window.location.href='../daftar-mobil.php'
                    </script>";
    } else if ($_POST['aksi'] == "setuju") {
        $berhasil = setuju_reservasi($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Pesanan disetujui";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Pesanan gagal";
        }

        echo "<script>
                    window.location.href='../index.php'
                    </script>";
    } else if ($_POST['aksi'] == "tolakreservasi") {
        $berhasil = tolak_reservasi($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Pesanan ditolak";
        } else {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Pesanan gagal";
        }

        echo "<script>
                    window.location.href='../index.php'
                    </script>";
    } else if ($_POST['aksi'] == "selesaireservasi") {

        $berhasil = selesai_reservasi($_POST);

        if ($berhasil) {
            //$_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "setuju";
        } else {
            //$_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "tidak selesai";
        }

        echo "<script>
                    window.location.href='../status-reservasi.php'
                    </script>";
    } else if ($_POST['aksi'] == "tambahdriver") {
        $berhasil = tambah_data_driver($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data Driver berhasil ditambahkan";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data Driver gagal ditambahkan";
        }

        echo "<script>
                    window.location.href='../daftar-driver.php'
                    </script>";
    } else if ($_POST['aksi'] == "hapusdriver") {
        $berhasil = hapus_data_driver($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data Driver berhasil dihapus";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data Driver gagal dihapus";
        }

        echo "<script>
                    window.location.href='../daftar-driver.php'
                    </script>";
    } else if ($_POST['aksi'] == "editdriver") {
        $berhasil = edit_data_driver($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data Driver berhasil diedit";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data Driver gagal diedit";
        }

        echo "<script>
                    window.location.href='../daftar-driver.php'
                    </script>";
    } else if ($_POST['aksi'] == "tambahuser") {
        $berhasil = tambah_user($_POST);

        if ($berhasil == "gagal") {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Username sudah ada, tidak boleh sama";
        } else if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data User berhasil ditambahkan";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data User gagal ditambahkan";
        }

        echo "<script>
                    window.location.href='../user.php'
                    </script>";
    } else if ($_POST['aksi'] == "tambahusersementara") {
        $berhasil = tambah_user_sementara($_POST);

        if ($berhasil == "gagal") {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Username sudah ada, tidak boleh sama";
        } else if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data User berhasil ditambahkan";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data User gagal ditambahkan";
        }

        echo "<script>
                    window.location.href='../../login/daftar.php'
                    </script>";
    } else if ($_POST['aksi'] == "terimaakun") {
        $berhasil = terima_user_sementara($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data User berhasil ditambahkan";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data User gagal ditambahkan";
        }

        echo "<script>
                    window.location.href='../user-sementara.php'
                    </script>";
    } else if ($_POST['aksi'] == "tolakakun") {
        $berhasil = tolak_user_sementara($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data User berhasil ditolak";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data User gagal ditolak";
        }

        echo "<script>
                    window.location.href='../user-sementara.php'
                    </script>";
    } else if ($_POST['aksi'] == "hapususer") {
        $berhasil = hapus_data_user($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data User berhasil dihapus";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data Driver gagal dihapus";
        }

        echo "<script>
                    window.location.href='../user.php'
                    </script>";
    } else if ($_POST['aksi'] == "edituser") {
        $berhasil = edit_data_user($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data User berhasil diedit";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data User gagal diedit";
        }

        echo "<script>
                    window.location.href='../user.php'
                    </script>";
    } else if ($_POST['aksi'] == "pilihmobil") {
        $berhasil = pilih_mobil($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data berhasil ditambahkan";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data gagal ditambahkan";
        }

        echo "<script>
                    window.location.href='../status-mobil.php'
                    </script>";
    } else if ($_POST['aksi'] == "tambahlokasi") {
        $berhasil = tambah_lokasi($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data berhasil ditambahkan";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data gagal ditambahkan";
        }

        echo "<script>
                    window.location.href='../daftar-lokasi.php'
                    </script>";
    } else if ($_POST['aksi'] == "editlokasi") {
        $berhasil = edit_lokasi($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data berhasil diedit";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data gagal diedit";
        }

        echo "<script>
                    window.location.href='../daftar-lokasi.php'
                    </script>";
    } else if ($_POST['aksi'] == "hapuslokasi") {
        $berhasil = hapus_lokasi($_POST);

        if ($berhasil > 0) {
            $_SESSION['alert'] = "success";
            $_SESSION['pesan'] = "Data berhasil dihapus";
        } else {
            $_SESSION['alert'] = "gagal";
            $_SESSION['pesan'] = "Data gagal dihapus";
        }

        echo "<script>
                    window.location.href='../daftar-lokasi.php'
                    </script>";
    }
}


if ($_GET['aksi'] == "logout") {
    $berhasil = logout();

    if ($berhasil) {
        echo "<script>window.location.href='../../login/';</script>";
    }
} else {
    echo "";
}
