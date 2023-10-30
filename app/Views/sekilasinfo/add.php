<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Sekilas Info &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('sekilasinfo')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Sekilas Info</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Sekilas Info</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('sekilasinfo/save')?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tulis Info</label>
	              <div class="col-sm-12 col-md-7">
	                <textarea class="summernote" name="info"></textarea>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="gambar" tabindex="9" class="form-control">
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
	              <div class="col-sm-12 col-md-7">
	                <button class="btn btn-primary">Create</button>
	              </div>
	            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>