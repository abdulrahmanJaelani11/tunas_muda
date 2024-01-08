<?= $this->extend('front/template_front') ?>
<?= $this->section('content') ?>


<section class="hero-section hero-section-full-height">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-12 p-0">
                <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($slide as $key => $row) : ?>
                            <?php $status = ($key == 0) ? 'active' : '' ?>
                            <div class="carousel-item <?= $status ?>">
                                <img src="<?= base_url($row->img); ?>" class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1><?= $row->judul_ket ?></h1>

                                    <div class="d-flex justify-content-end">
                                        <div style="width: 400px;">
                                            <p><?= $row->keterangan ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5">Selamat Datang Di Website Tunas Muda</h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="<?= base_url('assets'); ?>/images/icons/hands.png" class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text">Become a <strong>volunteer</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="<?= base_url('assets'); ?>/images/icons/heart.png" class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text"><strong>Caring</strong> Earth</p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="<?= base_url('assets'); ?>/images/icons/receive.png" class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text">Make a <strong>Donation</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="<?= base_url('assets'); ?>/images/icons/scholarship.png" class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text"><strong>Scholarship</strong> Program</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section> -->

<section class="section-padding section-bg" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                <img src="<?= base_url('assets_front'); ?>/images/slide/tentang_kami.jpg" class="custom-text-box-image img-fluid" alt="">
            </div>

            <div class="col-lg-6 col-12">
                <div class="custom-text-box">
                    <h2 class="mb-2">Tentang Kami</h2>

                    <h5 class="mb-3">Organisasi Karang Taruna Harumansari</h5>

                    <p class=""><?= isset($situs) ? $situs->tentang : "" ?></p>
                </div>

                <!-- <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Visi</h5>

                                <?= isset($situs) ? $situs->visi : "" ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Misi</h5>

                                <?= isset($situs) ? $situs->misi : "" ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="counter-thumb">
                                            <div class="d-flex">
                                                <span class="counter-number" data-from="1" data-to="50" data-speed="1000"></span>
                                                <span class="counter-number-text"></span>
                                            </div>

                                            <span class="counter-text">Anggota</span>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="counter-thumb mt-4 text-center d-flex justify-content-center">
                                            <div class="d-flex">
                                                <span class="counter-number" data-from="1" data-to="25" data-speed="1000"></span>
                                                <span class="counter-number-text"></span>
                                            </div>

                                            <span class="counter-text">Pria</span>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="counter-thumb mt-4">
                                            <div class="d-flex">
                                                <span class="counter-number" data-from="1" data-to="25" data-speed="1000"></span>
                                                <span class="counter-number-text"></span>
                                            </div>

                                            <span class="counter-text">Wanita</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>

        </div>
    </div>
</section>

<!-- <section class="section-padding section-bg" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <img src="<?= base_url('assets_front'); ?>/images/slide/tentang_kami.jpg" class="custom-text-box-image img-fluid" alt="">
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-text-box">
                        <h2 class="mb-2">Tentang Kami</h2>

                        <h5 class="mb-3">Organisasi Karang Taruna Harumansari</h5>

                        <p class=""><?= isset($situs) ? $situs->tentang : "" ?></p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Visi</h5>

                                <?= isset($situs) ? $situs->visi : "" ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Misi</h5>

                                <?= isset($situs) ? $situs->misi : "" ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="counter-thumb">
                                            <div class="d-flex">
                                                <span class="counter-number" data-from="1" data-to="50" data-speed="1000"></span>
                                                <span class="counter-number-text"></span>
                                            </div>

                                            <span class="counter-text">Anggota</span>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="counter-thumb mt-4 text-center d-flex justify-content-center">
                                            <div class="d-flex">
                                                <span class="counter-number" data-from="1" data-to="25" data-speed="1000"></span>
                                                <span class="counter-number-text"></span>
                                            </div>

                                            <span class="counter-text">Pria</span>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="counter-thumb mt-4">
                                            <div class="d-flex">
                                                <span class="counter-number" data-from="1" data-to="25" data-speed="1000"></span>
                                                <span class="counter-number-text"></span>
                                            </div>

                                            <span class="counter-text">Wanita</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> -->


