<?php

include "../include/koneksi.php";

$title = "Dashboard";
include "../include/head.php";


$nama = $_SESSION['qwe'];

if ($_SESSION['role'] == "user") {
	$data = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `tb_reservasi`.`user` = '$nama' ORDER BY id_reservasi DESC");
} else {
	$data = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` ORDER BY `id_reservasi` DESC");
}


?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

	<div class="col">
		<a href="#" data-bs-toggle="modal" data-bs-target="#tambahReservasiModal">
			<div class="card radius-10 bg-gradient-ibiza">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h6 class="mb-0 text-white">Tambah Reservasi</h6>
						<div class="ms-auto">
							<i class='bx bx-add-to-queue fs-3 text-white'></i>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>

	<!-- modal -->

	<div class="modal fade" id="tambahReservasiModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Reservasi</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>


				<div class="modal-body">
					<form class="row g-1" action="action/proses.php" method="POST">
						<div class="col-12">
							<label class="form-label">Lokasi</label>
							<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-map'></i></span>
								<input type="text" name="tujuan" class="form-control border-start-0" placeholder="Lokasi" autocomplete="off" required>
							</div>
						</div>
						<div class="col-12">
							<label class="form-label">Tujuan</label>
							<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-comment-detail'></i></span>
								<input type="text" name="maksud" class="form-control border-start-0" placeholder="Tujuan" autocomplete="off" required>
							</div>
						</div>
						<div class="col-6">
							<label class="form-label">Tanggal</label>
							<div class="input-group">
								<input class="result form-control" name="tanggal" type="date" placeholder="Tanggal" autocomplete="off" required>
							</div>
						</div>
						<div class="col-6">
							<label class="form-label">Waktu</label>
							<div class="input-group">
								<input class="result form-control" name="waktu" type="time" placeholder="Waktu" autocomplete="off" required>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" value="<?= $nama; ?>" name="user">
					<input type="hidden" value="<?= $_SESSION['id'] ?>" name="ids">
					<input type="hidden" value="tambahreservasi" name="aksi">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-success">Simpan</button>
					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- end modal -->

</div><!-- end row -->


<!-- Start Content -->
<div class="card radius-10">
	<div class="card-body">

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



		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Reservasi hari ini</h5>
			</div>

		</div>
		<hr>
		<div class="table-responsive">
			<table class="table align-middle mb-0" id="dt">
				<thead class="table-light">
					<tr>
						<th>No</th>
						<th>No. Pesanan</th>
						<th>Lokasi</th>
						<th>Tujuan</th>
						<th>Tanggal dan Waktu</th>
						<th>Status</th>
						<!-- <th>Aksi</th> -->
					</tr>
				</thead>
				<tbody>
					<?php

					$no = 1;
					foreach ($data as $d) {

					?>

						<tr>
							<td><?= $no++; ?></td>
							<td><?= htmlspecialchars($d['no_pesanan']); ?></td>
							<td>
								<div class="d-flex align-items-center">

									<div class="ms-2">
										<h6 class="mb-1 font-14"><?= htmlspecialchars($d['tujuan']); ?></h6>
									</div>
								</div>
							</td>
							<td><?= htmlspecialchars($d['maksud']); ?></td>
							<td><?= htmlspecialchars($d['tanggal']); ?><br> <?= htmlspecialchars($d['waktu']); ?></td>
							<td>
								<?php
								if ($d['status'] == "pending") {
								?>
									<div class="badge rounded-pill bg-light-info text-info w-100">Menunggu</div>
								<?php
								} else if ($d['status'] == "inproses") {
								?>
									<div class="badge rounded-pill bg-light-warning text-warning w-100">Dalam perjalanan</div>
								<?php
								} else if ($d['status'] == "selesai") {
								?>
									<div class="badge rounded-pill bg-light-success text-success w-100">Selesai</div>
								<?php
								}
								?>

							</td>
							<!-- <td>

								<?php

								if ($d['status'] == "pending") {
								?>
									<div class="d-flex order-actions">
										<a href="javascript:;" class="bg bg-warning text-white" data-bs-toggle="modal" data-bs-target="#editModal<?= $no; ?>"><i class="bx bx-edit-alt"></i></a>
										<a href="javascript:;" class="ms-4 bg bg-danger text-white" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $no; ?>"><i class="bx bx-x"></i></a>
									</div>
								<?php
								} else if ($d['status'] == "inproses") {
								?>
									<div class="d-flex order-actions">
										<a href="javascript:;" class="ms-4 bg bg-success text-white" data-bs-toggle="modal" data-bs-target="#selesaiModal<?= $no; ?>"><i class="bx bx-check"></i></a>
									</div>
								<?php
								}

								?>

							</td> -->
						</tr>

						<!--Edit modal -->

						<div class="modal fade" id="editModal<?= $no; ?>" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Reservasi</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>


									<div class="modal-body">
										<form action="action/proses.php" method="POST">
											<div class="row g-1">
												<div class="col-12">
													<label class="form-label">Tujuan</label>
													<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-map'></i></span>
														<input type="text" name="tujuan" class="form-control border-start-0" placeholder="Tujuan" autocomplete="off" value="<?= htmlspecialchars($d['tujuan']); ?>">
													</div>
												</div>
												<div class="col-12">
													<label class="form-label">Maksud</label>
													<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-comment-detail'></i></span>
														<input type="text" name="maksud" class="form-control border-start-0" placeholder="Maksud" autocomplete="off" value="<?= htmlspecialchars($d['maksud']); ?>">
													</div>
												</div>
												<div class="col-6">
													<label class="form-label">Tanggal</label>
													<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-calendar'></i></span>
														<input class="result form-control" name="tanggal" type="date" placeholder="Tanggal" autocomplete="off" value="<?= htmlspecialchars($d['tanggal']); ?>">
													</div>
												</div>
												<div class="col-6">
													<label class="form-label">Waktu</label>
													<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock'></i></span>
														<input class="result form-control" name="waktu" type="time" placeholder="Waktu" autocomplete="off" value="<?= htmlspecialchars($d['waktu']); ?>">
													</div>
												</div>
											</div>
									</div>

									<div class="modal-footer">
										<input type="hidden" value="editreservasi" name="aksi">
										<input type="hidden" value="<?= htmlspecialchars($d['id_reservasi']) ?>" name="id">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
										<button type="submit" class="btn btn-success">Simpan</button>

									</div>
									</form>

								</div>
							</div>
						</div>

						<!-- end modal -->



						<!--Hapus modal -->

						<div class="modal fade" id="hapusModal<?= $no; ?>" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Konfirmasi Batalkan Reservasi</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>


									<div class="modal-body">
										<div class=""> Yakin untuk batalkan reservasi?</div>
									</div>
									<div class="modal-footer">
										<form action="action/proses.php" method="POST">
											<input type="hidden" value="hapusreservasi" name="aksi">
											<input type="hidden" value="<?= htmlspecialchars($d['id_reservasi']) ?>" name="id">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
											<button class="btn btn-danger">Batalkan</button>
										</form>
									</div>

								</div>
							</div>
						</div>

						<!-- end modal -->

						<!--Selesai modal -->

						<div class="modal fade" id="selesaiModal<?= $no; ?>" tabindex="-1" aria-hidden="true">
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
											<input type="hidden" value="<?= htmlspecialchars($d['id_reservasi']) ?>" name="id">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
											<button class="btn btn-success">Selesai</button>
										</form>
									</div>

								</div>
							</div>
						</div>

						<!-- end modal -->


					<?php

					}

					?>



				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- end content -->





<?php

include "../include/foot.php";

?>