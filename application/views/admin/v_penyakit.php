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
							<a href="<?= base_url('admin/penyakit') ?>" class="active"><i class="lnr lnr-database"></i> <span>Data Penyakit</span>
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
									<div class="form-group">
										<button type="button" class="btn btn-primary" title="Tambah Penyakit" onclick="submit('tambah')">
											<i class="fa fa-plus-square"></i> TAMBAH PENYAKIT
										</button>
									</div>

									<div class="row mt-2 mb-1">
										<div class="col-sm-3">
											<div class="form-group" style="padding: 0;">
												<label class="control-label col-sm-2" style="padding-left: 0; padding-right: 0; margin-top: 7px;">Show</label>
												<div class="col-sm-10">
													<select name="rowsperpage" id="rowsperpage" class="form-control">
														<option value="10">10 per page</option>
														<option value="15">15 per page</option>
														<option value="20">20 per page</option>
														<option value="25">25 per page</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-5"></div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="search" name="search" placeholder="Search...">
										</div>
									</div>

									<div id="data-penyakit">

									</div>


								</div>
							</div>
						</div>
					</div>
					<!-- END ROW -->

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

	<!-- MODAL PENYAKIT -->
	<div class="modal fade" id="modal-penyakit" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<?= form_open_multipart('', ['id'=>'form-penyakit', 'class'=>'form-horizontal']); ?>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" title="Tutup Modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<?= form_hidden('id_penyakit'); ?>
						<?= form_hidden('kode_penyakit_2'); ?>
						<div class="form-group">
							<label class="control-label col-md-3">Kode Penyakit</label>
							<div class="col-md-9">
								<input type="text" name="kode_penyakit" id="kode_penyakit" class="form-control" placeholder="Kode Penyakit">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Nama Penyakit</label>
							<div class="col-md-9">
								<input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" placeholder="Nama Penyakit">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Deskripsi Penyakit</label>
							<div class="col-md-9">
								<textarea name="deskripsi_penyakit" id="deskripsi_penyakit" rows="8" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Solusi</label>
							<div class="col-md-9">
								<select name="id_solusi" id="id_solusi" class="form-control">
									<option value="">Pilih Solusi</option>
									<?php foreach ($solusi as $value): ?>
									<option value="<?= $value->id_solusi; ?>"><?= $value->nama_solusi; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Foto Penyakit</label>
							<div class="col-md-9">
								<input type="file" class="form-control" name="foto" id="foto">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" title="Submit">
							<span class="fa fa-send"></span> SUBMIT
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal" title="Tutup Modal" onclick="resetForm()">
							<span class="fa fa-times"></span> BATAL
						</button>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
	<!-- END MODAL PENYAKIT -->

	<!-- MODAL DETAIL -->
	<div class="modal fade" id="modal-detail" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" title="Tutup Modal">&times;</button>
					<h4 class="modal-title" id="penyakit_nama"></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8">
							<h4>Deskripsi Penyakit</h4>
							<div id="deskripsi"></div>
							<h4>Gejala</h4>
							<div id="gejala"></div>
							<h4>Solusi</h4>
							<div id="solusi"></div>
						</div>
						<div class="col-md-4">
							<div id="foto_penyakit"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal" title="Tutup Modal">
						<span class="fa fa-times"></span> Tutup Modal
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- END MODAL DETAIL -->

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

	<!-- SCRIPT PENYAKIT -->
	<script>
		var dataTable = '';
		var url, msg = '';

		function getData(num) {
			var search = $('#search').val();
			var rowsperpage = $('#rowsperpage').val();

			$.ajax({
					url: "<?php echo base_url().'admin/penyakit/get_data' ?>",
					type: 'GET',
					data: 'p='+num+'&search='+search+'&rowsperpage='+rowsperpage,
					beforeSend: function() {
						$('#data-penyakit').block({
							message: '<img src="<?= base_url()?>assets/img/loading.gif" width="100px"><p>Please wait...</p>'
						});
					},
					success: function(response) {
						console.log(response);
						$('#data-penyakit').html(response);
						$('#data-penyakit').unblock();
					},
					error: function(xhr, stat, err) {
						console.error(err);
					}
			});
		}

		$(document).ready(function() {

			getData(0);

			$('#search').on('keyup', function(){
				getData(0);
			});

			$('#rowsperpage').on('change', function(){
				getData(0);
			});

			// FORM SUBMIT
			$('#form-penyakit').on('submit', function(e) {
				e.preventDefault();
				var form = $(this);
				var data = new FormData();

				data.append('id_penyakit', $('[name="id_penyakit"]').val());
				data.append('kode_penyakit_2', $('[name="kode_penyakit_2"]').val());
				data.append('kode_penyakit', $('#kode_penyakit').val());
				data.append('nama_penyakit', $('#nama_penyakit').val());
				data.append('deskripsi_penyakit', $('#deskripsi_penyakit').val());
				data.append('id_solusi', $('#id_solusi').val());
				data.append('foto', $('#foto')[0].files[0]);

				$.ajax({
					url: url,
					data: data,
					type: 'post',
					dataType: 'json',
					processData: false,
					contentType: false,
					success: (result) => {
						console.log(result);
						if(result.success == true) {
							resetForm();
							$('#modal-penyakit').modal('hide');
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
			$('#modal-penyakit').modal('show');

			if(arg == 'tambah') {
				$('.modal-title').text('Tambah Penyakit');
				url = '<?php echo base_url('admin/penyakit/tambah') ?>';
				msg = 'Berhasil menambahkan penyakit';
			} else {
				url = '<?php echo base_url('admin/penyakit/ubah') ?>';
				$('.modal-title').text('Ubah Penyakit');
				msg = 'Berhasil mengubah data penyakit';

				$.ajax({
					url: '<?php echo base_url('admin/penyakit/get_id') ?>',
					type: 'post',
					data: 'id_penyakit='+arg,
					dataType: 'json',
					success: (res) => {
						$('[name="id_penyakit"]').val(res.id_penyakit);
						$('[name="kode_penyakit_2"]').val(res.kode_penyakit);
						$('#kode_penyakit').val(res.kode_penyakit);
						$('#nama_penyakit').val(res.nama_penyakit);
						$('#deskripsi_penyakit').val(res.deskripsi_penyakit);
						$('#id_solusi').val(res.id_solusi);
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

			$('#form-penyakit')[0].reset();
		}

		function hapus(id) {
			swal({
			  title: "",
			  text: "Apakah anda yakin akan menghapus data ini?",
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
				  	url: '<?= base_url('admin/penyakit/hapus') ?>',
				  	data: 'id_penyakit='+id,
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
