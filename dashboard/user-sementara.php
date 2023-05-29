<?php
include "../include/koneksi.php";

$title = "Daftar User Sementara";
include "../include/head.php";
$data = mysqli_query($koneksi, "SELECT * FROM `tb_user_sementara` ORDER BY `tb_user_sementara`.`id_user` DESC");

?>

<!-- Start Content -->
<div class="card radius-10">
    <div class="card-body">

        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-0">Daftar User</h5>
            </div>

        </div>
        <hr>
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="dt">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor Whatsapp</th>
                        <th>Fungsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $no = 1;

                    foreach ($data as $d) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14"><?= htmlspecialchars($d['nama']); ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($d['nomor']); ?></td>
                            <td><?= htmlspecialchars($d['fungsi']); ?></td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a id="terimaakun" class="bg bg-success text-white" data-bs-toggle="modal" data-bs-target="#terimaAkunModal" data-nama="<?= $d['nama'] ?>" data-nomor="<?= $d['nomor'] ?>" data-fungsi="<?= $d['fungsi'] ?>" data-username="<?= $d['username'] ?>" data-password="<?= $d['password'] ?>" data-idu="<?= $d['id_user'] ?>"><i class=" bx bx-check"></i></a>
                                    <a id="tolakakun" class="bg bg-danger text-white ms-4" data-bs-toggle="modal" data-bs-target="#tolakAkunModal" data-idu="<?= $d['id_user'] ?>" data-nomor="<?= $d['nomor'] ?>"><i class=" bx bx-x"></i></a>
                                </div>
                            </td>
                        </tr>




                    <?php
                    }

                    ?>




                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Terima modal -->

<div class="modal fade" id="terimaAkunModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terima Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="action/proses.php" method="POST">
                <div class="modal-body">
                    <label class="form-label">Apakah akun disetujui untuk mendaftar sebagai User ASIKA?</label>
                    <input type="hidden" name="nama" id="nama">
                    <input type="hidden" name="nomor" id="nomor">
                    <input type="hidden" name="fungsi" id="fungsi">
                    <input type="hidden" name="username" id="username">
                    <input type="hidden" name="pass" id="pass">
                    <input type="hidden" name="idu" id="idu">
                </div>
                <div class="modal-footer">

                    <input type="hidden" value="terimaakun" name="aksi">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button class="btn btn-success">Terima</button>
            </form>
        </div>

    </div>
</div>
</div>

<!-- end modal -->

<!--Tolak modal -->

<div class="modal fade" id="tolakAkunModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tolak Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="action/proses.php" method="POST">
                <div class="modal-body">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="ket" class="form-control" style="height: 100px;" autocomplete="off">
                </div>
                <div class="modal-footer">

                    <input type="hidden" value="tolakakun" name="aksi">
                    <input type="hidden" id="idtolak" name="idu">
                    <input type="hidden" id="nomorus" name="nomorus">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button class="btn btn-danger">Tolak</button>
            </form>
        </div>

    </div>
</div>
</div>

<!-- end modal -->

<?php

include "../include/foot.php";

?>