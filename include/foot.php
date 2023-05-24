		</div>
		</div>
		<!--end page wrapper -->

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. Magang ICT </p>
		</footer>
		</div>
		<!--end wrapper-->

		<!-- Bootstrap JS -->
		<script src="../assets/js/bootstrap.bundle.min.js"></script>
		<!--plugins-->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
		<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
		<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
		<script src="../assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="../assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
		<script src="../assets/plugins/jquery-knob/excanvas.js"></script>
		<script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>
		<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
		<script>
			$(function() {
				$(".knob").knob();
			});
		</script>

		<!-- plugin datatable example2 -->

		<script>
			$(document).ready(function() {
				var table = $('#example2').DataTable({
					lengthChange: false,
					buttons: ['copy', 'excel', 'pdf', 'print']
				});

				table.buttons().container()
					.appendTo('#example2_wrapper .col-md-6:eq(0)');

				//bahasa indo plugin datatables 
				$('#dt').DataTable({
					"language": {
						"url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
						"sEmptyTable": "Tidads"
					}
				});
			});
		</script>

		<!-- end plugin datable example2 -->

		<script>
			//ajax data driver & mobil
			$(document).ready(function() {

				$('#driver').on('change', function() {
					var value = $(this).val();
					//alert(value);

					$.ajax({
						url: "../dashboard/action/ajaxmobil.php",
						data: "id_supir=" + value,

						success: function(data) {
							var json = data,
								obj = JSON.parse(json);
							$('#nopol1').val(obj.nopol);
							$('#model1').val(obj.model);
							$('#idsa1').val(obj.id);
						}
					});
				});
				//end ajax data driver & mobil

				//ajax data mobil
				$('#mobil').on('change', function() {
					var value = $(this).val();
					//alert(value);
					$.ajax({
						url: "../dashboard/action/ajaxmobil2.php",
						data: "id_kendaraan=" + value,

						success: function(data) {
							var json = data,
								obj = JSON.parse(json);
							$('#nopol').val(obj.nopol);
							$('#model').val(obj.model);
						}
					});

				});
				//end ajax data mobil


				//for data dari modal pilihmobil
				$(document).on('click', '#testmodal', function() {
					var nama = $(this).data('nama');
					var id = $(this).data('supir');

					//alert(id);

					$('#nama').val(nama);
					$('#supir').val(id);


				});
				//end for data dari modal pilihmobil

				//for data dari modal setuju
				$(document).on('click', '#reservasimodal', function() {
					var nopes = $(this).data('reservasi');
					var id = $(this).data('reservasiid');

					//alert(nopes);

					$('#nopes').val(nopes);
					$('#ids').val(id);

				});
				//end for data dari modal setuju



			});
		</script>


		<script src="../assets/js/index.js"></script>

		<!--app JS-->
		<script src="../assets/js/app.js"></script>

		<script>
			$(function() {
				$('[data-bs-toggle="popover"]').popover();
				$('[data-bs-toggle="tooltip"]').tooltip();
			})
		</script>
		</body>

		</html>