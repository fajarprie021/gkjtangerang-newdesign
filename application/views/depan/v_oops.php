<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog</title>
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
    <!-- Owl Carousel -->
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

    <!--//END HEADER -->
    <!--============================= BLOG =============================-->
    <section class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-header text-left">
                        <!-- <h2><?php echo $nama_kategori ?></h2> -->
                        <!-- <p class="alert alert-success">Oops... Mohon maaf, halaman tidak ditemukan.<br><br> <a href="<?php echo base_url() ?>" class="btn btn-warning"><i class="fa fa-home"></i> Kembali ke Beranda</a></p> -->
                        <!-- <p class="alert alert-danger">Tidak Ada artikel untuk kategori <?php echo $nama_kategori ?></p> -->
                        <p class="alert alert-danger"><?php echo $pesan ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="<?php echo site_url('blog/search'); ?>" method="get">
                        <input type="text" name="keyword" placeholder="Search" class="blog-search" required>
                        <button type="submit" class="btn btn-warning btn-blogsearch">SEARCH</button>
                    </form>
                    <div class="blog-category_block">
                        <!-- <h3>Kategori</h3>
                  <ul>
                    <?php foreach ($category->result() as $row) : ?>
                      <li><a href="<?php echo site_url('blog/kategori/' . str_replace(" ", "-", $row->kategori_nama)); ?>"><?php echo $row->kategori_nama; ?><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                    <?php endforeach; ?>
                  </ul> -->
                    </div>
                    <div class="blog-featured_post">
                        <h3>Populer</h3>
                        <?php foreach ($populer->result() as $row) : ?>
                            <div class="blog-featured-img_block">
                                <img width="35%" src="<?php echo base_url() . 'assets/images/' . $row->tulisan_gambar; ?>" class="img-fluid" alt="blog-featured-img">
                                <h5><a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>"><?php echo limit_words($row->tulisan_judul, 3) . '...'; ?></a></h5>
                                <p><?php echo limit_words($row->tulisan_isi, 5) . '...'; ?></p>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--//END BLOG -->
    <!--============================= FOOTER =============================-->

    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <script src="<?php echo base_url() . 'theme/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/tether.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/bootstrap.min.js' ?>"></script>
    <!-- Plugins -->
    <script src="<?php echo base_url() . 'theme/js/owl.carousel.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/validate.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/tweetie.min.js' ?>"></script>
    <!-- Subscribe -->
    <script src="<?php echo base_url() . 'theme/js/subscribe.js' ?>"></script>
    <!-- Script JS -->
    <script src="<?php echo base_url() . 'theme/js/script.js' ?>"></script>
</body>

</html>