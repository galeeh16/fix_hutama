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
							<a href="<?= base_url('admin/gejala') ?>" class="active"><i class="lnr lnr-database"></i> <span>Data Gejala</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/penyakit') ?>" class=""><i class="lnr lnr-database"></i> <span>Data Penyakit</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/rules') ?>" class=""><i class="lnr lnr-database"></i> <span>Data Rules</span>
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
									<div class="row">
										<div class="col-sm-8">
											<!-- TOMBOL TAMBAH USER -->
											<div class="form-group">
												<button type="button" class="btn btn-primary" title="Tambah User" onclick="submit('tambah')"><i class="fa fa-plus-square"></i>  TAMBAH GEJALA</button>
											</div>
											<!-- END TOMBOL TAMBAH USER -->
										</div>

									</div>
									<div class="row">
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
											<input type="text" class="form-control" id="search" name="search" placeholder="Search...">
										</div>
									</div>

									<!-- TABLE GEJALA -->
										<div id="data-gejala">

										</div>
									<!-- END TABLE GEJALA -->
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

		<!-- MODAL USER -->
		<div class="modal fade" id="modal-gejala" data-backdrop="static" data-keyboard="false" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<!-- FORM OPEN -->
					<?php echo form_open('#', ['class'=>'form-horizontal', 'id'=>'form-gejala']); ?>
						<div class="modal-header" style="background-color: #F6F9FC">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title text-center"></h4>
						</div>
						<!-- MODAL BODY -->
						<div class="modal-body">
							<input type="hidden" name="id_gejala">
							<input type="hidden" name="kode_gejala_2">
							<div class="form-group">
								<label for="kode_gejala" class="control-label col-md-3">Kode Gejala *</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="kode_gejala" id="kode_gejala" placeholder="Kode Gejala" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label for="nama_gejala" class="control-label col-md-3">Nama Gejala *</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="nama_gejala" id="nama_gejala" placeholder="Nama Gejala" autocomplete="off">
								</div>
							</div>
						</div>
						<!-- END MODAL BODY -->
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" title="Submit">SUBMIT</button>
							<button type="button" class="btn btn-danger" title="Batal" data-dismiss="modal" onclick="resetForm()">BATAL</button>
						</div>
					<?php echo form_close() ?>
					<!-- END FORM -->
				</div>
			</div>
		</div>
		<!-- END MODAL USER -->

	<!-- JAVASCRIPT -->
	<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?= base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
	<script src="<?= base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
	<script src="<?= base_url('assets/scripts/klorofil-common.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/sweetalert/sweetalert.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/datatable/media/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatable/media/js/dataTables.bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/jquery-blockUI/jquery.blockUI.js') ?>"></script>

	<style>
		.swal-button--cancel {
			background-color: #EE5773;
			color: #fff;
		}
	</style>

	<!-- DATATABLE SCRIPT -->
	<script type="text/javascript" language="javascript">
		var url, msg = '';

		function getData(num) {
			var search = $('#search').val();
			var rowsperpage = $('#rowsperpage').val();

			$.ajax({
				url: '<?php echo base_url().'admin/gejala/get_data' ?>',
				type: 'GET',
				data: 'p='+num+'&search='+search+'&rowsperpage='+rowsperpage,
				beforeSend: function() {
					$('#data-gejala').block({
						message: '<img src="<?= base_url()?>assets/img/loading.gif" width="100px"><p>Please wait...</p>'
					});
				},
				success: function(response) {
					console.log(response);
					$('#data-gejala').html(response);
					$('#data-gejala').unblock();
				},
				error: function(xhr, stat, err){
					console.error(err);
				}
			});
		}

		$(document).ready(function() {

			getData(0);

			$('#search').on('keyup', function(e){
				e.preventDefault();
				getData(0);
			});

			$('#rowsperpage').on('change', function(){
				getData(0);
			});

			// FORM SUBMIT
			$('#form-gejala').on('submit', function(e) {
				e.preventDefault();
				var form = $(this);

				$.ajax({
					url: url,
					data: form.serialize(),
					type: 'post',
					dataType: 'json',
					success: (result) => {
						console.log(result);
						if(result.success == true) {
							resetForm();
							$('#modal-gejala').modal('hide');
							swal("Sukses!", msg, "success")
							.then((value) => {
								getData(0);
							});
						} else {
							$.each(result.messages, (key, val) => {
								var el = $('#' + key);

								el.closest('div.form-group')
									.removeClass('has-error')
									.removeClass('has-success')
									.addClass(val.length > 0 ? 'has-error' : 'has-success')
									.find('.help-block')
									.remove();

								el.after(val);
							});
						}
					},
					error: (xhr, stat, err) => {
						console.error(err);
					}
				});

			});
			// END FORM SUBMIT

		});

		function submit(arg) {
			$('#modal-gejala').modal('show');

			if(arg == 'tambah') {
				$('.modal-title').text('Tambah Gejala');
				url = '<?php echo base_url('admin/gejala/tambah') ?>';
				msg = 'Berhasil menambahkan gejala';
			} else {
				url = '<?php echo base_url('admin/gejala/ubah') ?>';
				$('.modal-title').text('Ubah Gejala');
				msg = 'Berhasil mengubah data gejala';

				$.ajax({
					url: '<?php echo base_url('admin/gejala/get_id') ?>',
					type: 'post',
					data: 'id_gejala='+arg,
					dataType: 'json',
					success: (res) => {
						$('[name="id_gejala"]').val(res.id_gejala);
						$('[name="kode_gejala_2"]').val(res.kode_gejala);
						$('#nama_gejala').val(res.nama_gejala);
						$('#kode_gejala').val(res.kode_gejala);
					},
					error: (xhr, stat, err) => {
						console.error(xhr + stat + err);
					}
				});
			}
		}

		function resetForm() {
			$('div.form-group')
			.removeClass('has-error')
			.removeClass('has-success')
			.find('.help-block')
			.remove();

			$('#form-gejala')[0].reset();
		}

		function hapus(id) {
			swal({
			  title: "",
			  text: "Menghapus data gejala akan menghapus data pada rules, tetap lanjutkan?",
			  icon: "warning",
			  buttons: ['Batal', 'Hapus'],
			  // dangerMode: true,
			  animation: true,
			  showConfirmButton: true,
			  showCancelButton: true,
			  confirmButtonText: 'Hapus',
			  confirmButtonColor: '#8CD4F5',
			  // cancelButtonText: 'Batal',
			  // cancelButtonColor: '#F46565'
			})
			.then((value) => {
			  if(value) {
			  	$.ajax({
				  	url: '<?= base_url('admin/gejala/hapus') ?>',
				  	data: 'id_gejala='+id,
				  	type: 'post',
				  	dataType: 'json',
				  	success: res => {
				  		if(res.success == true) {
				  			swal('','Berhasil menghapus data', 'success').then((val) => {getData(0);});
				  		}
				  	},
				  	error: (xhr, stat, err) => {
				  		console.log(xhr + stat + err);
				  		swal('','Gagal menghapus data', 'error').then((val) => {getData(0);});
				  	}
				  });
			  }
			});
		}

	</script>
