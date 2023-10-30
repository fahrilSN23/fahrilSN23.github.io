<form action="<?=site_url('album/update_gallery/'.$edit_gallery->id_gallery)?>" method="post" enctype="multipart/form-data" autocomplete="off">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label>Judul</label>
        <input type="hidden" name="id_gallery" value="<?=$edit_gallery->id_gallery?>" class="form-control" required>
        <input type="hidden" name="id_album" value="<?=$album->id_album?>" class="form-control" required>
        <input type="text" name="jdl_gallery" value="<?=$edit_gallery->jdl_gallery?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Cover</label>
        <input type="file" name="gbr_gallery" tabindex="9" class="form-control">
    </div>
    <?php if ($edit_gallery->gbr_gallery != null) { ?>
    <div class="form-group">
        <label>Foto saat ini : </label>
        <a href="<?=base_url()?>public/template/assets/img/gallery/<?=$edit_gallery->gbr_gallery?>" target="_blank">
        <img class="mt-2" src="<?=base_url()?>public/template/assets/img/gallery/<?=$edit_gallery->gbr_gallery?>" width="70px">
        </a>
    </div>
    <?php } ?>
    <div class="form-group">
        <button class="btn btn-primary">Post</button>
    </div>
</form>