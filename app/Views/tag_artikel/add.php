<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Tag Artikel &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('tag_artikel')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Tag Artikel</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Buat Tag Artikel</h4>
          </div>
          <div class="card-body col-md-6">
            <form action="<?=site_url('tag_artikel/save')?>" method="post" autocomplete="off">
              <?= csrf_field() ?>
              <div class="form-group">
                <label>Nama Tag Artikel *</label>
                <input type="text" name="nama_tag" class="form-control" required autofocus>
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