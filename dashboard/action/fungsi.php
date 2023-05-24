<?php

include "../../include/koneksi.php";


function tambah_reservasi($data)
{
    global $koneksi;

    $tujuan = htmlspecialchars($data['tujuan']);
    $maksud = htmlspecialchars($data['maksud']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $waktu = htmlspecialchars($data['waktu']);
    $no_pesanan = uniqid();
    $user = htmlspecialchars($data['user']);
    $id = $data['ids'];

    $sql = mysqli_query($koneksi, "INSERT INTO `tb_reservasi` (`no_pesanan`, `tujuan`, `maksud`,`user`, `tanggal`, `waktu`, `id_user`) VALUES ('$no_pesanan', '$tujuan', '$maksud', '$user', '$tanggal', '$waktu', '$id'); ");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function tambah_data_mobil($data)
{
    global $koneksi;

    $id = $data['id'];
    $nopol = htmlspecialchars($data['nopol']);
    $model = htmlspecialchars($data['model']);

    $sql = mysqli_query($koneksi, "INSERT INTO `tb_kendaraan` (`id_kendaraan`, `no_polisi`, `model`) VALUES ('$id', '$nopol', '$model'); ");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function tambah_data_driver($data)
{
    global $koneksi;

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $notelp = htmlspecialchars($data['notelp']);


    $sql = mysqli_query($koneksi, "INSERT INTO `tb_supir` (`id_supir`, `nama`, `nomor_telp`) VALUES ('$id', '$nama', '$notelp'); ");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function tambah_user($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $user = htmlspecialchars($data['user']);
    $pass = htmlspecialchars($data['pass']);
    $fungsi = htmlspecialchars($data['fungsi']);
    $role = htmlspecialchars($data['role']);

    $sql = mysqli_query($koneksi, "INSERT INTO `tb_user` (`nama`, `fungsi`, `username`, `password`, `role`) VALUES ( '$nama', '$fungsi', '$user', '$pass', '$role'); ");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function hapus_reservasi($data)
{
    global $koneksi;

    $id = $data['id'];


    $sql = mysqli_query($koneksi, "DELETE FROM `tb_reservasi` WHERE `tb_reservasi`.`id_reservasi` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function hapus_data_mobil($data)
{
    global $koneksi;

    $id = $data['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `tb_kendaraan` WHERE `tb_kendaraan`.`id_kendaraan` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function hapus_data_driver($data)
{
    global $koneksi;

    $id = $data['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `tb_supir` WHERE `tb_supir`.`id_supir` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function hapus_data_user($data)
{

    global $koneksi;

    $id = $data['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `tb_user` WHERE `tb_user`.`id_user` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function edit_reservasi($data)
{
    global $koneksi;

    $tujuan = htmlspecialchars($data['tujuan']);
    $maksud = htmlspecialchars($data['maksud']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $waktu = htmlspecialchars($data['waktu']);
    $id = $data['id'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_reservasi` SET `tujuan`='$tujuan', `maksud`='$maksud', `tanggal`='$tanggal', `waktu`='$waktu' WHERE `tb_reservasi`.`id_reservasi`='$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function edit_data_mobil($data)
{
    global $koneksi;

    $nopol = htmlspecialchars($data['nopol']);
    $model = htmlspecialchars($data['model']);
    $id = $data['id'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_kendaraan` SET `no_polisi`='$nopol', `model`='$model' WHERE `tb_kendaraan`.`id_kendaraan`='$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function edit_data_driver($data)
{

    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $notelp = htmlspecialchars($data['notelp']);
    $id = $data['id'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_supir` SET `nama`='$nama', `nomor_telp`='$notelp' WHERE `tb_supir`.`id_supir`='$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function edit_data_user($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $fungsi = htmlspecialchars($data['fungsi']);
    $user = htmlspecialchars($data['user']);
    $pass = htmlspecialchars($data['pass']);
    $role = htmlspecialchars($data['role']);
    $id = $data['id'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_user` SET `nama`='$nama', `fungsi`='$fungsi', `username`='$user', `password`='$pass', `role`='$role' WHERE `tb_user`.`id_user`='$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function setuju_reservasi($data)
{
    global $koneksi;

    $id_supir = $data['iddriver'];
    $id_mobil = $data['idmobil'];
    $status = $data['status'];
    $id_reservasi = $data['ids'];
    $id_setuju = $data['setujuid'];

    $sqll = mysqli_query($koneksi, "INSERT INTO `tb_setuju` (`id_setuju`, `id_reservasi`, `id_supir`, `id_kendaraan`) VALUES ('$id_setuju','$id_reservasi','$id_supir','$id_mobil')");

    $sql = mysqli_query($koneksi, "UPDATE `tb_reservasi` SET `status`='$status' WHERE `tb_reservasi`.`id_reservasi`='$id_reservasi'");

    $sqlll = mysqli_query($koneksi, "UPDATE `tb_status` SET `id_setuju` = '$id_setuju', `status` = 'Sibuk' WHERE `tb_status`.`id_supir` = '$id_supir'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function selesai_reservasi($data)
{
    global $koneksi;

    $status = $data['status'];
    $id = $data['id'];
    $id_supir = $data['idsupir'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_reservasi` SET `status`='$status' WHERE `tb_reservasi`.`id_reservasi`='$id'");

    $sqll = mysqli_query($koneksi, "UPDATE `tb_status` SET `status`='Ready' WHERE `tb_status`.`id_supir` = '$id_supir'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function pilih_mobil($data)
{

    global $koneksi;
    $id = $data['supir'];
    $mobil = $data['idmobil'];
    $nopol = $data['nopol'];
    $model = $data['model'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_supir` SET `id_kendaraan`='$mobil', `no_polisi`='$nopol', `model`='$model' WHERE `tb_supir`.`id_supir`='$id'");

    $sql2 = mysqli_query($koneksi, "INSERT INTO `tb_status` (`id_supir`, `status`) VALUES ('$id', 'Ready')");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function logout()
{
    unset($_SESSION);

    session_destroy();

    return true;
}
