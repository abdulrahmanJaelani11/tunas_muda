<?= $this->extend('back/template/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h3 class="card-title"><?= $title ?></h3>
        <form id="form_tambah">
            <div class="form-group row">
                <label for="nama_anggota" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="nama_anggota" placeholder="Nama" value="<?= isset($dt_anggota) ? $dt_anggota['nama_anggota'] : "" ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="panggilan" class="col-sm-2 col-form-label">Panggilan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="panggilan" placeholder="Panggilan" value="<?= isset($dt_anggota) ? $dt_anggota['panggilan'] : '' ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control form-control-sm" id="email" placeholder="Alamat Email" value="<?= isset($dt_anggota) ? $dt_anggota['email'] : '' ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_wa" class="col-sm-2 col-form-label">No. WhatsApp</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control form-control-sm" id="no_wa" placeholder="No. WhatsApp" value="<?= isset($dt_anggota) ? $dt_anggota['no_wa'] : '' ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="status" placeholder="Status" value="<?= isset($dt_anggota) ? $dt_anggota['status'] : '' ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    <?php if (isset($dt_anggota) && $dt_anggota['img'] != '') : ?>
                        <img src="<?= base_url($dt_anggota['img']) ?>" alt="" class="img-thumbnail mt-2 shadow" style="width: 150px;">
                    <?php endif ?>
                </div>
            </div>
            <input type="hidden" name="id" id="id" value="<?= isset($dt_anggota) ? $dt_anggota['id'] : '' ?>">
            <div class="form-group row">
                <div class="col-sm-10">
                    <a href="<?= base_url('anggota') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn  btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets_back') ?>/script/anggota_form.js"></script>
<?= $this->endSection() ?>