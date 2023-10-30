<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Home &mdash; BlogKu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>

      <div class="row">
        <?php if (userLogin()->level_user == 'Administrator') { ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?=site_url('users')?>">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Users</h4>
                </div>
                <div class="card-body">
                  <?= $users ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?=site_url('artikel')?>">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Artikel</h4>
                </div>
                <div class="card-body">
                  <?= $artikel ?>
                </div>
              </div>
            </div>
          </a>
        </div>

        <?php if (userLogin()->level_user == 'Administrator') { ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?=site_url('halaman_baru')?>">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Halaman</h4>
                </div>
                <div class="card-body">
                  <?= $halaman ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?=site_url('agenda')?>">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Agenda</h4>
                </div>
                <div class="card-body">
                  <?= $agenda ?>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      
      <div class="section-body">
      <h2 class="section-title">Tombol Pintas</h2>
            <p class="section-lead">Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda atau pilih tombol pintas pada Control Panel di bawah ini :</p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tombol Pintas</h4>
                  </div>
                  <div class="card-body">
                      <div class="colors">
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('identitas_web')?>">
                            <div><i class="fas fa-th"></i> Identitas</p></div>
                          </a>
                        </div>
                        <?php } ?>
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('menu_web')?>">
                            <div><i class="fas fa-th-large"></i> Menu</div>
                          </a>
                        </div>
                        <?php } ?>
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('halaman_baru')?>">
                            <div><i class="fas fa-file"></i> Halaman</div>
                          </a>
                        </div>
                        <?php } ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('artikel')?>">
                            <div><i class="fas fa-tv"></i> Artikel</div>
                          </a>
                        </div>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('kategori')?>">
                            <div><i class="fas fa-th-list"></i> Kategori</div>
                          </a>
                        </div>
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('tag_artikel')?>">
                            <div><i class="fas fa-tags"></i> Tag Artikel</div>
                          </a>
                        </div>
                        <?php } ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('komentarartikel')?>">
                            <div><i class="fas fa-comments"></i> Komen. Artikel</div>
                          </a>
                        </div>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('sensorkomentar')?>">
                            <div><i class="fas fa-comment-slash"></i> Sensor</div>
                          </a>
                        </div>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('album')?>">
                            <div><i class="far fa-images"></i> Album</div>
                          </a>
                        </div>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('playlist_video')?>">
                            <div><i class="fas fa-film"></i> Playlist</div>
                          </a>
                        </div>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('video')?>">
                            <div><i class="fas fa-file-video"></i> Video</div>
                          </a>
                        </div>
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('tag_video')?>">
                            <div><i class="fas fa-tags"></i> Tag Video</div>
                          </a>
                        </div>
                        <?php } ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('komentarvideo')?>">
                            <div><i class="fas fa-comments"></i> Komen. Video</div>
                          </a>
                        </div>
                        
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('iklan_slide')?>">
                            <div><i class="fas fa-bullhorn"></i> Ads Slide</div>
                          </a>
                        </div>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('iklan_sidebar')?>">
                            <div><i class="fas fa-bullhorn"></i> Ads Sidebar</div>
                          </a>
                        </div>
                        <?php } ?>
                        
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('logo_web')?>">
                            <div><i class="fas fa-bullseye"></i> Logo</div>
                          </a>
                        </div>
                        <?php } ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('agenda')?>">
                            <div><i class="fas fa-circle"></i> Agenda</div>
                          </a>
                        </div>
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('sekilasinfo')?>">
                            <div><i class="fas fa-certificate"></i> Sekilas Info</div>
                          </a>
                        </div>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('download')?>">
                            <div><i class="fas fa-download"></i> Download</div>
                          </a>
                        </div>
                        <?php } ?>
                        <?php if (userLogin()->level_user == 'Administrator') { ?>
                        <div class="color bg-light">
                          <a class="text-dark" href="<?=site_url('users')?>">
                            <div><i class="fas fa-users"></i> Users</div>
                          </a>
                        </div>
                        <?php } ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </section>
<?= $this->endSection() ?>