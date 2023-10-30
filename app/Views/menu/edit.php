<form action="<?=site_url('menu_web/'.$edit_menu->id_menu)?>" method="post" autocomplete="off">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label>Nama Menu *</label>
        <input type="text" name="nama_menu" value="<?=$edit_menu->nama_menu?>" class="form-control" required>
    </div>
    <div class="form-group" id="form-input-link">
        <label>Link Menu *</label>
        <input type="text" name="link" id="link_input" class="form-control" value="<?=$edit_menu->link?>" placeholder="http://domain.com/page">
    </div>
    <div class="form-group">
        <label>Urutan Menu *</label>
        <input type="number" name="urutan" value="<?=$edit_menu->urutan?>" min="1" class="form-control" required>
    </div>
    <div>
        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
</form>