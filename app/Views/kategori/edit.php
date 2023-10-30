<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Kategori &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('kategori')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Kategori</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Kategori</h4>
          </div>
          <div class="card-body col-md-6">
            <form action="<?=site_url('kategori/'.$kategori->id_kategori)?>" method="post" autocomplete="off">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label>Nama Kategori *</label>
                <input type="text" name="name_kategori" value="<?=$kategori->name_kategori?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Aktif *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="aktif" value='Y' <?=$kategori->aktif == 'Y' ? 'checked' : null?>>
                    <label class="form-check-label">
                    Aktif
                    </label>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <input class="form-check-input" type="radio" name="aktif" value="N" <?=$kategori->aktif == 'N' ? 'checked' : null?>>
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