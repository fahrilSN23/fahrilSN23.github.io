<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Users &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-button">
          <a href="<?=site_url('users/add')?>" class="btn btn-primary">Tambah</a>
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
            <h4>Users</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped table-md" id="table-1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td>
                    <a href="<?=base_url()?>public/template/assets/img/avatar/<?= $value->foto ?>" target="_blank">
                        <img class="rounded-circle" src="<?=base_url()?>public/template/assets/img/avatar/<?= $value->foto ?>" width="30px">
                    </a>  
                  </td>
                  <td><?= $value->nama_user ?></td>
                  <td><?= $value->email_user ?></td>
                  <td><?= $value->level_user ?></td>
                  <td class="text-center" style="width: 15%;">
                    <a href="<?=site_url('users/edit/'.$value->id_user)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?=site_url('users/hapus/'.$value->id_user)?>" class="btn btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></a>
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