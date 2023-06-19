<?php
include "../../include/koneksi.php";
// $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tb_supir` WHERE `tb_supir`.`id_supir` = '$_GET[id_supir]'"));
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tb_status` JOIN `tb_supir` WHERE `tb_supir`.`id_supir` = `tb_status`.`id_supir` AND `tb_status`.`id_supir` = '$_GET[id_supir]' AND `tb_status`.`status` = 'Ready'"));
$data_mobil = array(
    'nopol'      =>  $data['no_polisi'],
    'model'      =>  $data['model'],
    'id'         =>  $data['id_kendaraan'],
    'notelp'     =>  $data['nomor_telp'],

);
echo json_encode($data_mobil);
