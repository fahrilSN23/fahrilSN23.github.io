<?= $this->extend('frontend/default') ?>

<?= $this->section('title') ?>
<title><?=$identitas->nama_website?> - <?=$identitas->meta_keyword?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="<?=site_url()?>">Beranda</a>
            <a class="breadcrumb-item" href="<?=site_url('listfoto')?>">Album Foto</a>
            <a class="breadcrumb-item active" href="#"><?=$album->jdl_album?></a>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php if ($tot_gallery > 0) {
                        foreach ($gallery as $gal) { ?>
                        <div class="col-lg-3">
                            <!-- News Detail Start -->
                            <a title="<?=$gal->jdl_gallery?>" href="<?=base_url()?>public/template/assets/img/gallery/<?=$gal->gbr_gallery?>">
                                <img class="img-fluid w-100 bg-light" src="<?=base_url()?>public/template/assets/img/gallery/<?=$gal->gbr_gallery?>">
                            </a>
                            <!-- News Detail End -->
                        </div>
                        <?php }
                    } else { ?>
                        <div class="position-relative mb-3">
                            <div class="overlay position-relative bg-light">
                                <div>
                                    <h6 class="text-center">Tidak ada Foto dalam Album ini</h6>
                                </div>
                            </div>
                        </div>
                    <?php } ?>                    
                </div>
            </div>

            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Ads Start -->
                <?php foreach ($iklan_sidebar as $isd) { ?>
                <div class="mb-3 pb-3">
                    <a href="<?= $isd->url ?>" target="_blank"><img class="img-fluid" src="<?=base_url()?>public/template/assets/img/iklan_sidebar/<?= $isd->gambar ?>" alt="<?= $isd->judul ?>"></a>
                </div>
                <?php } ?>
                <!-- Ads End -->

                <!-- Popular News Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tranding</h3>
                    </div>
                    <?php foreach ($artikel as $a) { ?>
                    <div class="d-flex mb-3">
                        <img src="<?=base_url()?>public/template/assets/img/artikel/<?=$a->gambar?>" style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href=""><?=$a->name_kategori?></a>
                                <span class="px-1">/</span>
                                <span><?= $a->hari . ', ' . format_tgl($a->tanggal) . ', ' . $a->jam ?></span>
                            </div>
                            <a class="h6 m-0" href=""><?=$a->judul?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- Popular News End -->

                <!-- Tags Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tags Artikel</h3>
                    </div>
                    <div class="d-flex flex-wrap m-n1">
                        <?php foreach ($tag_artikel as $tart) { ?>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1"><?=$tart->nama_tag?></a>
                        <?php } ?>
                    </div>
                </div>

                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tags Video</h3>
                    </div>
                    <div class="d-flex flex-wrap m-n1">
                        <?php foreach ($tag_video as $tvid) { ?>
                        <a href="" class="btn btn-sm btn-outline-secondary m-1"><?=$tvid->nama_tag?></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- News With Sidebar End -->
<?= $this->endSection() ?>