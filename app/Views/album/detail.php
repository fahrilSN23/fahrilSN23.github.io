<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Detail Album &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url('album')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Album</h1>
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
            <h4>Buat Album</h4>
          </div>
          <div class="card-body col-md-12">
            <table class="table table-striped">
                <tr>
                    <!-- Bagian 1 -->
                    <th>Judul Album</th>
                    <th>:</th>
                    <td><a href="<?=site_url('album/detail/'.$album->album_seo)?>">album/detail/<?= $album->album_seo ?></a></td>
                    <!-- Bagian 2 -->
                    <th>Album Seo</th>
                    <th>:</th>
                    <td><?= $album->album_seo ?></td>
                </tr>
                <tr>
                    <!-- Bagian 1 -->
                    <th>Aktif</th>
                    <th>:</th>
                    <td><?= $album->aktif == 'Y' ? 'Aktif' : 'Tidak Aktif' ?></td>
                    <!-- Bagian 2 -->
                    <th>Tanggal Posting</th>
                    <th>:</th>
                    <td><?= $album->hari . ', ' . format_tgl($album->tgl_posting) ?></td>
                </tr>
                <tr>
                    <!-- Bagian 1 -->
                    <th>Jam</th>
                    <th>:</th>
                    <td><?= $album->jam ?></td>
                    <!-- Bagian 2 -->
                    <th>Email yang memposting</th>
                    <th>:</th>
                    <td><?= $album->email ?></td>
                </tr>
                <tr>
                    <!-- Bagian 1 -->
                    <th>Cover Album</th>
                    <th>:</th>
                    <td>
                      <a href="<?=base_url()?>public/template/assets/img/album/<?=$album->gbr_album?>" target="_blank">
	                  	<img class="mt-2" src="<?=base_url()?>public/template/assets/img/album/<?=$album->gbr_album?>" width="70px">
                      </a>
                    </td>
                    <!-- Bagian 2 -->
                    <th>Keterangan</th>
                    <th>:</th>
                    <td><?= $album->keterangan ?></td>
                </tr>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
              <div class="card">
              <div class="card-header">
                  <h4>Form Gallery</h4>
              </div>
              
              <div class="card-body">
              <?php
                  if ($uri->getSegment(4) == null) {
                      echo $this->include('album/galery/add');
                  } else {
                      echo $this->include('album/galery/edit');
                  } ?>
              </div>
              </div>
          </div>

          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                  <h4>Gallery</h4>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Foto</th>
                      <th>Judul</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; foreach ($gallery as $key => $value) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                          <a href="<?=base_url()?>public/template/assets/img/gallery/<?= $value->gbr_gallery ?>" target="_blank">
                              <img class="mt-2" src="<?=base_url()?>public/template/assets/img/gallery/<?= $value->gbr_gallery ?>" width="65px">
                          </a>
                      </td>
                      <td><?= $value->jdl_gallery ?></td>
                      <td class="text-center" width="15%">
                        <a href="<?=site_url('album/detail/'.$value->id_album.'/'.$value->id_gallery)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?=site_url('album/delete_gallery/'.$value->id_album.'/'.$value->id_gallery)?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>