<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Artikel &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Artikel</h1>
        <div class="section-header-button">
          <a href="<?=site_url('artikel/add')?>" class="btn btn-primary">Tambah</a>
        </div>
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
            <h4>Artikel</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped table-md" id="table-1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Judul Artikel</th>
                  <th>Hari, Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($artikel as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $value->judul ?></td>
                  <td><?= $value->hari . ', ' . format_tgl($value->tanggal) ?></td>
                  <td><?= $value->status == 'Y' ? 'Aktif' : 'Non - Aktif' ?></td>
                  <td class="text-center" style="width: 15%;">
                  <?php if ($value->status == 'Y') { ?>
                    <a href="<?=site_url('artikel/status/'.$value->id_artikel.'/N')?>" class="btn btn-danger btn-sm" title="Non-aktifkan"><i class="fas fa-eye-slash"></i></a>
                  <?php } else { ?>
                    <a href="<?=site_url('artikel/status/'.$value->id_artikel.'/Y')?>" class="btn btn-info btn-sm" title="Aktifkan"><i class="fas fa-eye"></i></a>
                  <?php } ?>
                  
                    <a href="<?=site_url('artikel/edit/'.$value->id_artikel)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?=site_url('artikel/hapus/'.$value->id_artikel)?>" class="btn btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>