<!-- <section class="about-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-5 col-12">
                    <img src="<?= base_url('assets_front'); ?>/images/avatar/ketua.jpeg" class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="">
                </div>

                <div class="col-lg-5 col-md-7 col-12">
                    <div class="custom-text-block">
                        <h2 class="mb-0">Oim Similikity</h2>

                        <p class="text-muted mb-lg-4 mb-md-4">Ketua Tunas Muda</p>

                        <p>Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito Professional
                            charity theme based</p>

                        <p>Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus</p>

                        <ul class="social-icon mt-4">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section> -->

<!-- <section class="cta-section section-padding section-bg">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-5 col-12 ms-auto">
                    <h2 class="mb-0">Make an impact. <br> Save lives.</h2>
                </div>

                <div class="col-lg-5 col-12">
                    <a href="#" class="me-4">Make a donation</a>

                    <a href="#section_4" class="custom-btn btn smoothscroll">Become a volunteer</a>
                </div>

            </div>
        </div>
    </section> -->


<section class="section-padding" id="section_3">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Program Kejuruan</h2>
                <hr>
            </div>

            <?php foreach ($jurusan as $row) : ?>
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <img src="<?= $row->img ?>" class="custom-block-image img-fluid">

                        <div class="custom-block">
                            <div class="custom-block-body" style="text-align: justify;">
                                <h5 class="mb-3 text-center"><?= $row->judul ?></h5>

                                <?= $row->keterangan ?>

                                <!-- <div class="progress mt-4">
                                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> -->

                                <!-- <div class="d-flex align-items-center my-2">
                                            <p class="mb-0">
                                                <strong>Raised:</strong>
                                                $18,500
                                            </p>
    
                                            <p class="ms-auto mb-0">
                                                <strong>Goal:</strong>
                                                $32,000
                                            </p>
                                        </div> -->
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</section>

<!-- <section class="volunteer-section section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h2 class="text-white mb-4">Volunteer</h2>

                    <form class="custom-form volunteer-form mb-5 mb-lg-0" action="#" method="post" role="form">
                        <h3 class="mb-4">Become a volunteer today</h3>

                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <input type="text" name="volunteer-name" id="volunteer-name" class="form-control" placeholder="Jack Doe" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="email" name="volunteer-email" id="volunteer-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jackdoe@gmail.com" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="text" name="volunteer-subject" id="volunteer-subject" class="form-control" placeholder="Subject" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="input-group input-group-file">
                                    <input type="file" class="form-control" id="inputGroupFile02">

                                    <label class="input-group-text" for="inputGroupFile02">Upload your CV</label>

                                    <i class="bi-cloud-arrow-up ms-auto"></i>
                                </div>
                            </div>
                        </div>

                        <textarea name="volunteer-message" rows="3" class="form-control" id="volunteer-message" placeholder="Comment (Optional)"></textarea>

                        <button type="submit" class="form-control">Submit</button>
                    </form>
                </div>

                <div class="col-lg-6 col-12">
                    <img src="<?= base_url('assets'); ?>/images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg" class="volunteer-image img-fluid" alt="">

                    <div class="custom-block-body text-center">
                        <h4 class="text-white mt-lg-3 mb-lg-3">About Volunteering</h4>

                        <p class="text-white">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm
                            tokito Professional charity theme based</p>
                    </div>
                </div>

            </div>
        </div>
    </section> -->

