<?= $this->extend('back/template/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-2">
                <a href="<?= base_url('berita/form') ?>" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah</a>
                <div class="col-md-3" style="float: right; position: relative;">
                    <div class="homeSearch w-100" style="width: 100%; margin-left: 5%; margin-top: 0;">
                        <input type="text" id="tb-search" class="form-control" placeholder="Search . . .">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <?php foreach ($data_berita as $row) : ?>
        <div class="col-lg-4">
            <div class="card mb-3">
                <img class="img-fluid card-img-top" src="<?= $row->img ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $row->judul ?></h5>
                    <p class="card-text"><?= $row->keterangan ?></p>
                    <a href="<?= base_url('berita/edit/' . $row->id) ?>" class="text-dark btn btn-default">
                        <i class="fa fa-fw fa-edit"></i>
                        Edit
                    </a>
                    <a href="<?= base_url('berita/hapus/' . $row->id) ?>" class="text-dark btn btn-default">
                        <i class="fa fa-fw fa-trash"></i>
                        Hapus
                    </a>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><i class="fa fa-fw fa-user"></i><?= $row->pembuat ?></small>
                    <small class="text-muted"><i class="fa fa-fw fa-calendar"></i> <?= tgl_indo($row->created_date) ?></small>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets_back') ?>/script/berita.js"></script>
<?= $this->endSection() ?>