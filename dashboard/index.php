<?php


include "../include/koneksi.php";

$title = "Dashboard";
include "../include/head.php";

$data = mysqli_query($koneksi, "SELECT * FROM tb_reservasi ORDER BY id_reservasi DESC");

$datamd = mysqli_query($koneksi, "SELECT * FROM `tb_supir`, `tb_kendaraan` WHERE `tb_supir`.`id_kendaraan` = `tb_kendaraan`.`id_kendaraan` ");

$count = mysqli_num_rows($data);


$no = 1;

?>


<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
	<div class="col">
		<div class="card radius-10 bg-gradient-deepblue">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">
						<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM `tb_status` JOIN `tb_supir` WHERE `tb_supir`.`id_supir` = `tb_status`.`id_supir` AND `tb_status`.`status` = 'Ready' ");
						$hitung = mysqli_num_rows($sql);
						echo $hitung;

						?>
					</h5>
					<div class="ms-auto">
						<i class='bx bx-car fs-3 text-white'></i>
					</div>
				</div>
				<div class="progress my-2 bg-white-transparent" style="height:4px;">
					<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Mobil dan Driver tersedia.</p>

				</div>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card radius-10 bg-gradient-ohhappiness">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">
						<?php

						$sql = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `tanggal` >= CURRENT_DATE");
						$hitung = mysqli_num_rows($sql);
						echo $hitung;

						?>
					</h5>
					<div class="ms-auto">
						<i class='bx bx-user-circle fs-3 text-white'></i>
					</div>
				</div>
				<div class="progress my-2 bg-white-transparent" style="height:4px;">
					<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Reservasi hari ini.</p>

				</div>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card radius-10 bg-gradient-ibiza">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">
						<?php

						$sql = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `status` = 'selesai' AND `tanggal` >= CURRENT_DATE");
						$hitung = mysqli_num_rows($sql);
						echo $hitung;
						?>

					</h5>
					<div class="ms-auto">
						<i class='bx bx-task fs-3 text-white'></i>
					</div>
				</div>
				<div class="progress my-2 bg-white-transparent" style="height:4px;">
					<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Reservasi diselesaikan hari ini.</p>

				</div>
			</div>
		</div>
	</div>

	<!-- <div class="col">
		<div class="card radius-10 bg-gradient-moonlit">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">
						<?php

						$sql = mysqli_query($koneksi, "SELECT * FROM `tb_reservasi` WHERE `status` = 'ditolak'");
						$hitung = mysqli_num_rows($sql);
						echo $hitung;

						?>
					</h5>
					<div class="ms-auto">
						<i class='bx bx-x-circle fs-3 text-white'></i>
					</div>
				</div>
				<div class="progress my-2 bg-white-transparent" style="height:4px;">
					<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Reservasi tidak disetujui.</p>

				</div>
			</div>
		</div>
	</div> -->

</div><!--end row-->

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
						<th>No. Reservasi</th>
						<th>Lokasi</th>
						<th>Tujuan</th>
						<th>User</th>
						<th>Tanggal dan Waktu</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php



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
							<td><?= htmlspecialchars($d['user']); ?></td>
							<td><?= htmlspecialchars($d['tanggal']); ?> <br> <?= htmlspecialchars($d['waktu']); ?></td>
							<td>
								<?php
								if ($d['status'] == "pending") {
								?>
									<div class="badge rounded-pill bg-light-info text-info w-100">Menunggu</div>
								<?php
								} else if ($d['status'] == "inproses") {
								?>
									<div class="badge rounded-pill bg-light-warning text-warning w-100">Dalam Proses</div>
								<?php
								} else if ($d['status'] == "selesai") {
								?>
									<div class="badge rounded-pill bg-light-success text-success w-100">Selesai</div>
								<?php
								}
								?>

							</td>
							<td>
								<?php

								if ($d['status'] == "pending") {
								?>
									<div class="d-flex order-actions ">
										<a id="reservasimodal" class="bg bg-success text-white" data-bs-toggle="modal" data-bs-target="#reservasi" data-reservasi="<?= $d['no_pesanan'] ?>" data-reservasiid="<?= $d['id_reservasi'] ?>"><i class=" bx bx-check"></i></a>
										<!-- pilih-driver.php?id=<?= $d['id_reservasi']; ?> -->
										<a href="#" class="bg bg-danger text-white ms-4" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $no; ?>"><i class="bx bx-x"></i></a>
									</div>

								<?php
								}
								?>




								<!--Hapus modal -->

								<div class="modal fade" id="hapusModal<?= $no; ?>" tabindex="-1" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Tolak pesanan</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>


											<div class="modal-body">

											</div>
											<div class="modal-footer">
												<form action="#" method="POST">
													<input type="hidden" value="tolakreservasi" name="aksi">
													<input type="hidden" value="<?= $d['id_reservasi']; ?>" name="id">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
													<button class="btn btn-danger">Tolak</button>
												</form>
											</div>

										</div>
									</div>
								</div>

								<!-- end modal -->

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

<!-- modal  -->

<div class="modal fade" id="reservasi" value="" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pilih Driver</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">

				<form action="action/proses.php" method="POST">
					<div class="col-md-12">
						<label class="form-label">No. Reservasi</label>
						<input type="text" class="form-control" id="nopes" name="nopes" readonly>
					</div>
					<div class="col-12">
						<label class="form-label">Driver</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
							<select name="iddriver" class="form-control border-start-0" id="driver">
								<option selected>Pilih... </option>
								<?php

								foreach ($datamd as $dr) {
								?>
									<option value="<?= $dr['id_supir'] ?>" class="form-control">
										<?= $dr['nama']; ?>

									</option>
								<?php
								}
								?>
							</select>

						</div>

					</div>
					<label class="form-label">No. Polisi</label>
					<div class="input-group"><span class="input-group-text bg-transparent"><i class='bx bxs-label'></i></span>
						<input class="result form-control" id="nopol1" type="text" autocomplete="off" readonly>
					</div>
					<label class="form-label">Mobil</label>
					<div class="input-group"><span class="input-group-text bg-transparent"><i class='bx bxs-car'></i></span>
						<input class="result form-control" id="model1" type="text" autocomplete="off" readonly>
						<input id="idsa1" name="idmobil" type="hidden">
					</div>

			</div>
			<div class="modal-footer">
				<input type="hidden" value="inproses" name="status">
				<input type="hidden" id="ids" name="ids">
				<input type="hidden" name="setujuid" value="<?= $setuju_id; ?>">
				<input type="hidden" value="setuju" name="aksi">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
				<button type="submit" class="btn btn-success">Setujui</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!--end modal  -->





<?php

include "../include/foot.php";

?>