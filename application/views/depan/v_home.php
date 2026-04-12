<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php foreach ($identitas->result() as $indexIdentitas) : ?>
            Selamat Datang di <?php echo $indexIdentitas->nama_identitas; ?>
        <?php endforeach; ?></title>
    <!-- <link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/icon.png' ?>"> -->
    <link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/logo-gkj-tab.png' ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/bootstrap.min.css' ?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/font-awesome.min.css' ?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/simple-line-icons.css' ?>">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/slick.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/slick-theme.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/owl.carousel.min.css' ?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url() . 'theme/css/style.css' ?>" rel="stylesheet">
    <?php
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
    ?>
</head>

<body>
    <!--============================= HEADER =============================-->

    <section>
        <div class="slider_img layout_two">
            <!-- <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block" src="<?php echo base_url() . 'theme/images/slider.jpg' ?>" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Bepikir Kreaftif &amp; Inovatif</h1>
                            <h4>Bagi kami kreativitas merupakan gerbang masa depan.<br> kreativitas akan mendorong inovasi. <br> Itulah yang kami lakukan.</h4>
                            <div class="slider-btn">
                                <a href="<?php echo site_url('artikel'); ?>" class="btn btn-default">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="<?php echo base_url() . 'theme/images/slider-2.jpg' ?>" alt="Second slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Guru Bekualitas Tinggi</h1>
                            <h4>Guru merupakan faktor penting dalam proses belajar-mengajar.<br> Itulah kenapa kami mendatangkan guru-guru <br>terbaik dari berbagai penjuru.</h4>
                            <div class="slider-btn">
                                <a href="<?php echo site_url('guru'); ?>" class="btn btn-default">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="<?php echo base_url() . 'theme/images/slider-3.jpg' ?>" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Proses Belajar Interatif</h1>
                            <h4>Kami membuat proses belajar mengajar menjadi lebih interatif.<br> dengan demikian siswa lebih menyukai <br>proses belajar.</h4>
                            <div class="slider-btn">
                                <a href="<?php echo site_url('galeri'); ?>" class="btn btn-default">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <i class="icon-arrow-left fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <i class="icon-arrow-right fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div> -->

            <div id="carousel-berita" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < count($galeriHeaderArray); $i++) { ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" <?php echo ($i == 0) ? 'class="active"' : ''; ?>></li>
                    <?php } ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($galeriHeaderArray as $key => $image) { ?>
                        <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
                            <img class="d-block w-100" src="<?php echo base_url($image); ?>" alt="Slide <?php echo $key; ?>">
                        </div>
                    <?php } ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-berita" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-berita" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!--//END HEADER -->
    <!--============================= ABOUT =============================-->
    <section class="clearfix about about-style2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- <h2>Welcome</h2> -->
                    <!-- <p>Kami Menyambut baik terbitnya Website MSCHOOL yang baru , dengan harapan dipublikasinya website ini sekolah berharap : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat. </p> -->
                    <h2>Selamat Datang Di GKJ Tangerang</h2>
                    <?php foreach ($sejarah->result() as $row) : ?>
                        <!-- <?php echo limit_words($row->tulisan_isi, 50) . '...'; ?> -->
                        <?php echo limit_sentences($row->tulisan_isi, 2); ?>
                    <?php endforeach; ?>

                </div>
                <div class="col-md-4">
                    <!-- <img src="<?php echo base_url() . 'theme/images/welcome.png' ?>" class="img-fluid about-img" alt="#"> -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <!-- <div class="courses_box mb-4">
                        <p>Coba Isi. </p>
                    </div> -->
                        <div class="card pt-4 p-4" style="width: 18rem;background-color:#ddd">
                            <div class="card-body">
                                <h3 class="card-title pb-4">Jadwal Ibadah</h3>
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Jadwal Ibadah subtitle</h6> -->
                                <?php foreach ($jadwal_ibadah->result() as $row) : ?>
                                    <h6 class="card-text"><?php echo $row->jadwal_ibadah_jam; ?><a> WIB </a><a> - </a><?php echo $row->jadwal_ibadah_judul; ?></h6>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-left">
                    <!-- <a href="<?php echo site_url('about'); ?>" class="btn btn-default btn-courses">Selanjutnya</a> -->
                    <a href="<?php echo site_url('tentang/halaman/sejarah'); ?>" class="btn btn-default btn-courses">Selanjutnya</a>
                </div>
            </div>
        </div>
    </section>
    <!--//END ABOUT -->
    <!--============================= OUR COURSES =============================-->
    <section class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Artikel Terbaru</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($berita->result() as $row) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="courses_box mb-4">
                            <div class="course-img-wrap">
                                <img src="<?php echo base_url() . 'assets/images/' . $row->tulisan_gambar; ?>" class="img-fluid" alt="courses-img">
                            </div>
                            <!-- // end .course-img-wrap -->
                            <!-- <a href="<?php echo site_url('blog/' . $row->tulisan_slug); ?>" class="course-box-content">
                        <h3 style="text-align:center;"><?php echo $row->tulisan_judul; ?></h3>
                    </a> -->
                            <a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>" class="course-box-content">
                                <h3 style="text-align:center;"><?php echo $row->tulisan_judul; ?></h3>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- <a href="<?php echo site_url('artikel'); ?>" class="btn btn-default btn-courses">View More</a> -->
                    <!-- <a href="<?php echo site_url('blog'); ?>" class="btn btn-default btn-courses">View More</a> -->
                    <a href="<?php echo site_url('blog'); ?>" class="btn btn-default btn-courses">Selanjutnya</a>
                </div>
            </div>
        </div>
    </section>
    <!--//END OUR COURSES -->
    <!--============================= EVENTS =============================-->
    <section class="event">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-md-12">
                        <h2>Renungan</h2>
                    </div>
                    <div class="event-img2">
                        <?php foreach ($renungan->result() as $row) : ?>
                            <div class="row">
                                <div class="col-sm-3"> <img src="<?php echo base_url() . 'theme/images/announcement-icon.png' ?>" class="img-fluid" alt="event-img"></div><!-- // end .col-sm-3 -->
                                <!-- <div class="col-sm-9"> <h3><a href="<?php echo site_url('renungan'); ?>"><?php echo $row->renungan_judul; ?></a></h3> -->
                                <div class="col-sm-9">
                                    <!-- <h3><a href="<?php echo site_url('informasi/halaman/renungan'); ?>"><?php echo $row->renungan_judul; ?></a></h3> -->
                                    <h3><a href="<?php echo site_url('renungan/halaman/'.str_replace(" ","-",$row->renungan_judul));?>"><?php echo $row->renungan_judul;?></a></h3>
                                    <span><?php echo $row->tanggal; ?></span>
                                    <p><?php echo limit_words($row->renungan_deskripsi, 10) . '...'; ?></p>

                                </div><!-- // end .col-sm-7 -->
                            </div><!-- // end .row -->
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="col-md-12">
                        <h2>Agenda</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($agenda->result() as $row): ?>
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p><?php echo date("d", strtotime($row->agenda_selesai)); ?></p>
                                        <span><?php echo date("M. y", strtotime($row->agenda_selesai)); ?></span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <!-- <h3><a href="<?php echo site_url('agenda'); ?>"><?php echo $row->agenda_nama; ?></a></h3> -->
                                    <h3><a href="<?php echo site_url('informasi/halaman/agenda'); ?>"><?php echo $row->agenda_nama; ?></a></h3>
                                    <p><?php echo limit_words($row->agenda_deskripsi, 10) . '...'; ?></p>
                                    <hr class="event_line">
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--//END EVENTS -->
    <!--============================= DETAILED CHART =============================-->
    <!-- <div class="detailed_chart">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                <div class="chart-img">
                    <img src="<?php echo base_url() . 'theme/images/chart-icon_3.png' ?>" class="img-fluid" alt="chart_icon">
                </div>
                <div class="chart-text">
                    <p><span class="counter"><?php echo $tot_pengumuman; ?></span> Pengumuman
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="chart-img">
                    <img src="<?php echo base_url() . 'theme/images/chart-icon_4.png' ?>" class="img-fluid" alt="chart_icon">
                </div>
                <div class="chart-text">
                    <p><span class="counter"><?php echo $tot_agenda; ?></span> Agenda</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
    <!--//END DETAILED CHART -->
    <!--============================= FOOTER =============================-->

    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <script src="<?php echo base_url() . 'theme/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/tether.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/bootstrap.min.js' ?>"></script>
    <!-- Plugins -->
    <script src="<?php echo base_url() . 'theme/js/slick.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/waypoints.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/counterup.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/owl.carousel.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/validate.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/tweetie.min.js' ?>"></script>
    <!-- Subscribe -->
    <script src="<?php echo base_url() . 'theme/js/subscribe.js' ?>"></script>
    <!-- Script JS -->
    <script src="<?php echo base_url() . 'theme/js/script.js' ?>"></script>
</body>

</html>