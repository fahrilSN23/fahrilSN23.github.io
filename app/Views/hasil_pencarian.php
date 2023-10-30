<?= $this->extend('frontend/default') ?>

<?= $this->section('title') ?>
<title><?=$identitas->nama_website?> - <?=$identitas->meta_keyword?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Artikel Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Artikel</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="row col-lg-12">
                <?php
                $this->db = \Config\Database::connect();
                foreach ($artikel as $art) {
                $katart = $this->db->table('kategori')->getWhere(['id_kategori' => $art->id_kategori])->getRow();
                ?>
                <div class="col-md-6 d-flex mb-3">
                    <img src="<?=base_url()?>public/template/assets/img/artikel/<?=$art->gambar?>" style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                        <div class="mb-1" style="font-size: 13px;">
                            <a href=""><?=$katart->name_kategori?></a>
                            <span class="px-1">/</span>
                            <span><?= format_tgl($art->tanggal) . ', ' . $art->jam?></span>
                        </div>
                        <a class="h6 m-0" href=""><?= $art->judul ?></a>
                    </div>
                </div>
                <?php } ?>
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
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="row col-lg-12">
                <?php
                $this->db = \Config\Database::connect();
                foreach ($video as $vid) {
                $playvid = $this->db->table('playlist')->getWhere(['id_playlist' => $vid->id_playlist])->getRow();
                ?>
                <div class="col-md-6 d-flex mb-3">
                    <img src="<?=base_url()?>public/template/assets/img/video/<?=$vid->gbr_video?>" style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                        <div class="mb-1" style="font-size: 13px;">
                            <a href=""><?=$playvid->jdl_playlist?></a>
                            <span class="px-1">/</span>
                            <span><?= $vid->hari . ', ' . format_tgl($vid->tanggal) . ', ' . $vid->jam?></span>
                        </div>
                        <a class="h6 m-0" href=""><?= $vid->jdl_video ?></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- Video End -->
    </div>
    <!-- Video End -->

    <!-- Agenda Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Agenda</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="row col-lg-12">
                <?php
                $this->db = \Config\Database::connect();
                foreach ($agenda as $agd) {
                ?>
                <div class="col-md-6 d-flex mb-3">
                    <img src="<?=base_url()?>public/template/assets/img/agenda/<?=$agd->gambar?>" style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                        <div class="mb-1" style="font-size: 13px;">
                            <a href=""><?=$agd->pengirim?></a>
                            <span class="px-1">/</span>
                            <span><?= format_tgl($agd->tgl_posting) . ', ' . $agd->jam?></span>
                        </div>
                        <a class="h6 m-0" href="">
                            <?= $agd->tema ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- Agenda End -->
    </div>
    <!-- Agenda End -->
</div>
<!-- Agenda End -->
<?= $this->endSection() ?>