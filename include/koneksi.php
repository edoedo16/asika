<?php

$koneksi = mysqli_connect("localhost", "root", "", "asika");


$waktu = time();

$driver = "DRV";
$driver_id = $driver . $waktu;

$mobil = "MBL";
$mobil_id = $mobil . $waktu;

$setuju = "STJ";
$setuju_id = $setuju . $waktu;

$no_pesanan =  $waktu . "PGELHD";
