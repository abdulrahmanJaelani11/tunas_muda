<?= $this->extend('back/template/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $title ?></h5>
        <div class="row">
            <div class="col-12">
                <iframe src="<?= base_url() ?>" frameborder="0" width="100%" height="300px"></iframe>
            </div>
            <div class="col-12 mb-2">
                <form action="<?= base_url() ?>setting/situs/save" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_situs">Nama Situs</label>
                            <input type="text" class="form-control" name="nama_situs" id="nama_situs" placeholder="Nama Situs" value="<?= isset($dt_situs) ? $dt_situs->nama_situs : '' ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email" value="<?= isset($dt_situs) ? $dt_situs->email : '' ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="slogan">Slogan</label>
                            <input type="text" class="form-control" name="slogan" id="slogan" placeholder="Slogan" value="<?= isset($dt_situs) ? $dt_situs->slogan : '' ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" cols="30" rows="2"><?= isset($dt_situs) ? $dt_situs->alamat : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tentang">Tentang</label>
                        <textarea class="form-control" name="tentang" id="tentang" placeholder="Tentang" cols="30" rows="2"><?= isset($dt_situs) ? $dt_situs->tentang : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea class="form-control" name="visi" id="visi" placeholder="Visi" cols="30" rows="2"><?= isset($dt_situs) ? $dt_situs->visi : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea class="form-control" name="misi" id="misi" placeholder="Misi" cols="30" rows="2"><?= isset($dt_situs) ? $dt_situs->misi : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sejarah">Sejarah</label>
                        <textarea class="form-control" name="sejarah" id="sejarah" placeholder="Sejarah" cols="30" rows="2"><?= isset($dt_situs) ? $dt_situs->sejarah : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sambutan_kepsek">Sambutan Kepala Sekolah</label>
                        <textarea class="form-control" name="sambutan_kepsek" id="sambutan_kepsek" placeholder="Sambutan Kepala Sekolah" cols="30" rows="2"><?= isset($dt_situs) ? $dt_situs->sambutan_kepsek : '' ?></textarea>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?= isset($dt_situs) ? $dt_situs->id : '' ?>">
                    <button type="submit" class="btn  btn-primary">
                        <i class="fa fa-fw fa-paper-plane"></i>
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets_back') ?>/script/situs/situs.js"></script>
<?= $this->endSection() ?>