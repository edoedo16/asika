<?php

include "../include/koneksi.php";

$title = "Status Mobil";
include "../include/head.php";

$data = mysqli_query($koneksi, "SELECT * FROM tb_supir");

$data2 = mysqli_query($koneksi, "SELECT * FROM tb_kendaraan");

$datastatus = mysqli_query($koneksi, "SELECT * FROM `tb_status` JOIN `tb_supir` WHERE `tb_supir`.`id_supir` = `tb_status`.`id_supir` ");
?>


<div class="row">
	<!-- Start Content -->
	<div class="col-12 col-xl-7">
		<div class="card radius-10">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h5 class="mb-0">Tentukan Mobil</h5>
					</div>

				</div>
				<hr>
				<div class="table-responsive">
					<table class="table align-middle mb-0">
						<thead class="table-light">
							<tr>
								<th>No</th>
								<th>Driver</th>
								<th>Mobil</th>
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
												<h6 class="mb-1 font-14"><?= $d['nama'] ?></h6>
											</div>
										</div>
									</td>
									<td>
										<?php

										if ($d['id_kendaraan'] == NULL) {
										?>
											-
										<?php
										} else {
										?>
											<div class="d-flex align-items-center">

												<div class="ms-2">
													<h6 class="mb-1 font-14"><?= $d['no_polisi'] ?> - <?= $d['model'] ?></h6>
												</div>
											</div>
										<?php
										}

										?>
									</td>
									<td>
										<div class="d-flex order-actions">
											<!-- <a href="pilih-mobil.php?id=<?= $d['id_supir']; ?>"> <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalMobil"><i class="bx bx-car"></i> Pilih Mobil</button>
											</a> -->
											<a><button id="testmodal" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalMobil" data-nama="<?= $d['nama']; ?>" data-supir="<?= $d['id_supir']; ?>"><i class="bx bx-car"></i> Pilih Mobil</button>
											</a>
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
	</div>
	<!-- end content -->

	<div class="col-12 col-xl-5">
		<div class="card radius-10">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h5 class="mb-0">Status Mobil</h5>
					</div>
				</div>
				<hr>
				<div class="table-responsive">
					<table class="table align-middle mb-0">
						<thead class="table-light">
							<tr>
								<th>Driver</th>
								<th>Mobil</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>

							<?php

							foreach ($datastatus as $ds) {
							?>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="ms-2">
												<h6 class="mb-1 font-14"><?= $ds['nama'] ?></h6>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="ms-2">
												<h6 class="mb-1 font-14"><?= $ds['no_polisi'] ?> - <?= $ds['model'] ?></h6>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="ms-2">
												<h6 class="mb-1 font-14">
													<?php
													if ($ds['status'] == "Ready") {
													?>
														<div class="badge bg-info ">Ready</div>
													<?php
													} else if ($ds['status'] == "Sibuk") {
													?>
														<div class="badge bg-warning ">Sibuk</div>
													<?php
													} ?>
												</h6>
											</div>
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
	</div>
</div>


<!--mobil modal -->

<div class="modal fade" id="modalMobil" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pilih Mobil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="action/proses.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<label class="form-label">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" readonly>
							<input type="hidden" class="form-control" id="supir" name="supir" readonly>
						</div>
						<div class="col-md-12">
							<label class="form-label">Mobil</label>
							<select name="idmobil" class="form-control" id="mobil">
								<option selected>Pilih...</option>
								<?php
								foreach ($data2 as $dr) {
								?>
									<option value="<?= $dr['id_kendaraan'] ?>" class="form-control">
										<?= $dr['no_polisi']; ?> - <?= $dr['model'] ?>

									</option>
								<?php
								}
								?>
							</select>
							<input type="hidden" id="nopol" name="nopol">
							<input type="hidden" id="model" name="model">
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" value="pilihmobil" name="aksi">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
				<button class="btn btn-success">Simpan</button>
				</form>
			</div>

		</div>
	</div>
</div>

<!-- end modal -->


<?php

include "../include/foot.php";

?>