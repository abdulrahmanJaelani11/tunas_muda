<?= $this->extend('back/template/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h3 class="card-title"><?= $title ?></h3>
        <form id="form_tambah">
            <div class="form-group row">
                <label for="nama_jurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="nama_jurusan" placeholder="Nama Jurusan" value="<?= isset($dt_jurusan) ? $dt_jurusan->nama_jurusan : "" ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul (Postingan)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="judul" placeholder="Panggilan" value="<?= isset($dt_jurusan) ? $dt_jurusan->judul : '' ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea name="keterangan" id="keterangan" cols="30" rows="3" placeholder="Ketikan Keterangan" class="form-control"><?= isset($dt_jurusan) ? $dt_jurusan->keterangan : '' ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img" id="img" accept=".png, .jpg, .jpeg">
                        <label class="custom-file-label" for="img">Pilih Gambar...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    <?php if (isset($dt_jurusan) && $dt_jurusan->img != '') : ?>
                        <img src="<?= base_url($dt_jurusan->img) ?>" alt="" class="img-thumbnail mt-2 shadow" style="width: 150px;">
                    <?php endif ?>
                </div>
            </div>
            <input type="hidden" name="id" id="id" value="<?= isset($dt_jurusan) ? $dt_jurusan->id : '' ?>">
            <div class="form-group row">
                <div class="col-sm-10">
                    <a href="<?= base_url('jurusan') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets_back') ?>/script/jurusan/jurusan_form.js"></script>
<?= $this->endSection() ?>