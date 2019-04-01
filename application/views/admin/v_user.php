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
							<a href="<?= base_url('admin/user') ?>" class="active"><i class="lnr lnr-database"></i> <span>Data User</span>
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
										<button type="button" class="btn btn-primary" title="Tambah User" onclick="submit('tambah')"><i class="fa fa-plus-square"></i>  TAMBAH USER</button>
									</div>

									<div class="row mt-2 mb-1">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="" class="col-sm-3" style="padding-left: 0; padding-right: 0;">Show :</label>
												<div class="col-sm-9">
													<select name="rowsperpage" id="rowsperpage" class="form-control">
														<option value="10">10 per page</option>
														<option value="15">15 per page</option>
														<option value="20">20 per page</option>
														<option value="30">30 per page</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input type="text" name="search" id="search" class="form-control input-search" placeholder="Search...">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="form-group">
												<label for="" class="control-label col-sm-4">Sort By :</label>
												<div class="col-sm-8" style="padding-left: 0;">
													<select name="level" id="level" class="form-control">
														<option value="">Semua</option>
														<option value="Admin">Admin</option>
														<option value="Member">Member</option>
													</select>
												</div>
											</div>
										</div>

									</div>

									<!-- TABLE USERS -->
										<div id="data-user">

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

		<!-- MODAL USER -->
		<div class="modal fade" id="modal-user" data-backdrop="static" data-keyboard="false" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<!-- FORM OPEN -->
					<?php echo form_open('#', ['class'=>'form-horizontal', 'id'=>'form-user']); ?>
						<div class="modal-header" style="background-color: #F6F9FC">
							<button type="button" class="close" data-dismiss="modal" onclick="resetForm()" title="Tutup Modal">&times;</button>
							<h4 class="modal-title text-center"></h4>
						</div>
						<!-- MODAL BODY -->
						<div class="modal-body">
							<input type="hidden" name="id_user">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="container-fluid">
										<div class="form-group" style="margin-bottom: 2px">
											<label class="control-label">Nama *</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap">
										</div>
										<div class="form-group" style="margin-bottom: 2px">
											<label class="control-label">Username *</label>
											<input type="text" name="username" id="username" class="form-control" placeholder="Username">
										</div>
										<input type="hidden" name="username_2">
										<div class="form-group" style="margin-bottom: 2px">
											<label class="control-label">Password *</label>
											<input type="password" name="password" id="password" class="form-control" placeholder="Password">
										</div>
										<div class="form-group" style="margin-bottom: 2px">
											<label class="control-label">Alamat *</label>
											<textarea name="address" id="address" class="form-control" rows="5" placeholder="Alamat"></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="container-fluid">
										<div class="form-group" style="margin-bottom: 2px">
											<label class="control-label">HP *</label>
											<input type="text" name="handphone" id="handphone" class="form-control" placeholder="Handphone">
										</div>
										<div class="form-group" style="margin-bottom: 2px">
											<label class="control-label">Level *</label>
											<select name="level" id="level" class="form-control">
												<option value="">Pilih Level</option>
												<option value="Admin">Admin</option>
												<option value="Member">Member</option>
											</select>
										</div>
										<div class="form-group" style="margin-bottom: 2px">
											<label class="control-label">Foto</label>
											<input type="file" class="form-control" name="photo" id="photo">
										</div>
									</div>
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
		var dataTable, url, msg = '';
		// var url, msg = '';
			// $.blockUI({
			// 				message: '<img src="<?= base_url()?>assets/img/loading.gif" width="100px"><p>Loading...</p>'
			// 			});

		function getData(num) {
			var level = $('#level').val();
			var search = $('#search').val();
			var rowsperpage = $('#rowsperpage').val();
			$.ajax({
				url: '<?php echo base_url().'admin/user/get_data' ?>',
				type: 'GET',
				data: 'p='+num+'&level='+level+'&search='+search+'&rowsperpage='+rowsperpage,
				beforeSend: function() {
					$('#data-user').block({
						message: '<img src="<?= base_url()?>assets/img/loading.gif" width="100px"><p>Please wait...</p>'
					});
				},
				success: function(response) {
					console.log(response);
					$('#data-user').html(response);
					$('#data-user').unblock();
				},
				error: function(xhr, stat, err){
					console.error(err);
				}
			});
		}

		$(document).ready(function() {

			getData(0);

			$('#level, #rowsperpage').on('change', function(){
				getData(0);
			});

			$('#search').on('keyup', function() {
				getData(0);
			});


			// FORM SUBMIT
			$('#form-user').on('submit', function(e) {
				e.preventDefault();
				var form = $(this);
				var data = new FormData();

				data.append('id_user', $('[name="id_user"]').val());
				data.append('username_2', $('[name="username_2"]').val());
				data.append('username', $('#username').val());
				data.append('password', $('#password').val());
				data.append('name', $('#name').val());
				data.append('address', $('#address').val());
				data.append('handphone', $('#handphone').val());
				data.append('level', $('#level').val());
				data.append('photo', $('#photo')[0].files[0]);

				$.ajax({
					url: url,
					data: data,
					type: 'post',
					dataType: 'json',
					processData: false,
					contentType: false,
					beforeSend: function(){
						$.blockUI({
							message: '<img src="<?= base_url()?>assets/img/loading.gif" width="100px"><p>Harap Tunggu...</p>'
						});
					},
					success: (result) => {
						console.log(result);
						if(result.success == true) {
							resetForm();
							$('#modal-user').modal('hide');
							swal("Sukses!", msg, "success")
							.then((value) => {
								// window.location.reload();
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
					complete: () => {
						$.unblockUI();
					},
					error: (xhr, stat, err) => {
						console.error(err);
					}
				});

			});
			// END FORM SUBMIT

		});

		function submit(arg) {
			$('#modal-user').modal('show');

			if(arg == 'tambah') {
				$('.modal-title').text('Tambah User');
				url = '<?php echo base_url('admin/user/tambah') ?>';
				msg = 'Berhasil menambahkan user';
			} else {
				url = '<?php echo base_url('admin/user/ubah') ?>';
				$('.modal-title').text('Ubah User');
				msg = 'Berhasil mengubah data user';

				$.ajax({
					url: '<?php echo base_url('admin/user/get_id') ?>',
					type: 'post',
					data: 'id_user='+arg,
					dataType: 'json',
					success: (res) => {
						$('[name="id_user"]').val(res.id_user);
						$('[name="username_2"]').val(res.username);
						$('#name').val(res.name);
						$('#username').val(res.username);
						$('#password').val(res.password);
						$('#address').val(res.address);
						$('#handphone').val(res.handphone);
						$('#level').val(res.level);
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

			$('#form-user')[0].reset();
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
				  	url: '<?= base_url('admin/user/hapus') ?>',
				  	data: 'id_user='+id,
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
