<style>
  #img-container {
    background: url(<?php echo base_url('assets/img/coffee.jpg')?>);
    background-color: #FFF;
    background-repeat: no-repeat;
    background-size: contain;
    /* background-attachment: fixed; */
    background-position: center top;
    min-height: 400px;
    height: 400px;
    max-height: 400px;
  }
  #img-container div {
    font-family: 'OpenSans';
    margin: auto;
    font-size: 38px;
    text-align: center;
    letter-spacing: 1.2px;
    line-height: 380px;
    /* text-shadow: 1px 1px #777; */
  }
  #upn {
    background: url(<?php echo base_url('assets/img/upn.jpg')?>);
    background-color: #FFF;
    background-repeat: no-repeat;
    background-size: cover;
    /* background-attachment: fixed; */
    background-position: center top;
    min-height: 200px;
    height: 440px;
  }
  ol {
    margin-block-start: 0;
    margin-block-end: 0;
    padding-inline-start: 14px;
    padding-inline-end: 14px;
  }
  ol > li {
    padding-left: 10px;
    line-height: 28px;
    text-align: justify;
    margin-bottom: 10px;
  }
  .mb-0 { margin-bottom: 0px; }
  .mt-0 { margin-top: 0px;}
  div.slide-text span {
    display: none;
    text-shadow: 1px 2px 4px rgba(0,0,0,0.34);
    font-weight: bold;
  }
  .title-penyakit { font-family: 'OpenSans'; }
