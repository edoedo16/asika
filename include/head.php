<?php

session_start();

if (!isset($_SESSION['qwe'])) {
	echo "<script>
	window.location.href='../login/error.php';
	</script>";
}




?>


<!doctype html>
<html lang="en" class="light-theme">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="../assets/images/logopertamina.png" type="image/png" />
	<!--plugins-->


	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<script src="../assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="../assets/css/icons.css" rel="stylesheet">

	<title>ASIKA - <?= $title; ?></title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class="ms-2">
					<img src="../assets/images/logopertamina.png" class="logo-icon ">
				</div>
				<div>
					<div class="logo-text mt-3">
						<img src="../assets/images/ASIKA-logotype.png" width="95" height="20">
					</div>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">


				<?php

				if ($_SESSION['role'] == "user") {
				?>

					<li>
						<a href="dashboard.php">
							<div class="parent-icon"><i class='bx bx-home-circle'></i>
							</div>
							<div class="menu-title">Dashboard</div>
						</a>
					</li>
					<li>
						<a href="status-reservasi.php">
							<div class="parent-icon"><i class='bx bx-message-detail'></i>
							</div>
							<div class="menu-title">Status Reservasi</div>
						</a>
					</li>

				<?php
				} else {
				?>

					<span> </span>

				<?php
				}

				?>

				<?php

				if ($_SESSION['role'] == "admin") {

				?>

					<li>
						<a href="index.php">
							<div class="parent-icon"><i class='bx bx-home-circle'></i>
							</div>
							<div class="menu-title">Dashboard</div>
						</a>

					</li>
					<li>
						<a href="status-mobil.php">
							<div class="parent-icon"><i class='bx bx-info-circle'></i>
							</div>
							<div class="menu-title">Status Mobil</div>
						</a>
					</li>
					<li>
						<a href="daftar-lokasi.php">
							<div class="parent-icon"><i class='bx bx-map'></i>
							</div>
							<div class="menu-title">Daftar Lokasi</div>
						</a>
					</li>
					<li>
						<a href="daftar-mobil.php">
							<div class="parent-icon"><i class='bx bx-car'></i>
							</div>
							<div class="menu-title">Daftar Mobil</div>
						</a>

					</li>
					<li>
						<a href="daftar-driver.php">
							<div class="parent-icon"><i class='bx bx-user-circle'></i>
							</div>
							<div class="menu-title">Daftar Driver</div>
						</a>


					</li>

				<?php

				} else {
				?>

					<span> </span>

				<?php
				}
				?>


				<?php

				if ($_SESSION['role'] == "developer") {

				?>
					<li>
						<a href="index.php">
							<div class="parent-icon"><i class='bx bx-home-circle'></i>
							</div>
							<div class="menu-title">Dashboard Admin</div>
						</a>

					</li>

					<li>
						<a href="dashboard.php">
							<div class="parent-icon"><i class='bx bx-home-circle'></i>
							</div>
							<div class="menu-title">Dashboard User</div>
						</a>
					</li>
					<li>
						<a href="status-reservasi.php">
							<div class="parent-icon"><i class='bx bx-message-detail'></i>
							</div>
							<div class="menu-title">Status Reservasi</div>
						</a>
					</li>
					<li>
						<a href="status-mobil.php">
							<div class="parent-icon"><i class='bx bx-info-circle'></i>
							</div>
							<div class="menu-title">Status Mobil</div>
						</a>
					</li>
					<li>
						<a href="daftar-lokasi.php">
							<div class="parent-icon"><i class='bx bx-map'></i>
							</div>
							<div class="menu-title">Daftar Lokasi</div>
						</a>
					</li>
					<li>
						<a href="daftar-mobil.php">
							<div class="parent-icon"><i class='bx bx-car'></i>
							</div>
							<div class="menu-title">Daftar Mobil</div>
						</a>
					</li>
					<li>
						<a href="daftar-driver.php">
							<div class="parent-icon"><i class='bx bx-user-circle'></i>
							</div>
							<div class="menu-title">Daftar Driver</div>
						</a>

					</li>
					<li>
						<a href="user.php">
							<div class="parent-icon"><i class='bx bx-user'></i>
							</div>
							<div class="menu-title">User</div>
						</a>
					</li>
					<li>
						<a href="user-sementara.php">
							<div class="parent-icon"><i class='bx bx-user-plus'></i>
							</div>
							<div class="menu-title">User Sementara</div>
						</a>

					</li>

				<?php
				} else {
				?>

					<span> </span>

				<?php
				}

				?>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">

					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					<div class="search-bar flex-grow-1">
					</div>
					<div class="top-menu ms-auto">

						<div class="header-notifications-list">

						</div>

						<div class="header-message-list">

						</div>


					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="../assets/images/icons/user.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php echo $_SESSION['qwe']; ?></p>
								<p class="designattion mb-0"><?php echo $_SESSION['fungsi']; ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="action/proses.php?aksi=logout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">