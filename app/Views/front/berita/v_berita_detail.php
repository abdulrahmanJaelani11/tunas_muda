<?php $this->extend('front/template_front'); ?>
<?= $this->section("content"); ?>
<section class="detail_berita">
    <div class="container my-3">
        <div class="row">

            <div class="col-12 my-3">
                <h3 class="text-secondary"><?= $title ?></h3>
                <hr>
            </div>

            <div class="col-lg-7 col-12">
                <a href="/<?= $dt_berita->img; ?>" target="_blank">
                    <img src="/<?= $dt_berita->img; ?>" class="news-image img-fluid" alt="">
                </a>
            </div>

            <div class="col-12">
                <div class="news-block">
                    <div class="news-block-top">

                        <!-- <div class="news-category-block">
                                        <a href="#" class="category-block-link">
                                            Lifestyle,
                                        </a>

                                        <a href="#" class="category-block-link">
                                            Clothing Donation
                                        </a>
                                    </div> -->
                    </div>

                    <div class="news-block-info">
                        <div class="d-flex mt-2">
                            <div class="news-block-date">
                                <p>
                                    <i class="bi-calendar4 custom-icon me-1"></i>
                                    <?= tgl_indo($dt_berita->created_date) ?>
                                </p>
                            </div>

                            <div class="news-block-author mx-5">
                                <p>
                                    <i class="bi-person custom-icon me-1"></i>
                                    Oleh <?= $dt_berita->pembuat ?>
                                </p>
                            </div>

                            <!-- <div class="news-block-comment">
                                            <p>
                                                <i class="bi-chat-left custom-icon me-1"></i>
                                                32 Comments
                                            </p>
                                        </div> -->
                        </div>

                        <div class="news-block-title mb-2">
                            <h4><?= $dt_berita->judul ?></h4>
                        </div>

                        <div class="news-block-body">
                            <p><?= $dt_berita->keterangan ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>