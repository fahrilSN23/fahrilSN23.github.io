<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Video &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('video')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Video</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Video</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('video/'.$video->id_video)?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Video</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="jdl_video" value="<?=$video->jdl_video?>" class="form-control" required>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Playlist</label>
	              <div class="col-sm-12 col-md-7">
					<select name="id_playlist" class="form-control select2" required>
						<option value="">- PILIH PLAYLIST -</option>
						<?php foreach ($playlist as $p) : ?>
						<option value="<?=$p->id_playlist?>" <?= $video->id_playlist == $p->id_playlist ? "selected" : null ?>><?=$p->jdl_playlist?></option>";
						<?php endforeach ?>
					</select>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
	              <div class="col-sm-12 col-md-7">
	                <textarea class="summernote" name="keterangan"><?=$video->keterangan?></textarea>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="gbr_video" tabindex="9" class="form-control">
	              </div>
	            </div>
                <?php if ($video->gbr_video != null) { ?>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail saat ini : </label>
                    <div class="col-sm-12 col-md-7">
                        <a href="<?=base_url()?>public/template/assets/img/video/<?=$video->gbr_video?>" target="_blank">
                            <img class="mt-2" src="<?=base_url()?>public/template/assets/img/video/<?=$video->gbr_video?>" width="70px">
                        </a>
                    </div>
                </div>
                <?php } ?>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Youtube</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="youtube" value="<?=$video->youtube?>" placeholder="Contoh: http://www.youtube.com/embed/xbuEMASJA" class="form-control">
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tag</label>
	              <div class="col-sm-12 col-md-7">
					<select name="tag[]" class="form-control select2" multiple="">
						<?php foreach ($tag_video as $tag) : ?>
						<option value="<?=$tag->tag_seo?>"><?=$tag->nama_tag?></option>
						<?php endforeach; ?>
					</select>
	              </div>
	            </div>
                <?php if ($video->tag != null) { ?>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tag saat ini : </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" name="current_tag" value="<?=$video->tag?>" class="form-control" readonly>
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