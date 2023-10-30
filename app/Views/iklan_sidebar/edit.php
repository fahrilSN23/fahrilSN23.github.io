<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Iklan Sidebar &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('iklan_sidebar')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Iklan Sidebar</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Iklan Sidebar</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('iklan_sidebar/update/'.$iklan_sidebar->id_iklan)?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
				<input type="hidden" name="_method" value="PUT">
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="judul" value="<?=$iklan_sidebar->judul?>" class="form-control" required>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">URL</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="url" value="<?=$iklan_sidebar->url?>" placeholder="www.example.com" class="form-control" required>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="gambar" tabindex="9" class="form-control">
	              </div>
	            </div>
                <?php if ($iklan_sidebar->gambar != null) { ?>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar saat ini : </label>
                    <div class="col-sm-12 col-md-7">
                        <a href="<?=base_url()?>public/template/assets/img/iklan_sidebar/<?=$iklan_sidebar->gambar?>" target="_blank">
                            <img class="mt-2" src="<?=base_url()?>public/template/assets/img/iklan_sidebar/<?=$iklan_sidebar->gambar?>" width="70px">
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