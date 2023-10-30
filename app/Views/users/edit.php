<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Users &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('users')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Users</h1>
      </div>

	  <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            <b>Success !</b>
            <?= session()->getFlashdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Users</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('users/'.$users->id_user)?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="nama_user" value="<?=$users->nama_user?>" class="form-control" required>
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="email" name="email_user" value="<?=$users->email_user?>" placeholder="Contoh: example@mail.com" class="form-control" readonly>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="password" name="password_user" class="form-control">
	              </div>
	            </div>
				<?php if (userLogin()->level_user == 'Administrator') {?>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Level</label>
	              <div class="col-sm-12 col-md-7">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="level_user" value='Administrator' <?=$users->level_user == 'Administrator' ? 'checked' : null?>>
						<label class="form-check-label">
						Administrator
						</label>
						&nbsp; &nbsp; &nbsp; &nbsp;
						<input class="form-check-input" type="radio" name="level_user" value="Operator" <?=$users->level_user == 'Operator' ? 'checked' : null?>>
						<label class="form-check-label">
						Operator
						</label>
					</div>
	              </div>
	            </div>
				<?php } ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="foto" tabindex="9" class="form-control">
	              </div>
	            </div>
                <?php if ($users->foto != null) { ?>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto saat ini : </label>
                    <div class="col-sm-12 col-md-7">
                        <a href="<?=base_url()?>public/template/assets/img/avatar/<?=$users->foto?>" target="_blank">
                            <img class="mt-2" src="<?=base_url()?>public/template/assets/img/avatar/<?=$users->foto?>" width="70px">
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