<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Tag Video &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('tag_video')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Tag Video</h1>
      </div>
      
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Edit Tag Video</h4>
          </div>
          <div class="card-body col-md-6">
            <form action="<?=site_url('tag_video/update/'.$tag_video->id_tag_video)?>" method="post" autocomplete="off">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label>Nama Tag Video *</label>
                <input type="text" name="nama_tag" value="<?=$tag_video->nama_tag?>" class="form-control" required autofocus>
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