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
            <a class="breadcrumb-item" href="<?=site_url('listvideo')?>">Video</a>
            <a class="breadcrumb-item" href="<?=site_url($uri->getSegment(1).'/'.$uri->getSegment(2).'/'.$uri->getSegment(3))?>"><?=$video->jdl_playlist?></a>
            <a class="breadcrumb-item active" href="#"><?=$video->jdl_video?></a>
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
                <div class="position-relative mb-3">

                    <iframe class="img-fluid w-100 h-100 mb-3" src="<?=$video->youtube?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    <div class="overlay position-relative bg-light">
                        <div class="mb-3">
                            <span><?= $video->hari . ', ' . format_tgl($video->tanggal) . ' / ' . $video->jam ?></span>
                        </div>
                        <div class="mb-3">
                            <span>Tag : <?= $video->tag ?></span>
                        </div>
                        <div>
                            <h3 class="mb-3"><?=$video->jdl_video?></h3>
                            <?=$video->keterangan?>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <?php
                    $this->db      = \Config\Database::connect();
                    $query = $this->db->table('komentarvideo')->getWhere(['id_video' => $video->id_video, 'aktif' => 'Y']);
                    ?>
                    <h3 class="mb-4"><?=$query->resultID->num_rows?> Komentar</h3>
                    <?php if ($query->resultID->num_rows > 0) {
                    foreach ($query->getResult() as $q) {
                    $isian=nl2br($q->isi_komentar); 
                    $komentarku = sensor($isian);    
                    ?>
                    <div class="media mb-4">
                        <img src="<?=base_url()?>public/template/assets/img/avatar/avatar-4.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6><a href="#"><?=$q->nama_komentar?></a> <small><i><?= format_tgl($q->tgl) . ' / ' . $q->jam_komentar ?></i></small></h6>
                            <p><?=$komentarku?></p>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <b>Success !</b>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                        </div>
                    <?php endif;
                    $link = $uri->getSegment(1).'/'.$uri->getSegment(2).'/'.$uri->getSegment(3).'/'.$uri->getSegment(4);
                    ?>
                    <h3 class="mb-4">Tinggalkan Komentar</h3>
                    <form action="<?=site_url('komentarvideo/save')?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="name">Nama Komentar *</label>
                            <input type="hidden" class="form-control" name="id_video" value="<?=$video->id_video?>" id="name">
                            <input type="hidden" class="form-control" name="link" value="<?=$link?>" id="name">
                            <input type="text" class="form-control" name="nama_komentar" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="message">Komentar *</label>
                            <textarea id="message" cols="30" rows="5" name="isi_komentar" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <button class="btn btn-primary font-weight-semi-bold py-2 px-3">Tinggalkan Komentar</button>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->

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
                    <?php foreach ($listvideo as $v) { ?>
                    <div class="d-flex mb-3">
                        <img src="<?=base_url()?>public/template/assets/img/video/<?=$v->gbr_video?>" style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="#"><?=$v->jdl_playlist?></a>
                                <span class="px-1">/</span>
                                <span><?= $v->hari . ', ' . format_tgl($v->tanggal) . ', ' . $v->jam ?></span>
                            </div>
                            <a class="h6 m-0" href="<?=site_url('listvideo/detail/'.$v->playlist_seo.'/'.$v->video_seo)?>"><?=$v->jdl_video?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- Popular News End -->

                <!-- Tags Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tags Video</h3>
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