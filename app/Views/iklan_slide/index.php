<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Iklan Slide &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Iklan Slide</h1>
        <div class="section-header-button">
          <a href="<?=site_url('iklan_slide/add')?>" class="btn btn-primary">Tambah</a>
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
            <h4>Iklan Slide</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Link</th>
                    <th>Tanggal Posting</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($iklan_slide as $key => $value) :
                ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                        <a href="<?=base_url()?>public/template/assets/img/iklan_slide/<?= $value->gambar ?>" target="_blank">
                            <img class="mt-2" src="<?=base_url()?>public/template/assets/img/iklan_slide/<?= $value->gambar ?>" width="65px">
                        </a>
                    </td>
                    <td><?= $value->judul ?></td>
                    <td><a href="<?=$value->url?>" target="_blank"><?= $value->url ?></a></td>
                    <td><?= format_tgl($value->tgl_posting) ?></td>
                    <td class="text-center" style="width: 15%;">
                    	<a href="<?=site_url('iklan_slide/edit/'.$value->id_iklan)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
	                    <a href="<?=site_url('iklan_slide/delete/'.$value->id_iklan)?>" class="btn btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></a>
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