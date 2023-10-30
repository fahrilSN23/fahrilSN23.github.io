<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Artikel &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('artikel')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Artikel</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Artikel</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('artikel')?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="judul" class="form-control" required>
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Youtube</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="youtube" placeholder="Contoh: http://www.youtube.com/embed/xbuEMASJA" class="form-control">
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Kategori</label>
	              <div class="col-sm-12 col-md-7">
					<select name="id_kategori" class="form-control select2">
						<option value="">- PILIH KATEGORI -</option>
						<?php foreach ($kategori as $k) {
						echo "<option value='$k->id_kategori'>$k->name_kategori</option>";
						} ?>
					</select>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Headline</label>
	              <div class="col-sm-12 col-md-7">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="headline" value='Y' checked>
						<label class="form-check-label">
						Ya
						</label>
						&nbsp; &nbsp; &nbsp; &nbsp;
						<input class="form-check-input" type="radio" name="headline" value="N">
						<label class="form-check-label">
						Tidak
						</label>
					</div>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Artikel</label>
	              <div class="col-sm-12 col-md-7">
	                <textarea class="summernote" name="isi_artikel"></textarea>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="gambar" tabindex="9" class="form-control">
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ket. Gambar</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="keterangan_gambar" class="form-control">
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tag</label>
	              <div class="col-sm-12 col-md-7">
					<select name="tag[]" class="form-control select2" multiple="">
						<?php foreach ($tag_artikel as $tag) : ?>
						<option value="<?=$tag->tag_seo?>"><?=$tag->nama_tag?></option>
						<?php endforeach; ?>
					</select>
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