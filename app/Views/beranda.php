<?= $this->extend('frontend/default') ?>

<?= $this->section('title') ?>
<title><?=$identitas->nama_website?> - <?=$identitas->meta_keyword?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Main News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    <?php foreach ($iklan_slide as $slide) { ?>
                    <div class="position-relative overflow-hidden" style="height: 435px;">
                        <img class="img-fluid h-100" src="<?=base_url()?>public/template/assets/img/iklan_slide/<?= $slide->gambar ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="<?= $slide->url ?>" target="_blank"><?=format_tgl($slide->tgl_posting)?></a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="<?= $slide->url ?>" target="_blank"><?=$slide->judul?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->


<!-- Artikel Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Artikel</h3>
            <a class="text-secondary font-weight-medium text-decoration-none" href="<?=site_url('listartikel')?>">View All</a>
        </div>
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
            <?php foreach ($artikel as $art) { ?>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="<?=base_url()?>public/template/assets/img/artikel/<?=$art->gambar?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="<?=site_url('kategoriartikel/detail/'.$art->slug_kategori.'/'.$art->judul_seo)?>"><?= $art->name_kategori ?></a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="<?=site_url('kategoriartikel/detail/'.$art->slug_kategori.'/'.$art->judul_seo)?>"><?= $art->hari . ', ' . format_tgl($art->tanggal) ?></a>
                        </div>
                        <a class="h4 m-0 text-white" href="<?=site_url('kategoriartikel/detail/'.$art->slug_kategori.'/'.$art->judul_seo)?>"><?= $art->judul ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
    </div>
    <!-- Artikel End -->
</div>
<!-- Artikel End -->

<!-- Video Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Video</h3>
            <a class="text-secondary font-weight-medium text-decoration-none" href="<?=site_url('listvideo')?>">View All</a>
        </div>
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
            <?php foreach ($video as $vid) { ?>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="<?=base_url()?>public/template/assets/img/video/<?=$vid->gbr_video?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="<?=site_url('listvideo/detail/'.$vid->playlist_seo.'/'.$vid->video_seo)?>"><?= $vid->jdl_playlist ?></a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="<?=site_url('listvideo/detail/'.$vid->playlist_seo.'/'.$vid->video_seo)?>"><?= $vid->hari . ', ' . format_tgl($vid->tanggal) ?></a>
                        </div>
                        <a class="h4 m-0 text-white" href="<?=site_url('listvideo/detail/'.$vid->playlist_seo.'/'.$vid->video_seo)?>"><?= $vid->jdl_video ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
    </div>
    <!-- Video End -->
</div>
<!-- Artikel End -->

<!-- Agenda Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Agenda</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="<?=site_url('listagenda')?>">View All</a>
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <?php foreach ($agenda as $agen) { ?>
                        <div class="col-md-6 d-flex mb-3">
                            <img src="<?=base_url()?>public/template/assets/img/agenda/<?=$agen->gambar?>" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href=""><?=$agen->pengirim?></a>
                                    <span class="px-1">/</span>
                                    <span><?= format_tgl($agen->tgl_posting) . ', ' . $agen->jam?></span>
                                </div>
                                <a class="h6 m-0" href="<?=site_url('listagenda/detail/'.$agen->tema_seo)?>"><?= $agen->tema ?></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Sekilas Info</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="<?=site_url('listinfo')?>">View All</a>
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <?php foreach ($sekilasinfo as $sinfo) { ?>
                        <div class="col-md-6 d-flex mb-3">
                            <img src="<?=base_url()?>public/template/assets/img/sekilasinfo/<?=$sinfo->gambar?>" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <span><?= format_tgl($sinfo->tgl_posting) ?></span>
                                </div>
                                <a class="h6 m-0" href="<?=site_url('listinfo/detail/'.$sinfo->id_sekilasinfo)?>"><?= $sinfo->info ?></a>
                            </div>
                        </div>
                        <?php } ?>
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
<!-- Agenda End -->
<?= $this->endSection() ?>