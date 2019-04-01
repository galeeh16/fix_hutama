<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="<?= base_url('admin/dashboard'); ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/user') ?>" class=""><i class="lnr lnr-database"></i> <span>Data User</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/gejala') ?>" class=""><i class="lnr lnr-database"></i> <span>Data Gejala</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/penyakit') ?>" class=""><i class="lnr lnr-database"></i> <span>Data Penyakit</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/rules') ?>" class="active"><i class="lnr lnr-database"></i> <span>Data Rules</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/news') ?>" class=""><i class="lnr lnr-alarm"></i> <span>Data News</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<div class="panel">
								<div class="panel-body">
									<div class="form-group">
										<button type="button" class="btn btn-primary" title="Tambah Rules" onclick="submit('tambah')"><i class="fa fa-plus-square"></i>  TAMBAH RULES</button>
									</div>

									<div class="row mt-2">
										<div class="col-sm-3">
											<div class="form-group">
												<label style="display: inline-block !important; font-weight: normal;">Tampilkan </label>
												<select name="rowsperpage" id="rowsperpage" style="display: inline-block !important; border-radius: 4px; padding: 2px 4px;">
													<option value="10">10</option>
													<option value="15">15</option>
													<option value="20">20</option>
													<option value="30">30</option>
													<option value="50">50</option>
												</select>
												per halaman
											</div>
										</div>
										<div class="col-sm-5">
											<input type="text" name="search" id="search" class="form-control" placeholder="Search...">
										</div>
										<div class="col-sm-4">
											<label style="font-weight: normal; margin-top: 7px; padding-left: 0; padding-right: 0;" class="col-sm-3">Urutkan :</label>
											<div class="col-sm-9" style="padding-right: 0;">
												<select name="bobot" id="bobot" class="form-control" style="display: inline-block;">
													<option value="all">Semua</option>
													<option value="1">Bobot Tertinggi</option>
													<option value="2">Bobot Terendah</option>
												</select>
											</div>
										</div>
									</div>

									<!-- TABLE USERS -->
									<div id="data-rules">

									</div>
									<!-- END TABLE USERS -->
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->

		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="https://if.upnyk.ac.id" target="_blank" title="IF UPNYK">IF UPNYK</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->

	<!-- JAVASCRIPT -->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
	<script src="<?php echo base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/klorofil-common.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatable/media/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatable/media/js/dataTables.bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/jquery-blockUI/jquery.blockUI.js') ?>"></script>

	<!-- DATATABLE SCRIPT -->
	<script>
		var dataTable, msg= '';

		function getData(num) {
			var search = $('#search').val();
			var rowsperpage = $('#rowsperpage').val();
			var bobot = $('#bobot').val();

			$.ajax({
				url: "<?php echo base_url('admin/rules/get_data') ?>",
				type: 'GET',
				data: 'p='+num+'&search='+search+'&rowsperpage='+rowsperpage+'&bobot='+bobot,
				beforeSend: function() {
					$('#data-rules').block({
						message: '<img src="<?= base_url()?>assets/img/loading.gif" width="100px"><p>Please wait...</p>'
					});
				},
				success: function(response){
					console.log(response);
					$('#data-rules').html(response);
					$('#data-rules').unblock();
				},
				error: function(xhr, stat, err){
					console.error(err);
				}
			});
		}

		$(document).ready(function() {

			getData(0);

			$('#rowsperpage, #bobot').on('change', function(){
				getData(0);
			});

			$('#search').on('keyup', function(){
				getData(0);
			});

		});

	</script>
