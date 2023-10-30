<li class="menu-header">Main Menu</li>
<li><a class="nav-link" href="<?=site_url('home')?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li><a class="nav-link" href="http://localhost/stok_obat"><i class="fas fa-th"></i> <span>Stok Obat</span></a></li>

<?php if (userLogin()->level_user == 'Administrator') { ?>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Menu Utama</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?=site_url('logo_web')?>">Logo Website</a></li>
        <li><a class="nav-link" href="<?=site_url('identitas_web')?>">Identitas Website</a></li>
        <li><a class="nav-link" href="<?=site_url('menu_web')?>">Menu Website</a></li>
        <li><a class="nav-link" href="<?=site_url('halaman_baru')?>">Halaman Baru</a></li>
    </ul>
</li>
<?php } ?>

<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pencil-alt"></i> <span>Modul Artikel</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?=site_url('artikel')?>">Artikel</a></li>
        <li><a class="nav-link" href="<?=site_url('kategori')?>">Kategori Artikel</a></li>
        <?php if (userLogin()->level_user == 'Administrator') { ?>
        <li><a class="nav-link" href="<?=site_url('tag_artikel')?>">Tag Artikel</a></li>
        <?php } ?>
        <li><a class="nav-link" href="<?=site_url('komentarartikel')?>">Komentar Artikel</a></li>
        <li><a class="nav-link" href="<?=site_url('sensorkomentar')?>">Sensor Komentar</a></li>
        <li><a class="nav-link" href="<?=site_url('album')?>">Album</a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-play"></i> <span>Modul Video</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?=site_url('playlist_video')?>">Playlist Video</a></li>
        <li><a class="nav-link" href="<?=site_url('video')?>">Video</a></li>
        <?php if (userLogin()->level_user == 'Administrator') { ?>
        <li><a class="nav-link" href="<?=site_url('tag_video')?>">Tag Video</a></li>
        <?php } ?>
        <li><a class="nav-link" href="<?=site_url('komentarvideo')?>">Komentar Video</a></li>
    </ul>
</li>

<?php if (userLogin()->level_user == 'Administrator') { ?>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-ad"></i> <span>Modul Iklan</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?=site_url('iklan_slide')?>">Iklan Slide</a></li>
        <li><a class="nav-link" href="<?=site_url('iklan_sidebar')?>">Iklan Sidebar</a></li>
    </ul>
</li>
<?php } ?>

<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-comments"></i> <span>Modul Interaksi</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?=site_url('agenda')?>">Agenda</a></li>
        <?php if (userLogin()->level_user == 'Administrator') { ?>
        <li><a class="nav-link" href="<?=site_url('sekilasinfo')?>">Sekilas Info</a></li>
        <li><a class="nav-link" href="<?=site_url('download')?>">Area Download</a></li>
        <?php } ?>
    </ul>
</li>
<?php if (userLogin()->level_user == 'Administrator') { ?>
<li><a class="nav-link" href="<?=site_url('users')?>"><i class="fas fa-users"></i> <span>Manajemen User</span></a></li>
<?php } ?>