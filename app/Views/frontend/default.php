<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?= $this->renderSection('title') ?>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?=base_url()?>/public/template/assets/img/favicon/<?=$identitas->favicon?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">   

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=base_url()?>/public/template_frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url()?>/public/template_frontend/css/style.css" rel="stylesheet">
    <style>
        div .blokade p {
            word-break: break-all;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-md-12 text-right d-none d-md-block">
                <?=hari_ini(date('w'))?>, <?=format_tgl(date('Y-m-d H:i:s'))?>, <span id="jam" onload="showTime()"></span>
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="<?=site_url()?>" class="navbar-brand d-none d-lg-block">
                    <img src="<?=base_url()?>/public/template/assets/img/logo/<?=$logo->name?>" alt="">
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <img src="<?=base_url()?>/public/template/assets/img/logo/<?=$logo->name?>" alt="">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <?php
                    $segment = uri_string();
                    // echo $segment;
                    $this->db = \Config\Database::connect();
                    foreach ($menu as $m) {
                    $sub_menu = $this->db->table('menu')->getWhere(['id_parent' => $m->id_menu, 'aktif' => 'Ya']);
                        if ($sub_menu->resultID->num_rows > 0) {
                        $query = $sub_menu->getResult();  
                        ?>
                        <div class="nav-item dropdown">
                            <a href="<?=site_url($m->link)?>" class="nav-link <?=$m->link == getLink($segment)? 'active' : null?> dropdown-toggle" data-toggle="dropdown"><?=$m->nama_menu?></a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <?php foreach ($query as $sm) { ?>
                                    <a href="<?=site_url($sm->link)?>" class="dropdown-item"><?=$sm->nama_menu?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } else { ?>
                        <a href="<?=site_url($m->link)?>" class="nav-item nav-link <?=$m->link == $segment ? 'active' : null?>"><?=$m->nama_menu?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
                <form action="<?=site_url('beranda/search')?>" method="get" autocomplete="off">
                    <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                        <input type="text" name="search" class="form-control" placeholder="Keyword">
                        <div class="input-group-append">
                            <button class="input-group-text text-secondary"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <?= $this->renderSection('content') ?>

    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="<?=site_url()?>" class="navbar-brand">
                    <img src="<?=base_url()?>/public/template/assets/img/logo/<?=$logo->name?>" alt="">
                </a>
                <p><?=$identitas->meta_deskripsi?></p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://mail.google.com/mail/<?=$identitas->email?>" target="_blank"><i class="fas fa-envelope-square"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="<?=$identitas->facebook?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://www.instagram.com/<?=$identitas->instagram?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="<?=$identitas->youtube?>" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Kategori Artikel</h4>
                <div class="d-flex flex-wrap mb-4">
                    <?php foreach ($kategori as $k) { ?>
                    <a href="<?=site_url('kategoriartikel/detail/'.$k->slug_kategori)?>" class="btn btn-sm btn-outline-secondary m-1"><?=$k->name_kategori?></a>
                    <?php } ?>
                </div>
                <h4 class="font-weight-bold mb-4">Playlist Video</h4>
                <div class="d-flex flex-wrap m-n1">
                    <?php foreach ($playlist as $p) { ?>
                    <a href="<?=site_url('listvideo/detail/'.$p->playlist_seo)?>" class="btn btn-sm btn-outline-secondary m-1"><?=$p->jdl_playlist?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Tags Artikel</h4>
                <div class="d-flex flex-wrap mb-4">
                    <?php foreach ($tag_artikel as $tart) { ?>
                    <a href="<?=site_url('listartikel/tag/'.$tart->tag_seo)?>" class="btn btn-sm btn-outline-secondary m-1"><?=$tart->nama_tag?></a>
                    <?php } ?>
                </div>
                <h4 class="font-weight-bold mb-4">Tags Video</h4>
                <div class="d-flex flex-wrap m-n1">
                    <?php foreach ($tag_video as $tvid) { ?>
                    <a href="<?=site_url('listvideo/tag/'.$tvid->tag_seo)?>" class="btn btn-sm btn-outline-secondary m-1"><?=$tvid->nama_tag?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <?php foreach ($menu as $ql) { ?>
                    <a class="text-secondary mb-2" href="<?=site_url($ql->link)?>"><i class="fa fa-angle-right text-dark mr-2"></i><?=$ql->nama_menu?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold" href=""><?=$identitas->nama_website?></a>. All Rights Reserved. Developed by <a class="font-weight-bold" href="">AntCode.tech</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/public/template_frontend/lib/easing/easing.min.js"></script>
    <script src="<?=base_url()?>/public/template_frontend/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?=base_url()?>/public/template_frontend/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?=base_url()?>/public/template_frontend/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?=base_url()?>/public/template_frontend/js/main.js"></script>
    <script>
        function showTime(){
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            
            var time = h + ":" + m + ":" + s;
            document.getElementById("jam").innerText = time;
            document.getElementById("jam").textContent = time;
            
            setTimeout(showTime, 1000);
            
        }

        showTime();
    </script>
</body>

</html>