<?php $this->extend('front/template_front'); ?>
<?= $this->section('content'); ?>
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-secondary"><?= $title ?></h3>
                <hr>
            </div>
            <div class="col-12">
                <p><?= $sambutan_kepsek ?></p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>