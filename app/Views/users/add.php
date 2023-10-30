<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Users &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('users')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Users</h1>
      </div>
      
	  <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            <b>Error !</b>
            <?= session()->getFlashdata('error'); ?>
          </div>
        </div>
      <?php endif; ?>
	  
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Users</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('users')?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <?= csrf_field() ?>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="text" name="nama_user" class="form-control" required>
	              </div>
	            </div>
                <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="email" name="email_user" placeholder="Contoh: example@mail.com" class="form-control" required>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
	              <div class="col-sm-12 col-md-7">
	                <input type="password" name="password_user" class="form-control" required>
	              </div>
	            </div>
				<div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Level</label>
	              <div class="col-sm-12 col-md-7">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="level_user" value='Administrator' required>
						<label class="form-check-label">
						Administrator
						</label>
						&nbsp; &nbsp; &nbsp; &nbsp;
						<input class="form-check-input" type="radio" name="level_user" value="Operator" required>
						<label class="form-check-label">
						Operator
						</label>
					</div>
	              </div>
	            </div>
	            <div class="form-group row mb-4">
	              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil</label>
	              <div class="col-sm-12 col-md-7">
					<input type="file" name="foto" tabindex="9" class="form-control">
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