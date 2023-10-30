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
            <a class="breadcrumb-item active" href="#">Artikel</a>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Artikel</h3>
                        </div>
                    </div>
                    <?php foreach ($artikel as $ar) {
                    $isi_artikel =(strip_tags($ar->isi_artikel)); 
                    $isi = substr($isi_artikel,0,220); 
                    $isi = substr($isi_artikel,0,strrpos($isi," "));    
                    ?>
                    <div class="col-lg-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="<?=base_url()?>public/template/assets/img/artikel/<?=$ar->gambar?>" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="<?=site_url('kategoriartikel/detail/'.$ar->slug_kategori.'/'.$ar->judul_seo)?>"><?=$ar->email?></a>
                                    <span class="px-1">/</span>
                                    <span><?= format_tgl($ar->tanggal) ?></span>
                                </div>
                                <a class="h4" href="<?=site_url('kategoriartikel/detail/'.$ar->slug_kategori.'/'.$ar->judul_seo)?>"><?=$ar->judul?></a>
                                <p class="m-0"><?=$isi?>...</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- News Detail End -->
                <div class="row">
                    <div class="col-12">
                        <?= $pager->links('artikel', 'pagination'); ?>
                    </div>
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
                        <h3 class="m-0">Tranding Video</h3>
                    </div>
                    <?php foreach ($video as $vi) { ?>
                    <div class="d-flex mb-3">
                        <img src="<?=base_url()?>public/template/assets/img/video/<?=$vi->gbr_video?>" style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="<?=site_url('listvideo/detail/'.$vi->playlist_seo.'/'.$vi->video_seo)?>"><?=$vi->email?></a>
                                <span class="px-1">/</span>
                                <span><?= $vi->hari . ', ' . format_tgl($vi->tanggal) . ', ' . $vi->jam ?></span>
                            </div>
                            <a class="h6 m-0" href="<?=site_url('listvideo/detail/'.$vi->playlist_seo.'/'.$vi->video_seo)?>"><?=$vi->jdl_video?></a>
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
                        <a href="<?=site_url('listartikel/tag/'.$tart->tag_seo)?>" class="btn btn-sm btn-outline-secondary m-1"><?=$tart->nama_tag?></a>
                        <?php } ?>
                    </div>
                </div>

                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tags Video</h3>
                    </div>
                    <div class="d-flex flex-wrap m-n1">
                        <?php foreach ($tag_video as $tvid) { ?>
                        <a href="<?=site_url('listvideo/tag/'.$tvid->tag_seo)?>" class="btn btn-sm btn-outline-secondary m-1"><?=$tvid->nama_tag?></a>
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