<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Agenda &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('agenda')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Agenda</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Agenda</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('agenda/'.$agenda->id_agenda)?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tema</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="tema" value="<?=$agenda->tema?>" class="form-control" required>
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Agenda</label>
	              <div class="col-sm-12 col-md-7">
	                <textarea class="summernote" name="isi_agenda"><?=$agenda->isi_agenda?></textarea>
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="gambar" class="form-control">
	              </div>
	            </div>
                <?php if ($agenda->gambar != null) { ?>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar saat ini : </label>
                    <div class="col-sm-12 col-md-7">
                        <a href="<?=base_url()?>public/template/assets/img/agenda/<?=$agenda->gambar?>" target="_blank">
                            <img class="mt-2" src="<?=base_url()?>public/template/assets/img/agenda/<?=$agenda->gambar?>" width="70px">
                        </a>
                    </div>
                </div>
                <?php } ?>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="tempat" value="<?=$agenda->tempat?>" class="form-control">
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Mulai s/d Selesai</label>
	              <div class="col-sm-4">
	                <input type="text" name="mulai" value="<?=$mulai?>" class="form-control timepicker mb-4">
	                <input type="text" name="selesai" value="<?=$selesai?>" class="form-control timepicker">
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Mulai s/d Selesai</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="tanggal" value="<?=$tanggal?>" class="form-control daterange-cus">
	              </div>
	            </div>          
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengirim</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="pengirim" value="<?=$agenda->pengirim?>" class="form-control">
	              </div>
	            </div> 
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