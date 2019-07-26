	
<div class="container" style="margin-top: 100px; margin-bottom: 0px">
			<!-- SEBELAH KIRI -->
				<div class="row" style="margin-top: 0">

					<?php if ($_SESSION['total'] > 1): ?>

						<div class="col-md-6 col-sm-6">

							<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title"><b>HASIL DIAGNOSA</b></h4>
								</div>

								<!-- PERHITUNGAN -->
								<div class="collapse">
									
									<?php foreach ($_SESSION['kombinasi'] as $key1 => $value1): ?>
										<!-- HASIL AKHIR -->
										<?php unset($value1['jumlahakhir']['teta']); ?>

										<?php foreach ($value1['jumlahakhir'] as $key2 => $value2): ?>
											<?php echo $value1['rumus'][$key2][0] ?>
											<?php echo $value1['rumus'][$key2][1] ?>
											<?php echo round($value2, 3) ?>
										<?php endforeach ?>

									<?php endforeach ?>
								</div>
								<!-- END PERHITUNGAN -->

								<div class="panel-body">
									<!-- <hr style="border: 1px solid black;"> -->
									<?php $kode_penyakit_max = array_search(max($value1['jumlahakhir']), $value1['jumlahakhir']); ?>
									<?php $kode_penyakit = explode(", ", $kode_penyakit_max); ?>

									<?php
									echo "<ol>";
									for($i=0;$i<count($kode_penyakit);$i++)
									{
										//helper tampil_penyakit fungsi penyakit
										$hasil = penyakit($kode_penyakit[$i]);
										//helper tampil_penyakit fungsi history
										// history($kode_penyakit[$i]);

										$foto = "<img src=".base_url("assets/img/penyakit/$hasil[foto]")." width='250'>";
										$no=$i+1;
										$belief_akhir = round(max($value1['jumlahakhir']) * 100 , 2);
										echo "<li class='text-justify'><b>".$hasil['nama_penyakit']. "</b> dengan tingkat kepercayaan ".$belief_akhir ."%<br>".$foto."<br><br><b>Solusi</b> :<br>".$hasil['nama_solusi']."<hr></li>";
									}
									echo "</ol>";
									?>

									<div class="form-group pull-left">
										<a href="<?php echo base_url().'Member' ?>" class="btn btn-danger btn-sm" title="Ulangi Diagnosa" style="color: white;">
											Ulangi Diagnosa <i class="glyphicon glyphicon-repeat"></i>
										</a>
									</div>
									<div class="form-group pull-right">
										<button type="button" id="showPerhitungan" class="btn btn-info btn-sm" title="Lihat Perhitungan">
											Lihat Perhitungan <i class="glyphicon glyphicon-arrow-right"></i> 
										</button>
									</div>
								</div>
								<!-- end panel-body -->
							</div>
							<!-- end panel panel-info -->
						</div>
						<!-- end col-md-6 col-md-offset-6 -->
						<!-- END SEBELAH KIRI -->



						<!-- SEBELAH KANAN -->
						<div class="col-md-6 col-sm-6">
							<!-- LIHAT PERHITUNGAN -->
							<div id="perhitungan">
								<div class="panel panel-info">
									<div class="panel-heading">
										<strong>PERHITUNGAN</strong>
									</div>

									<div class="panel-body">
										<?php foreach ($_SESSION['kombinasi'] as $key1 => $value1): ?>
											<?php $urutankombinasi = $key1+1;  $kom = $key1+1; ?>

											<table class="table table-bordered table-condensed" style="font-size: 100%">
												<thead>
													<caption><center>Densitas Awal</center></caption>
													<tr class="text-muted">
														<th class="text-center ">Densitas</th>
														<th class="text-center ">Gejala</th>
														<th class="text-center">Kode Penyakit</th>
														<th class="text-center">Bel</th>
														<th class="text-center">Plau</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($value1['dataawal'] as $key2 => $value2): ?>
														<?php $urutankombinasi2 = $key2+1; ?>
														<tr class="text-muted">
															<td class="text-center">
																<?php if ($key1==0): ?>
																	M<?php echo $urutankombinasi2 ?>
																	<?php else: ?>
																		<?php if ($key2==0): ?>
																			M<?php echo 2*$urutankombinasi-$urutankombinasi2 ?>
																			<?php else: ?>
																				M<?php echo 2*$urutankombinasi ?>
																			<?php endif ?>
																		<?php endif ?>
																	</td>
																	<td>
																		<?php

																		if($key1==0) {
																			$key_data_gejala = $key2;
																		} else {
																			if($key2==0) {
																				$key_data_gejala = "kosong";
																			} else {
																				$key_data_gejala = $key1+1;
																			}
																		}

																		if($key_data_gejala!=="kosong") {
																			// memanggil helper
																			$gejaladata = gejala($gejala_dipilih[$key_data_gejala]);
																			echo $gejaladata['nama_gejala'];
																		} else {
																			echo "-";
																		}
																		?>
																	</td>
																	<td class="text-center">
																		<?php foreach ($value2 as $key3 => $value3) { ?>
																			<?php if ($key3!=="teta") { ?>
																				<?php echo $key3; ?>
																				<br>
																			<?php } ?>
																		<?php } ?>
																	</td>
																	<td class="text-center">
																		<?php foreach ($value2 as $key3 => $value3){ ?>
																			<?php if ($key3!=="teta"){ ?>
																				<?php echo round($value3, 2) ?>
																				<br>
																			<?php } ?>
																		<?php } ?>
																	</td>
																	<td class="text-center">
																		<?php echo round($value2['teta'], 2) ?>
																	</td>
																</tr>
															<?php endforeach ?>
															<!-- end foreach value1['dataawal'] -->
														</tbody>
													</table>

													<p class="text-muted">Keterangan : <br>
														P01 = Sariawan (Stomatitis) <br>
														P02 = IBD (Inslusion Body Disease) <br>
														P03 = Sembelit (Constipation) <br>
														P04 = Parasit (Parasites) <br>
														P05 = Flu (Influenza)
													</p>

													<h4 class="text-muted"><b>Kombinasi <?php echo $urutankombinasi ?></b></h4>
													<table class="table table-bordered " style="font-size: 100%">
														<caption><center>Kombinasi Densitas</center></caption>
														<thead>
															<tr class="text-muted">
																<th></th>
																<?php foreach ($value1['dataawal'][1] as $key_kolom => $value_kolom): ?>
																	<th class="text-center">
																		M<?php echo 2*$key1+2?> (<?php echo $key_kolom?>)
																		<br>
																		<?php echo round($value_kolom, 2) ?>
																	</th>
																<?php endforeach ?>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($value1['dataawal'][0] as $key_baris => $value_baris): ?>
																<tr class="text-muted">
																	<th class="text-center">
																		M<?php echo 2*$key1+1?> (<?php echo $key_baris?>)
																		<br>
																		<?php echo round($value_baris, 3) ?>
																	</th>
																	<?php foreach ($value1['dataawal'][1] as $key_kolom => $value_kolom): ?>
																		<td class="text-center">
																			<?php echo $value1['irisan'][$key_kolom][$key_baris] ?>
																			<br>
																			<?php echo round($value1['perkalian'][$key_kolom][$key_baris], 3) ?>
																		</td>
																	<?php endforeach ?>
																</tr>
															<?php endforeach ?>
														</tbody>
													</table>

													<table class="table " style="font-size: 100%">
														<caption><center>Perhitungan Dempster</center></caption>

														<?php foreach ($value1['jumlahakhir'] as $key2 => $value2): ?>
															<tr class="text-muted">
																<th width="25%">M<?php echo (2 * $urutankombinasi)+1 ?> ( <?php echo $key2 ?> )</th>
																<td>
																	: <?php echo $value1['rumus'][$key2][0] ?>
																	<br>
																	: <?php echo $value1['rumus'][$key2][1] ?>
																	<br>
																	: <?php echo round($value2, 5) ?>
																</td>
															</tr>
														<?php endforeach ?>
													</table>

													<?php 
													$kode_penyakit_max = array_search(max($value1['jumlahakhir']), $value1['jumlahakhir']); 
													$belief_akhir = round(max($value1['jumlahakhir'])*100, 2);
													?>
													<p class="text-muted">Dari perhitungan tersebut diranking sehingga didapat penyakit tertinggi, yaitu : <br>	
														<?php echo $kode_penyakit_max; ?> dengan derajat kepercayaan <?php echo $belief_akhir.' %'; ?></p>

														<hr style="border: 1px solid;" class="text-muted">
														<?php 
														?>
														<?php $kode_penyakit = explode(", ", $kode_penyakit_max); ?>
														<?php
														echo "<ol>";
														for($i=0;$i<count($kode_penyakit);$i++)
														{
															$hasil = penyakit($kode_penyakit[$i]);
															$no=$i+1;
															$belief_akhir = round(max($value1['jumlahakhir']) * 100 , 2);
														}
														echo "</ol>";
														?>
													<?php endforeach ?>
													<!-- end foreach session['kombinasi'] -->
												</div>
												<!-- end panel-body -->
											</div>
											<!-- end panel panel-info -->
										</div>
										<!-- END LIHAT PERHITUGNAN -->
									</div>
									<!-- end col-md-6 col-md-offset-6 -->
								<?php else: ?>

									<div class="col-md-12">
										<div class="panel panel-info">
											<div class="panel-heading">
												<h4 class="panel-title"><b>HASIL DIAGNOSA</b></h4>
											</div>
											<div class="panel-body">
												<p>Dari 1 pilihan gejala <b><?php echo $_SESSION['satu_gejala']['nama_gejala']; ?></b> tersebut didapat hasil penyakit : </p>
												
												<?php foreach ($_SESSION['penyakit'] as $key => $row): ?>
													<div>
														<?php $bobot = $row['cf'] * 100; ?>
														<?php echo $key+1 . '. ' . $row['nama_penyakit'] . ' dengan presentase <b>' .  $bobot . '%</b>'; ?>
														<div style="margin-top: 5px;">
															<img src="<?= base_url('assets/img/penyakit/' . $row['foto']) ?>" alt="<?= $row['foto']; ?>" width="200px" style="float: left; margin-right: 20px;">
															<p><?= $row['deskripsi_penyakit']; ?></p>
															<div style="clear: both;"></div>
														</div>
													</div>
													<br>
												<?php endforeach ?>

											</div>
										</div>

										<div class="form-group pull-left">
											<a href="<?php echo base_url().'Member' ?>" class="btn btn-danger btn-sm" title="Ulangi Diagnosa" style="color: white;">
												Ulangi Diagnosa <i class="glyphicon glyphicon-repeat"></i>
											</a>
										</div>
										<div class="form-group pull-right">
											<button type="button" id="showPerhitungan" class="btn btn-info btn-sm" title="Lihat Perhitungan">
												Lihat Perhitungan <i class="glyphicon glyphicon-arrow-right"></i> 
											</button>
										</div>

									</div>

								

								<?php endif ?>
							</div> 
							<!-- end row -->
					
			</div>
	<!-- end container -->


	<script>
		$(document).ready(function() {
			$('#showPerhitungan').on('click', function() {
				$('#perhitugan').toggle();
			});
		});
	</script>