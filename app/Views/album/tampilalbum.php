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
            <a class="breadcrumb-item active" href="#">Album Foto</a>
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
                            <h3 class="m-0">Album Foto</h3>
                        </div>
                    </div>
                    <?php foreach ($album as $al) {
                    $this->db      = \Config\Database::connect();
                    $total_foto = $this->db->table('gallery')->getWhere(['id_album' => $al->id_album])->resultID->num_rows;
                    $keterangan =(strip_tags($al->keterangan)); 
                    $isi = substr($keterangan,0,220); 
                    $isi = substr($keterangan,0,strrpos($isi," "));    
                    ?>
                    <div class="col-lg-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="<?=base_url()?>public/template/assets/img/album/<?=$al->gbr_album?>" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <span><?= $total_foto ?> Foto</span>
                                    <span class="px-1">/</span>
                                    <span><?= format_tgl($al->tgl_posting) ?></span>
                                </div>
                                <a class="h6" href="<?=site_url('listfoto/detail/'.$al->album_seo)?>"><?=$al->jdl_album?></a>
                                <p class="m-0"><?=$isi?>...</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- News Detail End -->
                <div class="row">
                    <div class="col-12">
                        <?= $pager->links('album', 'pagination'); ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 pt-3 pt-lg-0">

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
                                <a href="#"><?=$a->name_kategori?></a>
                                <span class="px-1">/</span>
                                <span><?= $a->hari . ', ' . format_tgl($a->tanggal) . ', ' . $a->jam ?></span>
                            </div>
                            <a class="h6 m-0" href="<?=site_url('kategoriartikel/detail/'.$a->slug_kategori.'/'.$a->judul_seo)?>"><?=$a->judul?></a>
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