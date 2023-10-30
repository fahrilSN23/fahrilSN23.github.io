<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Halaman &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('halaman_baru')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Halaman</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Buat Halaman</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('halaman_baru/'.$halaman->id_halaman)?>"  method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
	            <input type="hidden" name="_method" value="PUT">
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="judul" value="<?=$halaman->judul?>" class="form-control" required>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Halaman</label>
	              <div class="col-sm-12 col-md-7">
	                <textarea class="summernote" name="isi_halaman"><?=$halaman->isi_halaman?></textarea>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="gambar" tabindex="9" class="form-control">
	              </div>
	            </div>
              <?php if ($halaman->gambar != null) { ?>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar saat ini : </label>
                  <div class="col-sm-12 col-md-7">
	                  <a href="<?=base_url()?>public/template/assets/img/halaman/<?=$halaman->gambar?>" target="_blank">
	                  	<img class="mt-2" src="<?=base_url()?>public/template/assets/img/halaman/<?=$halaman->gambar?>" width="70px">
	                  </a>
	              </div>
              </div>
              <?php } ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
	              <div class="col-sm-12 col-md-7">
	                <button class="btn btn-primary">Update Post</button>
	              </div>
	            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>