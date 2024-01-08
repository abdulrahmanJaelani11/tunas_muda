<?php $this->extend('front/template_front'); ?>
<?= $this->section('content'); ?>
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-secondary"><?= $title ?></h3>
                <hr>
            </div>
            <div class="col-lg-12 col-md-6 col-12 mb-4 mb-lg-0 my-2">
                <div class="custom-block-wrap">
                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3 text-center">Visi</h5>

                            <p><?= $visi_misi->visi ?></p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-6 col-12 mb-4 mb-lg-0 my-2">
                <div class="custom-block-wrap">
                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3 text-center">Misi</h5>

                            <p><?= $visi_misi->misi ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>