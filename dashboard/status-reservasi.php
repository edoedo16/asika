<?php

include "../include/koneksi.php";

$title = "Status Reservasi";
include "../include/head.php";

$id = $_SESSION['id'];
$nu = $_SESSION['nomor'];

if ($_SESSION['role'] == "user") {

    $data = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `tb_reservasi`.`status` ='pending' AND `tb_reservasi`.`id_user`= '$id'");
    $data2 = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `tb_reservasi`.`status` ='inproses' AND `tb_reservasi`.`id_user`= '$id' ORDER BY `tb_reservasi`.`id_reservasi` DESC");
    $data3 = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `tb_reservasi`.`status` ='selesai' AND `tb_reservasi`.`id_user`= '$id' ORDER BY `tb_reservasi`.`id_reservasi` DESC");
    $count = mysqli_num_rows($data);
    $count2 = mysqli_num_rows($data2);
    $count3 = mysqli_num_rows($data3);

    $data2a = mysqli_fetch_assoc($data2);

    $setuju = mysqli_query($koneksi, "SELECT * FROM `tb_setuju` JOIN `tb_reservasi` JOIN `tb_supir` JOIN `tb_kendaraan` WHERE `tb_reservasi`.`id_reservasi` = `tb_setuju`.`id_reservasi` AND `tb_supir`.`id_supir` = `tb_setuju`.`id_supir` AND `tb_kendaraan`.`id_kendaraan` = `tb_setuju`.`id_kendaraan` AND `tb_reservasi`.`id_user` = '$id'");
} else {

    $data = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `tb_reservasi`.`status` ='pending'");
    $data2 = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `tb_reservasi`.`status` ='inproses' ORDER BY `tb_reservasi`.`id_reservasi` DESC");
    $data3 = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `tb_reservasi`.`status` ='selesai' ORDER BY `tb_reservasi`.`id_reservasi` DESC");
    $count = mysqli_num_rows($data);
    $count2 = mysqli_num_rows($data2);
    $count3 = mysqli_num_rows($data3);

    $data2a = mysqli_fetch_assoc($data2);

    $setuju = mysqli_query($koneksi, "SELECT * FROM `tb_setuju` JOIN `tb_reservasi` JOIN `tb_supir` JOIN `tb_kendaraan` WHERE `tb_reservasi`.`id_reservasi` = `tb_setuju`.`id_reservasi` AND `tb_supir`.`id_supir` = `tb_setuju`.`id_supir` AND `tb_kendaraan`.`id_kendaraan` = `tb_setuju`.`id_kendaraan`");
}


?>

<!-- Start Content -->
<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-0"></h5>
            </div>
        </div>


        <?php

        if ($count < 1) { ?>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h5 class="text-secondary">Tidak ada reservasi yang menunggu.</h5>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a href="dashboard.php" class="btn btn-secondary">Reservasi</a>
                </div>
            </div>
        <?php

        } else {
        ?>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h5 class="text-info">Menunggu persetujuan admin untuk reservasi terakhir anda</h5>
                </div>
            </div>
        <?php
        }

        ?>





    </div>
</div>
<!-- end content -->

<?php
//if ($data2a['status'] == 'inproses') {
if ($count2 >= 1) {
?>

    <div class="row">
        <?php

        $no = 1;
        foreach ($setuju as $d) {
            if ($d['status'] == "inproses") {
        ?>
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Informasi Reservasi <?= $no++; ?></h5>
                            </div>
                            <hr>
                            <table>
                                <tr>
                                    <td class="card-text">Nomor Reservasi</td>
                                    <td class="card-text">:</td>
                                    <td class="card-text"><?= $d['no_pesanan'] ?></td>
                                </tr>
                                <tr>
                                    <td class="card-text">User</td>
                                    <td class="card-text">:</td>
                                    <td class="card-text"><?= $d['user'] ?></td>
                                </tr>
                                <tr>
                                    <td class="card-text">Tujuan</td>
                                    <td class="card-text">:</td>
                                    <td class="card-text"><?= $d['tujuan'] ?> - <?= $d['maksud'] ?></td>
                                </tr>
                                <tr>
                                    <td class="card-text">Driver</td>
                                    <td class="card-text">:</td>
                                    <td class="card-text"><?= $d['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td class="card-text">Mobil</td>
                                    <td class="card-text">:</td>
                                    <td class="card-text"><?= $d['no_polisi'] ?> - <?= $d['model'] ?></td>
                                </tr>
                                <tr>
                                    <td class="card-text">Nomor</td>
                                    <td class="card-text">:</td>
                                    <td class="card-text"><?= $d['nomor_telp'] ?></td>
                                </tr>
                            </table>
                            <hr>
                            <a href="javascript:;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesaiModal<?= $no; ?>">Selesaikan</a>

                            <!--Selesai modal -->

                            <div class=" modal fade" id="selesaiModal<?= $no; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Selesaikan Pesanan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>


                                        <div class="modal-body">
                                            <div class=""> Yakin untuk selesaikan pesanan?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="action/proses.php" method="POST">
                                                <input type="hidden" value="selesaireservasi" name="aksi">
                                                <input type="hidden" value="selesai" name="status">
                                                <input type="hidden" value="<?= $d['id_reservasi'] ?>" name="id">
                                                <input type="hidden" value="<?= $d['id_supir'] ?>" name="idsupir">
                                                <input type="hidden" value="<?= $d['nomor_telp'] ?>" name="nodriver">
                                                <input type="hidden" value="<?= $nu; ?>" name="nomor">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                <button class="btn btn-success">Selesai</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- end modal -->
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        <?php

        }

        ?>
    </div>
<?php
}
//}


?>

<?php
if ($count3 >= 1) {
?>

    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Daftar reservasi selesai</h5>
                </div>

            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0" id="dt">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>No. Reservasi</th>
                            <th>Tujuan</th>
                            <th>Maksud</th>
                            <th>Tanggal dan Waktu Reservasi</th>
                            <th>Driver dan Mobil</th>
                            <th>Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($setuju as $d) {
                            if ($d['status'] == "selesai") {
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['no_pesanan'] ?></td>
                                    <td><?= $d['tujuan'] ?></td>
                                    <td><?= $d['maksud'] ?></td>
                                    <td><?= $d['tanggal'] ?> <br> <?= $d['waktu'] ?></td>
                                    <td><?= $d['nama'] ?> <br> <?= $d['no_polisi'] ?> - <?= $d['model'] ?></td>
                                    <td><?= $d['waktu_selesai'] ?></td>
                                </tr>

                        <?php
                            }
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
}

?>


<?php

include "../include/foot.php";

?>