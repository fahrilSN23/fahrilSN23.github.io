<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Album &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Album</h1>
        <div class="section-header-button">
          <a href="<?=site_url('album/add')?>" class="btn btn-primary">Tambah</a>
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
            <h4>Album</h4>
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
                    <th>Total Foto</th>
                    <th>Aktif</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $this->db      = \Config\Database::connect();
                  foreach ($album as $key => $value) :
                  $query = $this->db->table('gallery')->getWhere(['id_album' => $value->id_album]);
                  $tot_foto = $query->resultID->num_rows;
                ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                        <a href="<?=base_url()?>public/template/assets/img/album/<?= $value->gbr_album ?>" target="_blank">
                            <img class="mt-2" src="<?=base_url()?>public/template/assets/img/album/<?= $value->gbr_album ?>" width="65px">
                        </a>
                    </td>
                    <td><?= $value->jdl_album ?></td>
                    <td><a href="<?=site_url('listalbum/detail/'.$value->album_seo)?>">listalbum/detail/<?= $value->album_seo ?></a></td>
                    <td><?=$tot_foto?></td>
                    <td><?= $value->aktif == 'Y' ? 'Aktif' : 'Tidak Aktif' ?></td>
                    <td>
                    	<a href="<?=site_url('album/detail/'.$value->id_album)?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                    	<a href="<?=site_url('album/edit/'.$value->id_album)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
	                    <a href="<?=site_url('album/delete/'.$value->id_album)?>" class="btn btn-danger btn-sm swal-6"><i class="fas fa-trash"></i></a>
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