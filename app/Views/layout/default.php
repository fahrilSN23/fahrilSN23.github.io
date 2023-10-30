<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <?= $this->renderSection('title') ?>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>/public/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/public/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>/public/template/node_modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>/public/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/public/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>public/template/node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?=base_url()?>public/template/node_modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>public/template/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/public/template/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/public/template/assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <?php
        $this->db      = \Config\Database::connect();
        if (userLogin()->level_user == 'Administrator') {
          $komen_art = $this->db->table('komentarartikel')->getWhere(['dibaca' => 'N']);
          $komen_vid = $this->db->table('komentarvideo')->getWhere(['dibaca' => 'N']);
        }else{
          $artikel = $this->db->table('artikel')->getWhere(['email' => userLogin()->email_user])->getRow();
          $komen_art = $this->db->table('komentarartikel')->getWhere(['id_berita' => $artikel->id_artikel, 'dibaca' => 'N']);
          $komen_vid = $this->db->table('komentarvideo')->join('video','id_video')->getWhere(['video.email' => userLogin()->email_user, 'dibaca' => 'N']);
        }
        $tot_kart = $komen_art->resultID->num_rows;
        $tot_kvid = $komen_vid->resultID->num_rows
        ?>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?= $tot_kart > 0 || $tot_kvid > 0 ? 'beep' : null?>"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications</div>

              <?php if ($tot_kart > 0 || $tot_kvid > 0) { ?>
                <div class="dropdown-list-content dropdown-list-icons">
                  <?php foreach ($komen_art->getResult() as $key => $value) :
                  $artikel = $this->db->table('artikel')->getWhere(['id_artikel' => $value->id_berita])->getRow();
                  $waktukirim = cek_terakhir($value->tgl.' '.$value->jam_komentar);  
                  ?>
                  <a href="<?=site_url('komentarartikel/edit/'.$value->id_komentar)?>" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="fas fa-tv"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b><?=$value->nama_komentar?></b> memberikan komentar pada Artikel <b><?=$artikel->judul?></b>
                      <div class="time"><?=$waktukirim?> yang lalu</div>
                    </div>
                  </a>
                  <?php endforeach;
                  foreach ($komen_vid->getResult() as $key => $value) :
                    $video = $this->db->table('video')->getWhere(['id_video' => $value->id_video])->getRow();
                    $waktukirim = cek_terakhir($value->tgl.' '.$value->jam_komentar);  
                  ?>
                  <a href="<?=site_url('komentarvideo/edit/'.$value->id_komentar)?>" class="dropdown-item">
                    <div class="dropdown-item-icon bg-success text-white">
                      <i class="fas fa-file-video"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b><?=$value->nama_komentar?></b> memberikan komentar pada Video <b><?=$video->jdl_video?></b>
                      <div class="time"><?=$waktukirim?> yang lalu</div>
                    </div>
                  </a>
                  <?php endforeach; ?>
                </div>
              <?php } else { ?>
                <div>
                  <div class="dropdown-item dropdown-item-desc text-center">
                    Semua komentar sudah dibaca
                  </div>
                </div>
              <?php } ?>
              
              <div class="dropdown-footer text-center">
                <a href="<?=site_url('komentarartikel')?>">Lihat Komen. Artikel <i class="fas fa-chevron-right"></i></a>
                <a href="<?=site_url('komentarvideo')?>">Lihat Komen. Video <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url()?>/public/template/assets/img/avatar/<?=userLogin()->foto?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?=userLogin()->nama_user?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?=site_url('users/edit/'.userLogin()->id_user.'/'.userLogin()->level_user)?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <?php if (userLogin()->level_user == 'Administrator') { ?>
              <a href="<?=site_url('identitas_web')?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <a href="<?=site_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="<?=site_url('home')?>">BlogKu</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="<?=site_url('home')?>">bk</a>
            </div>
            <ul class="sidebar-menu">
              <?= $this->include('layout/menu'); ?>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <?= $this->renderSection('content') ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="https://antcode.tech/">AntCode.tech</a>
        </div>
        <div class="footer-right">
          v1.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?=base_url()?>/public/template/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/moment/min/moment.min.js"></script>
  <script src="<?=base_url()?>/public/template/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?=base_url()?>/public/template/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?=base_url()?>public/template/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="<?=base_url()?>public/template/node_modules/select2/dist/js/select2.min.js"></script>
  <script src="<?=base_url()?>/public/template/node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>

  <!-- Template JS File -->
  <script src="<?=base_url()?>/public/template/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>/public/template/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?=base_url()?>/public/template/assets/js/page/modules-sweetalert.js"></script>
  <script src="<?=base_url()?>/public/template/assets/js/page/modules-datatables.js"></script>
  <script src="<?=base_url()?>/public/template/assets/js/page/forms-advanced-forms.js"></script>
</body>
</html>
