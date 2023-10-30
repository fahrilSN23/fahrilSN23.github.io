<form action="<?=site_url('album/save_gallery')?>" method="post" enctype="multipart/form-data" autocomplete="off">
    <?= csrf_field() ?>
    <div class="form-group">
        <label>Judul</label>
        <input type="hidden" name="id_album" value="<?=$album->id_album?>" class="form-control" required>
        <input type="text" name="jdl_gallery" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Cover</label>
        <input type="file" name="gbr_gallery" tabindex="9" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Post</button>
    </div>
</form>