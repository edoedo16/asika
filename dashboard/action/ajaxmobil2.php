<?php
include "../../include/koneksi.php";
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tb_kendaraan` WHERE `tb_kendaraan`.`id_kendaraan` = '$_GET[id_kendaraan]'"));
$data_mobil = array(
    'nopol'      =>  $data['no_polisi'],
    'model'      =>  $data['model'],
    'id'         =>  $data['id_kendaraan'],

);
echo json_encode($data_mobil);
