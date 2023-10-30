<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Identitas &mdash; Blog</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Edit Identitas</h1>
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
            <h4>Edit Identitas</h4>
          </div>
          <div class="card-body">
            <form action="<?=site_url('identitas_web/'.$identitas->id_identitas)?>" method="post" enctype="multipart/form-data" class="d-inline">
            <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>Nama Website *</label>
                            <input type="text" name="nama_website" value="<?=$identitas->nama_website?>" tabindex="1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook" value="<?=$identitas->facebook?>" tabindex="3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Youtube</label>
                            <input type="text" name="youtube" value="<?=$identitas->youtube?>" tabindex="5" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Meta Deskripsi</label>
                            <input type="text" name="meta_deskripsi" value="<?=$identitas->meta_deskripsi?>" tabindex="7" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Favicon</label>
                            <input type="file" name="favicon" tabindex="9" class="form-control">
                            <label>Favivon saat ini : </label>
                            <img class="mt-2" src="<?=base_url()?>public/template/assets/img/favicon/<?=$identitas->favicon?>" width="70px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" value="<?=$identitas->email?>" tabindex="2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" name="instagram" value="<?=$identitas->instagram?>" tabindex="4" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No Telp *</label>
                            <input type="text" name="no_telp" value="<?=$identitas->no_telp?>" tabindex="6" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" name="meta_keyword" value="<?=$identitas->meta_keyword?>" tabindex="8" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Google Maps</label>
                            <textarea name="maps" style="height: 150px;" tabindex="10" class="form-control"><?=$identitas->maps?></textarea>
                        </div>
                    </div>
                </div>
                <div>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>