<section class="news-section section-padding" id="section_5">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 mb-5">
                <h2>Berita Terbaru</h2>
            </div>

            <div class="col-lg-7 col-12">
                <?php for ($i = 0; $i < 3; $i++) : ?>
                    <?php if (isset($berita[$i]->id)) : ?>
                        <div class="news-block">
                            <div class="news-block-top">
                                <a href="<?= $berita[$i]->img; ?>" target="_blank">
                                    <img src="<?= $berita[$i]->img; ?>" class="news-image img-fluid" alt="">
                                </a>

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
                                            <?= tgl_indo($berita[$i]->created_date) ?>
                                        </p>
                                    </div>

                                    <div class="news-block-author mx-5">
                                        <p>
                                            <i class="bi-person custom-icon me-1"></i>
                                            Oleh <?= $berita[$i]->pembuat ?>
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
                                    <h4><a href="<?= base_url('front/berita/detail/' . $berita[$i]->id) ?>" class="news-block-title-link"><?= $berita[$i]->judul ?></a></h4>
                                </div>

                                <div class="news-block-body">
                                    <p><?= $berita[$i]->keterangan ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endfor ?>
            </div>

            <div class="col-lg-4 col-12 mx-auto">
                <form class="custom-form search-form" action="#" method="post" role="form">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">

                    <button type="submit" class="form-control">
                        <i class="bi-search"></i>
                    </button>
                </form>

                <h5 class="mt-5 mb-3">Berita Terbaru</h5>

                <?php foreach ($berita as $row) : ?>
                    <div class="news-block news-block-two-col d-flex mt-4">
                        <div class="news-block-two-col-image-wrap">
                            <a href="news-detail.html">
                                <img src="<?= $row->img ?>" class="news-image img-fluid" alt="">
                            </a>
                        </div>

                        <div class="news-block-two-col-info">
                            <div class="news-block-title mb-2">
                                <h6><a href="<?= base_url('front/berita/detail/' . $row->id) ?>" class="news-block-title-link"><?= $row->judul ?></a>
                                </h6>
                            </div>

                            <div class="news-block-date">
                                <p>
                                    <i class="bi-calendar4 custom-icon me-1"></i>
                                    <?= tgl_indo($row->created_date) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <div class="category-block d-flex flex-column">
                    <h5 class="mb-3">Categories</h5>

                    <a href="#" class="category-block-link">
                        Drinking water
                        <span class="badge">20</span>
                    </a>

                    <a href="#" class="category-block-link">
                        Food Donation
                        <span class="badge">30</span>
                    </a>

                    <a href="#" class="category-block-link">
                        Children Education
                        <span class="badge">10</span>
                    </a>

                    <a href="#" class="category-block-link">
                        Poverty Development
                        <span class="badge">15</span>
                    </a>

                    <a href="#" class="category-block-link">
                        Clothing Donation
                        <span class="badge">20</span>
                    </a>
                </div>

                <div class="tags-block">
                    <h5 class="mb-3">Tags</h5>

                    <a href="#" class="tags-block-link">
                        Donation
                    </a>

                    <a href="#" class="tags-block-link">
                        Clothing
                    </a>

                    <a href="#" class="tags-block-link">
                        Food
                    </a>

                    <a href="#" class="tags-block-link">
                        Children
                    </a>

                    <a href="#" class="tags-block-link">
                        Education
                    </a>

                    <a href="#" class="tags-block-link">
                        Poverty
                    </a>

                    <a href="#" class="tags-block-link">
                        Clean Water
                    </a>
                </div>

                <form class="custom-form subscribe-form" action="#" method="post" role="form">
                    <h5 class="mb-4">Newsletter Form</h5>

                    <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required>

                    <div class="col-lg-12 col-12">
                        <button type="submit" class="form-control">Subscribe</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


