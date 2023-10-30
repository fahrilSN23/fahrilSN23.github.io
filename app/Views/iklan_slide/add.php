<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Iklan Slide &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('iklan_slide')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Iklan Slide</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Iklan Slide</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('iklan_slide/save')?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="judul" class="form-control" required>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">URL</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="url" placeholder="www.example.com" class="form-control" required>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
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