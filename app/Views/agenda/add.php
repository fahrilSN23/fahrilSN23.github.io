<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Agenda &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('agenda')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Agenda</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Agenda</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('agenda')?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tema</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="tema" class="form-control" required>
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Agenda</label>
	              <div class="col-sm-12 col-md-7">
	                <textarea class="summernote" name="isi_agenda"></textarea>
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="gambar" class="form-control">
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="tempat" class="form-control">
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Mulai s/d Selesai</label>
	              <div class="col-sm-4">
	                <input type="text" name="mulai" class="form-control timepicker mb-4">
	                <input type="text" name="selesai" class="form-control timepicker">
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Mulai s/d Selesai</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="tanggal" class="form-control daterange-cus">
	              </div>
	            </div>          
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengirim</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="pengirim" class="form-control">
	              </div>
	            </div> 
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
	              <div class="col-sm-12 col-md-7">
	                <button class="btn btn-primary">Create Post</button>
	              </div>
	            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>