</style>

  <section id="home">
    <div class="container-fluid" id="img-container" style="margin-top: 80px">
      <div class="open slide-text ls-1 uppercase gold" style="font-size: 42px;">
        <span>W</span>
        <span>E</span>
        <span>L</span>
        <span>C</span>
        <span>O</span>
        <span>M</span>
        <span>E</span>
      </div>
    </div>
  </section>

  <section class="mt-3" id="info">
    <div class="container">
      <h2 class="open ls-1 uppercase gold thin">Informasi Penyakit</h2>
      <hr>
      <p class="lh-32 ti text-justify">
        Zoonosis adalah infeksi yang ditularkan di antara hewan vertebrata dan manusia atau sebaliknya. Zoonosis mendapat perhatian secara global dalam beberapa tahun terakhir baik mengenai epidemiologi, mekanisme transmisi penyakit dari hewan ke manusia, diagnosa, pencegahan dan kontrol.
      </p>
      <!-- <h2 class="text-center bold uppercase mt-2 ls-1">Contoh Penyakit Zoonosis</h2> -->
      <div class="row mt-2">
        <?php foreach ($penyakit as $key => $row): ?>
        <div class="col-sm-12 mb-1">
          <p class="ls-1 uppercase black bold open"><?= $row->nama_penyakit; ?></p>
          <p class="text-justify"><?= ($row->deskripsi_penyakit == NULL) ? '<i>No description</i>' : $row->deskripsi_penyakit; ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="about-us" class="mt-3">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <h2 class="open ls-1 uppercase gold thin">Tentang Kami</h2>
          <hr>
          <p class="f-16 uppercase ls-1 open black bold">Upn Veteran Yogyakarta <a href="http://www.upnyk.ac.id/" target="_blank" title="Lihat UPN Yogyakarta" data-toggle="tooltip" data-placement="right"><i class="fa fa-external-link"></i></a></p>
          <p class="ls-1 uppercase">Visi :</p>
          <p>Menjadi Universitas Pionir Pembangunan yang dilandasi jiwa bela negara di era global</p>
          <p class="ls-1 uppercase">Misi :</p>
          <ol>
            <li>Menghasilkan lulusan yang berdaya saing global dan berjiwa bela negara melalui pembelajaran berkualitas.</li>
            <li>Mengembangkan konsepsi ilmu pengetahuan, teknologi, sains dan kemanusiaan melalui Pengembangan Program Studi/proses belajar mengajar dan pengayaan keilmuan.</li>
            <li>Meningkatkan kualitas penelitian melalui program terencana, terintegrasi dan berkelanjutan.</li>
            <li>Meningkatkan kualitas pengabdian kepada masyarakat melalui penguatan kerjasama antar institusi pendidikan, industri serta pemerintah.</li>
            <li>Mengembangkan tata kelola universitas yang baik melalui manajemen mandiri, modern dan berkelanjutan dalam bidang SDM, keuangan, Sarana dan Prasarana serta TIK yang terintegrasi.</li>
          </ol>

        </div>
        <div class="col-sm-4">
          <div id="upn"></div>
        </div>
      </div>
      <div class="panel mt-2">
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-2 text-center ">
              <img src="<?= base_url('assets/img/hutama.jpg'); ?>" class="img-circle img-responsive">
            </div>
            <div class="col-sm-10">
              <p class="uppercase f-16 ls-1 open gold">Author</p>
              <p class="black ls-1 open uppercase">Hutama Dewangga Mahendra</p>
              <p>Seorang mahasiswa UPN Veteran Yogyakarta yang sedang berjuang menyelesaikan tugas akhirnya sebagai syarat untuk lulus dan mengikuti wisuda.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="bantuan" class="mt-3">
    <div class="container">
      <h2 class="open gold uppercase ls-1 thin">Bantuan</h2>
      <hr>

      <div class="row mt-3">

  			<div class="col-md-12 col-sm-12 mt-0 mb-0" style="border: none">
  				<!-- PANEL DEFAULT -->
  				<div class="panel mt-0 mb-0">
            <div style="padding: 1em 1.7em 0 1.7em;">
              <span class="pull-left"><p class="ls-1 f-16 uppercase black">Menmbuat Akun<span class="fa fa-user-plus"></span></p></span>
              <span class="pull-right"><a type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></a></span>
              <div class="clearfix"></div>
            </div>
  					<div class="panel-body">
  						<p>Objectively network visionary methodologies via best-of-breed users. Phosfluorescently initiate go forward leadership skills before an expanded array of infomediaries. Monotonectally incubate web-enabled communities rather than process-centric.</p>
  					</div>
  				</div>
  				<!-- END PANEL DEFAULT -->
  			</div>

  			<div class="col-md-12 col-sm-12 mt-0 mb-0" style="border: none">
  				<!-- PANEL DEFAULT -->
  				<div class="panel mt-0 mb-0">
            <div style="padding: 1em 1.7em 0 1.7em;">
              <span class="pull-left"><p class="ls-1 f-16 uppercase black">Mengubah Profil<span class="fa fa-cog"></span></p></span>
              <span class="pull-right"><a type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></a></span>
              <div class="clearfix"></div>
            </div>
  					<div class="panel-body">
  						<p>Objectively network visionary methodologies via best-of-breed users. Phosfluorescently initiate go forward leadership skills before an expanded array of infomediaries. Monotonectally incubate web-enabled communities rather than process-centric.</p>
  					</div>
  				</div>
  				<!-- END PANEL DEFAULT -->
  			</div>

  			<div class="col-md-12 col-sm-12 mt-0 mb-0" style="border: none">
  				<!-- PANEL DEFAULT -->
  				<div class="panel mb-0 mt-0">
            <div style="padding: 1em 1.7em 0 1.7em;">
              <span class="pull-left"><p class="ls-1 f-16 uppercase black">Mendiagnosa <span class="fa fa-random"></span></p></span>
              <span class="pull-right"><a type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></a></span>
              <div class="clearfix"></div>
            </div>
  					<div class="panel-body">
  						<p>Objectively network visionary methodologies via best-of-breed users. Phosfluorescently initiate go forward leadership skills before an expanded array of infomediaries. Monotonectally incubate web-enabled communities rather than process-centric.</p>
  					</div>
  				</div>
  				<!-- END PANEL DEFAULT -->
  			</div>

  		</div>
  		<!-- end row -->

    </div>
  </section>

  <?php $this->load->view('pages/v_footer'); ?>
