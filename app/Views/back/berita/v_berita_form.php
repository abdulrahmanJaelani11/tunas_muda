<?= $this->extend('back/template/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h3 class="card-title"><?= $title ?></h3>
        <form id="form_tambah">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" placeholder="Ketikan judul berita" value="<?= isset($dt_berita) ? $dt_berita->judul : '' ?>">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"><?= isset($dt_berita) ? $dt_berita->keterangan : '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="img">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="img" name="img" accept=".png, .jpeg, .jpg" <?= !isset($dt_berita) ? 'required' : '' ?>>
                    <label class="custom-file-label" for="img">Pilih Gambar...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                <img src="/<?= isset($dt_berita) ? $dt_berita->img : '' ?>" id="preview-image" alt="" class="img-fluid img-thumbnail mt-3" style="width: 300px;">
            </div>

            <input type="hidden" name="id" id="id" value="<?= isset($dt_berita) ? $dt_berita->id : '' ?>">
            <button class="btn btn-secondary btn_back" type="button"><i class="fa fa-fw fa-arrow-left"></i> Kembali</button>
            <button type="submit" class="btn  btn-primary"><i class="fa fa-fw fa-save"></i> Submit</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets_back') ?>/script/berita_form.js"></script>
<?= $this->endSection() ?>