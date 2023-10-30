<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Kategori &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('kategori')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Kategori</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Buat Kategori</h4>
          </div>
          <div class="card-body col-md-6">
            <form action="<?=site_url('kategori')?>" method="post" autocomplete="off">
              <?= csrf_field() ?>
              <div class="form-group">
                <label>Nama Kategori *</label>
                <input type="text" name="name_kategori" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label>Aktif *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="aktif" value='Y' checked>
                    <label class="form-check-label">
                    Aktif
                    </label>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <input class="form-check-input" type="radio" name="aktif" value="N">
                    <label class="form-check-label">
                    Tidak Aktif
                    </label>
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