<section class="section-padding" id="section_3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Acara Yang Akan Datang</h2>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block-wrap">
                    <img src="<?= base_url('assets_front'); ?>/images/causes/kegiatan1.jpg" class="custom-block-image img-fluid" alt="">

                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Pemasangan Terpal pada acara perlombaan 17 an 2021</h5>

                            <p>Pemasangan terpal pada acara perlobaan 17an yang dilakukan oleh panitia dari tunas muda</p>

                            <!-- <div class="progress mt-4">
                                        <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->

                            <!-- <div class="d-flex align-items-center my-2">
                                        <p class="mb-0">
                                            <strong>Raised:</strong>
                                            $18,500
                                        </p>

                                        <p class="ms-auto mb-0">
                                            <strong>Goal:</strong>
                                            $32,000
                                        </p>
                                    </div> -->
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block-wrap">
                    <img src="<?= base_url('assets_front'); ?>/images/causes/kegiatan2.jpg" class="custom-block-image img-fluid" alt="">

                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Pengamanan area perlombaan</h5>

                            <p>Pengamanan pada area pelombaan ini dilakukan oleh tim devisi keamanan demi kelancaran acara
                            </p>


                            <!-- <div class="progress mt-4">
                                        <div class="progress-bar w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <div class="d-flex align-items-center my-2">
                                        <p class="mb-0">
                                            <strong>Raised:</strong>
                                            $27,600
                                        </p>

                                        <p class="ms-auto mb-0">
                                            <strong>Goal:</strong>
                                            $60,000
                                        </p>
                                    </div> -->
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="custom-block-wrap">
                    <img src="<?= base_url('assets_front'); ?>/images/causes/kegiatan3.jpg" class="custom-block-image img-fluid" alt="">

                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Pengawasan Acara/lomba</h5>

                            <p>Pengawasan acara ini dilakukan oleh tim dari devisi Acara</p>

                            <!-- <div class="progress mt-4">
                                        <div class="progress-bar w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <div class="d-flex align-items-center my-2">
                                        <p class="mb-0">
                                            <strong>Raised:</strong>
                                            $84,600
                                        </p>

                                        <p class="ms-auto mb-0">
                                            <strong>Goal:</strong>
                                            $100,000
                                        </p>
                                    </div> -->
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="testimonial-section section-padding section-bg">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="mb-lg-3">Happy customers</h2>

                <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Lorem Ipsum dolor sit amet, consectetur adipsicing
                                    kengan omeg kohm tokito charity theme</h4>

                                <small class="carousel-name"><span class="carousel-name-title">Maria</span>,
                                    Boss</small>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Sed leo nisl, posuere at molestie ac, suscipit auctor
                                    mauris quis metus tempor orci</h4>

                                <small class="carousel-name"><span class="carousel-name-title">Thomas</span>,
                                    Partner</small>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Lorem Ipsum dolor sit amet, consectetur adipsicing
                                    kengan omeg kohm tokito charity theme</h4>

                                <small class="carousel-name"><span class="carousel-name-title">Jane</span>,
                                    Advisor</small>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Sed leo nisl, posuere at molestie ac, suscipit auctor
                                    mauris quis metus tempor orci</h4>

                                <small class="carousel-name"><span class="carousel-name-title">Bob</span>,
                                    Entreprenuer</small>
                            </div>
                        </div>

                        <ol class="carousel-indicators">
                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active">
                                <img src="<?= base_url('assets'); ?>/images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg" class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>

                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="1" class="">
                                <img src="<?= base_url('assets'); ?>/images/avatar/portrait-young-redhead-bearded-male.jpg" class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>

                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="2" class="">
                                <img src="<?= base_url('assets'); ?>/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg" class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>

                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="3" class="">
                                <img src="<?= base_url('assets'); ?>/images/avatar/studio-portrait-emotional-happy-funny.jpg" class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>
                        </ol>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="contact-section section-padding" id="section_6">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                <div class="contact-info-wrap">
                    <h2>Get in touch</h2>

                    <div class="contact-image-wrap d-flex flex-wrap">
                        <img src="<?= base_url('assets'); ?>/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg" class="img-fluid avatar-image" alt="">

                        <div class="d-flex flex-column justify-content-center ms-3">
                            <p class="mb-0">Clara Barton</p>
                            <p class="mb-0"><strong>HR & Office Manager</strong></p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <h5 class="mb-3">Contact Infomation</h5>

                        <p class="d-flex mb-2">
                            <i class="bi-geo-alt me-2"></i>
                            Akershusstranda 20, 0150 Oslo, Norway
                        </p>

                        <p class="d-flex mb-2">
                            <i class="bi-telephone me-2"></i>

                            <a href="tel: 305-240-9671">
                                305-240-9671
                            </a>
                        </p>

                        <p class="d-flex">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@yourgmail.com">
                                donate@charity.org
                            </a>
                        </p>

                        <a href="#" class="custom-btn btn mt-3">Get Direction</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-12 mx-auto">
                <form class="custom-form contact-form" action="#" method="post" role="form">
                    <h2>Contact form</h2>

                    <p class="mb-4">Or, you can just send an email:
                        <a href="#">info@charity.org</a>
                    </p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" name="first-name" id="first-name" class="form-control" placeholder="Jack" required>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Doe" required>
                        </div>
                    </div>

                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jackdoe@gmail.com" required>

                    <textarea name="message" rows="5" class="form-control" id="message" placeholder="What can we help you?"></textarea>

                    <button type="submit" class="form-control">Send Message</button>
                </form>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>