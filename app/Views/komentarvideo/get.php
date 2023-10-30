<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Komentar Video &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Komentar Video</h1>
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
            <h4>Komentar Video</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped table-md" id="table-1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Komentar</th>
                  <th>Isi Komentar</th>
                  <th>Aktif</th>
                  <th>Dibaca</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($komentarvideo as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $value->nama_komentar ?></td>
                  <td><?= $value->isi_komentar ?></td>
                  <td><?= $value->aktif == 'Y' ? 'Aktif' : 'Tidak Aktif' ?></td>
                  <td><?= $value->dibaca == 'Y' ? 'Ya' : '<span class="badge badge-primary">Belum dibaca</span>' ?></td>
                  <td class="text-center" style="width: 15%;">
                    <a href="<?=site_url('komentarvideo/edit/'.$value->id_komentar)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?=site_url('komentarvideo/hapus/'.$value->id_komentar)?>" class="btn btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></a>
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