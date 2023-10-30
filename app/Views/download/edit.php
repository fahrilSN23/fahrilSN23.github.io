<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Download &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('download')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Download</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Download</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('download/update/'.$download->id_download)?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
	            <input type="hidden" name="_method" value="PUT">
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="judul" value="<?=$download->judul?>" class="form-control" required>
	              </div>
	            </div>
              <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
	              <div class="col-sm-12 col-md-7">
                  <input type="file" name="nama_file" tabindex="9" class="form-control">
	              </div>
	            </div>
              <?php if ($download->nama_file != null) { ?>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File saat ini : </label>
                  <div class="col-sm-12 col-md-7">
	                  <a href="<?=base_url()?>public/template/assets/img/download/<?=$download->nama_file?>" target="_blank">
	                  	<?=$download->nama_file?>
	                  </a>
	              </div>
              </div>
              <?php } ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
	              <div class="col-sm-12 col-md-7">
	                <button class="btn btn-primary">Update</button>
	              </div>
	            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>