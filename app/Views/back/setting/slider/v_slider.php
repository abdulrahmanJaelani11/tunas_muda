<?= $this->extend('back/template/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $title ?></h5>
        <div class="row">
            <div class="col-12 mb-2">
                <a href="<?= base_url('setting/slider/form') ?>" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah</a>
                <div class="col-md-3" style="float: right; position: relative;">
                    <div class="homeSearch w-100" style="width: 100%; margin-left: 5%; margin-top: 0;">
                        <input type="text" id="tb-search" class="form-control" placeholder="Search . . .">
                    </div>
                </div>
            </div>
            <div class="col-12 mb-2">
                <div id="dt-list" class="table-responsive table-striped table-bordered"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets_back') ?>/script/slider/slider.js"></script>
<?= $this->endSection() ?>