<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Logo &mdash; Blog</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Edit Logo</h1>
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
            <h4>Edit Logo</h4>
          </div>
          <div class="card-body row">
            <div class="col-md-6">
              <form action="<?=site_url('logo/'.$logo->id_logo)?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label>Nama Logo *</label>
                  <input type="file" name="name" class="form-control" required>
                </div>
                <div>
                  <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <label>Logo Terpasang</label>
              <a href="<?=base_url()?>public/template/assets/img/logo/<?=$logo->name?>" target="_blank">
                <div>
                  <img src="<?=base_url()?>public/template/assets/img/logo/<?=$logo->name?>" height="50%" width = "50%">
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>