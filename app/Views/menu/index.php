<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Manajemen Menu &mdash; Blog</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Manajemen Menu</h1>
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
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                <div class="card-header">
                    <h4>Form Menu</h4>
                </div>
                
                <div class="card-body">
                <?php
                    if ($uri->getSegment(2) == null) {
                        echo $this->include('menu/add');
                    } else {
                        echo $this->include('menu/edit'); 
                    } ?>
                </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                <div class="card-header">
                    <h4>Daftar Menu</h4>
                </div>
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                    <?php foreach ($menu_utama as $m) { ?>
                      <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> <?=$m->nama_menu ?></a></li>
                        <li class="breadcrumb-item"><a href="<?=site_url('menu_web/'.$m->id_menu)?>"><i class="fas fa-pencil-alt"></i> Edit</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                          <?php if ($m->aktif == 'Ya') { ?>
                            <a href="<?=site_url('menu_web/aktif/'.$m->id_menu)?>"><i class="fas fa-eye-slash"></i> Non-Aktifkan</a>
                          <?php } else { ?>
                            <a href="<?=site_url('menu_web/aktif/'.$m->id_menu)?>"><i class="fas fa-eye"></i> Aktifkan</a>
                          <?php } ?>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="<?=site_url('menu_web/hapus/'.$m->id_menu)?>" class="swal-6"><i class="fas fa-trash"></i> Hapus</a>
                        </li>
                      </ol>
                      <?php
                      $this->db      = \Config\Database::connect();
                      $sub_menu = $this->db->table('menu')->orderBy('urutan', 'ASC')->getWhere(['id_parent' => $m->id_menu])->getResult();
                      foreach ($sub_menu as $sm) { ?>
                        <ol class="breadcrumb bg-success text-white-all" style="margin-left: 30px;">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> <?=$sm->nama_menu ?></a></li>
                            <li class="breadcrumb-item"><a href="<?=site_url('menu_web/'.$sm->id_menu)?>"><i class="fas fa-pencil-alt"></i> Edit</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                              <?php if ($sm->aktif == 'Ya') { ?>
                                <a href="<?=site_url('menu_web/aktif/'.$sm->id_menu)?>"><i class="fas fa-eye-slash"></i> Non-Aktifkan</a>
                              <?php } else { ?>
                                <a href="<?=site_url('menu_web/aktif/'.$sm->id_menu)?>"><i class="fas fa-eye"></i> Aktifkan</a>
                              <?php } ?>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                              <a href="<?=site_url('menu_web/hapus/'.$sm->id_menu)?>" class="swal-6"><i class="fas fa-trash"></i> Hapus</a>
                            </li>
                        </ol>
                      <?php } ?>
                    <?php } ?>
                    </nav>
                </div>
                </div>
            </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>