<?= $this->extend('back/template/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $title ?></h5>
        <div class="row">
            <div class="col-12 mb-2">
                <form action="<?= base_url() ?>setting/slider/save" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input slide" name="slide1" id="slide1" <?= isset($slider) ? '' : 'required' ?>>
                            <label class="custom-file-label label-slide1" for="slide1">Choose file...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                        <img src="/<?= isset($slider) ? $slider->img : '' ?>" id="preview-image" alt="" class="img-fluid img-thumbnail mt-3" style="width: 300px;">
                        <!-- <div id="preview-image"></div> -->
                    </div>

                    <div class="form-group">
                        <label for="judul_ket">Judul Keterangan</label>
                        <input type="text" name="judul_ket" id="judul_ket" class="form-control" placeholder="Ketikan judul keterangan" value="<?= isset($slider) ? $slider->judul_ket : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control" placeholder="Ketikan Keterangan"><?= isset($slider) ? $slider->keterangan : '' ?></textarea>
                    </div>

                    <input type="hidden" name="id" id="id" value="<?= isset($slider) ? $slider->id : '' ?>">
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
<script src="<?= base_url('assets_back') ?>/script/setting_slider.js"></script>
<?= $this->endSection() ?>