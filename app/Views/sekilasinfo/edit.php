<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Sekilas Info &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('sekilasinfo')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Sekilas Info</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Sekilas Info</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('sekilasinfo/update/'.$sekilasinfo->id_sekilasinfo)?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tulis Info</label>
	              <div class="col-sm-12 col-md-7">
	                <textarea class="summernote" name="info"><?=$sekilasinfo->info?></textarea>
	              </div>
	            </div>
              <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
	              <div class="col-sm-12 col-md-7">
                <input type="file" name="gambar" tabindex="9" class="form-control">
	              </div>
	            </div>
              <?php if ($sekilasinfo->gambar != null) { ?>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto saat ini : </label>
                  <div class="col-sm-12 col-md-7">
	                  <a href="<?=base_url()?>public/template/assets/img/sekilasinfo/<?=$sekilasinfo->gambar?>" target="_blank">
	                  	<img class="mt-2" src="<?=base_url()?>public/template/assets/img/sekilasinfo/<?=$sekilasinfo->gambar?>" width="70px">
	                  </a>
	              </div>
              </div>
              <?php } ?>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Aktif *</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="aktif" value='Y' <?=$sekilasinfo->aktif == 'Y' ? 'checked' : null?>>
                  <label class="form-check-label">
                  Aktif
                  </label>
                  &nbsp; &nbsp; &nbsp; &nbsp;
                  <input class="form-check-input" type="radio" name="aktif" value="N" <?=$sekilasinfo->aktif == 'N' ? 'checked' : null?>>
                  <label class="form-check-label">
                  Tidak Aktif
                  </label>
                </div>
              </div>
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