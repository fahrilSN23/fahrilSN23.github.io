<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Komentar &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('komentarvideo')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Komentar</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Komentar</h4>
          </div>
          <div class="card-body col-md-12">
            <form action="<?=site_url('komentarvideo/update/'.$komentarvideo->id_komentar)?>" method="post" autocomplete="off">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label>Nama Komentar *</label>
                <input type="text" name="nama_komentar" value="<?=$komentarvideo->nama_komentar?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" value="<?=$komentarvideo->email?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Isi Komentar *</label>
                <textarea name="isi_komentar" style="height: 100px;" class="form-control" required><?=$komentarvideo->isi_komentar?></textarea>
              </div>
              <div class="form-group">
                <label>Aktif *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="aktif" value='Y' <?=$komentarvideo->aktif == 'Y' ? 'checked' : null?>>
                    <label class="form-check-label">
                    Aktif
                    </label>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <input class="form-check-input" type="radio" name="aktif" value="N" <?=$komentarvideo->aktif == 'N' ? 'checked' : null?>>
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