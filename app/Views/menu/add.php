<form action="<?=site_url('menu_web')?>" method="post" autocomplete="off">
    <?= csrf_field() ?>
    <div class="form-group">
        <label>Nama Menu *</label>
        <input type="text" name="nama_menu" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Jenis Menu *</label>
        <div class="form-check">
            <input class="form-check-input jenis_menu" type="radio" name="jenis_menu" id="main" value="main" checked>
            <label class="form-check-label">
            Menu
            </label>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input class="form-check-input jenis_menu" type="radio" name="jenis_menu" value="sub">
            <label class="form-check-label">
            Sub Menu
            </label>
        </div>
    </div>
    <div class="form-group" id="form-input">
        <label>Sub Menu Dari*</label>
        <select name="id_parent" id="sub_menu" class="form-control selectric">
            <option value="">- PILIH MENU UTAMA -</option>
            <?php foreach ($menu_utama as $menu) : ?>
            <option value="<?=$menu->id_menu?>"><?=$menu->nama_menu?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Sumber Menu *</label>
        <div class="form-check">
            <input class="form-check-input sumber_menu" type="radio" name="sumber_menu" id="link" value="link" checked>
            <label class="form-check-label">
            Link
            </label>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input class="form-check-input sumber_menu" type="radio" name="sumber_menu" id="halaman" value="halaman">
            <label class="form-check-label">
            Halaman
            </label>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input class="form-check-input sumber_menu" type="radio" name="sumber_menu" id="kategori" value="kategori">
            <label class="form-check-label">
            Kategori
            </label>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input class="form-check-input sumber_menu" type="radio" name="sumber_menu" id="playlist" value="playlist">
            <label class="form-check-label">
            Playlist
            </label>
        </div>
    </div>
    <div class="form-group" id="form-input-link">
        <input type="text" name="link_input" id="link_input" class="form-control" placeholder="http://domain.com/page">
    </div>
    <div class="form-group" id="form-input-halaman">
        <select name="halaman_input" id="halaman_input" class="form-control">
            <option value="">- PILIH HALAMAN -</option>
            <?php foreach ($halaman as $hal) : ?>
            <option value="page/detail/<?=$hal->judul_seo?>"><?=$hal->judul?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group" id="form-input-kategori">
        <select name="kategori_input" id="kategori_input" class="form-control">
            <option value="">- PILIH KATEGORI -</option>
            <?php foreach ($kategori as $kat) : ?>
            <option value="kategoriartikel/detail/<?=$kat->slug_kategori?>"><?=$kat->name_kategori?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group" id="form-input-playlist">
        <select name="playlist_input" id="playlist_input" class="form-control">
            <option value="">- PILIH PLAYLIST -</option>
            <?php foreach ($playlist as $ply) : ?>
            <option value="listvideo/detail/<?=$ply->playlist_seo?>"><?=$ply->jdl_playlist?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Urutan Menu *</label>
        <input type="number" name="urutan" min="1" class="form-control" required>
    </div>
    <div>
        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
</form>