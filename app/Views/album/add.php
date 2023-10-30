<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Album &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('album')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Album</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Album</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('album/save')?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="jdl_album" class="form-control" required>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
	              <div class="col-sm-12 col-md-7">
	                <textarea class="summernote" name="keterangan"></textarea>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="gbr_album" tabindex="9" class="form-control">
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