<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Halaman Baru &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Halaman Baru</h1>
        <div class="section-header-button">
          <a href="<?=site_url('halaman_baru/add')?>" class="btn btn-primary">Tambah</a>
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
            <h4>Halaman</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th>Judul</th>
                    <th>Link</th>
                    <th>Tanggal Posting</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($halaman as $key => $value) : ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value->judul ?></td>
                    <td><a href="<?=site_url('page/detail/'.$value->judul_seo)?>">page/detail/<?= $value->judul_seo ?></a></td>
                    <td><?= format_tgl($value->tgl_posting) ?></td>
                    <td>
                    	<a href="<?=site_url('halaman_baru/edit/'.$value->id_halaman)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
	                    <a href="<?=site_url('halaman_baru/hapus/'.$value->id_halaman)?>" class="btn btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></a>
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