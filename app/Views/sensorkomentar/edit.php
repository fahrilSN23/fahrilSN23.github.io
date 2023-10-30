<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Sensor Komentar &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('sensorkomentar')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Sensor Komentar</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Sensor Komentar</h4>
          </div>
          <div class="card-body col-md-6">
            <form action="<?=site_url('sensorkomentar/update/'.$sensorkomentar->id_sensorkomentar)?>" method="post" autocomplete="off">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label>Kata Asli *</label>
                <input type="text" name="kata" value="<?=$sensorkomentar->kata?>" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label>Sensor Kata *</label>
                <input type="text" name="ganti" value="<?=$sensorkomentar->ganti?>" class="form-control" required>
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