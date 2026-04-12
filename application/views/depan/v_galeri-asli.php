<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gallery Photo</title>
  <!-- <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>"> -->
  <link rel="shorcut icon" href="<?php echo base_url().'theme/images/logo-gkj-tab.png'?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
  <!-- Simple Line Font -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons.css'?>">
  <!-- Magnific Popup CSS -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/magnific-popup.css'?>">
  <!-- Image Hover CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/normalize.css'?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/set2.css'?>" />

  <!-- Masonry Gallery -->
  <link href="<?php echo base_url().'theme/css/animated-masonry-gallery.css'?>" rel="stylesheet" type="text/css" />
  <!-- Main CSS -->
  <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
</head>

<body>
  <!--============================= HEADER =============================-->
  <div class="header-topbar">
      <div class="container">
          <!-- <div class="row">
              <div class="col-xs-6 col-sm-8 col-md-9">
                  <div class="header-top_address">
                      <div class="header-top_list">
                          <span class="icon-phone"></span>00 55 22 66
                      </div>
                      <div class="header-top_list">
                          <span class="icon-envelope-open"></span>info@mschool.com
                      </div>
                      <div class="header-top_list">
                          <span class="icon-location-pin"></span>Padang, Sumatera Barat, INA. 11001
                      </div>
                  </div>
                  <div class="header-top_login2">
                      <a href="<?php echo site_url('contact');?>">Hubungi Kami</a>
                  </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="header-top_login mr-sm-3">
                      <a href="<?php echo site_url('contact');?>">Hubungi Kami</a>
                  </div>
              </div>
          </div> -->
      </div>
  </div>
  <div data-toggle="affix" style="border-bottom:solid 1px #f2f2f2;">
      <div class="container nav-menu2">
          <div class="row">
              <div class="col-md-12">
                  <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                      <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                          <span class="icon-menu"></span>
                      </button>
                      <!-- <a href="<?php echo site_url('');?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="200px;" src="<?php echo base_url().'theme/images/logo-dark.png'?>"></a> -->
                      <a href="<?php echo site_url('');?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="200px;" src="<?php echo base_url().'theme/images/logo-gkj-header-dark.png'?>"></a>
                      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                          <!-- <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('');?>">Home</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('about');?>">About</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('guru');?>">Guru</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('siswa');?>">Siswa</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('blog');?>">Blog</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('pengumuman');?>">Pengumuman</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('agenda');?>">Agenda</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('download');?>">Download</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('galeri');?>">Gallery</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('contact');?>">Contact</a>
                              </li>
                        </ul> -->

                            <!-- <?php foreach ($menu->result() as $indexAllMenu) :?>
                              <ul class="navbar-nav">
                                <li class="nav-item">
                                  <a class="nav-link js-scroll-trigger" href="<?php echo base_url().$indexAllMenu->menu_href;?>"><?php echo $indexAllMenu->menu_name;?></a>
                                </li>
                              </ul>
                            <?php endforeach;?> -->

                            <!-- <?php foreach ($menu->result() as $indexAllMenu) :?>
                              <ul class="nav navbar-nav">
                                <li class="dropdown">
                                  <a class="nav-link js-scroll-trigger" href="<?php echo base_url().$indexAllMenu->menu_href;?>"><?php echo $indexAllMenu->menu_name; ?></a>
                                  <?php
                                      $sub_menu=$indexAllMenu->id_menu;
                                      $query=$this->db->query("SELECT * FROM tbl_sub_menu WHERE id_menu = $sub_menu AND sub_menu_status='1'");
                                  ?>
                                  <?php if (!empty($query)): ?>
                                    <?php foreach ($query->result() as $res) :?>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($query->result() as $submenu): ?>
                                            <li class="dropdown-submenu">
                                              <a class="nav-link js-scroll-trigger" href="<?php echo base_url().$submenu->sub_menu_href;?>"><?php echo $submenu->nama_sub_menu;?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endforeach;?>
                                  <?php endif; ?>
                                </li>
                              </ul>
                            <?php endforeach;?> -->

                            <?php foreach ($menu->result() as $indexAllMenu) :?>
                            <ul class="nav navbar-nav">
                            <?php
                                $sub_menu=$indexAllMenu->id_menu;
                                $query=$this->db->query("SELECT * FROM tbl_sub_menu WHERE id_menu = $sub_menu");
                            ?>
                            <?php if ($query->num_rows() > 0): ?>
                                <li class="dropdown">
                                <a class="nav-link js-scroll-trigger" href="#"><?php echo $indexAllMenu->menu_name; ?></a>
                                    <?php if (!empty($query)): ?>
                                        <?php foreach ($query->result() as $res) :?>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($query->result() as $submenu): ?>
                                                    <li>
                                                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url().$submenu->sub_menu_href;?>"><?php echo $submenu->nama_sub_menu;?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endforeach;?>
                                    <?php endif; ?>
                                </li>
                            <?php else: ?>
                                <li><a class="nav-link js-scroll-trigger" href="<?php echo base_url().$indexAllMenu->menu_href;?>"><?php echo $indexAllMenu->menu_name; ?></a></li>
                            <?php endif; ?>
                            </ul>
                            <?php endforeach;?>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
    <section>
</section>
<!--//END HEADER -->
  <!--============================= Gallery =============================-->
  <div class="gallery-wrap">
    <div class="container">
<!-- Style 2 -->
<div class="row">
  <div class="col-md-12">
    <!-- <h3 class="gallery-style">Gallery Photo</h3> -->
    <h2 class="gallery-style">Gallery Photo</h2>
  </div>
</div><br>
<!-- <div class="row">
  <div class="col-md-12">
    <div id="gallery">
      <div id="gallery-content">
        <div id="gallery-content-center">
          <?php foreach ($all_galeri->result() as $row) : ?>
            <a href="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="image-link2">
             <img src="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="all img-fluid" alt="#" />
            </a>
          <?php endforeach;?>
       </div>
     </div>
   </div>
 </div>
</div> -->

<div class="row">
                <?php foreach ($all_galeri->result() as $row) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="admission_insruction">
                          <a href="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="image-link2">
             <img src="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="all img-fluid" alt="#" />
            </a>
                        </div>
                    </div>
                <?php endforeach;?>
              </div><br>
<nav><?php echo $page;?></nav>
<!--//End Style 2 -->

</div>
</div>
<!--//End Gallery -->
<!--============================= FOOTER =============================-->

    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/tether.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
    <!-- Plugins -->
    <script src="<?php echo base_url().'theme/js/slick.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/waypoints.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/counterup.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/owl.carousel.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/validate.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/tweetie.min.js'?>"></script>
    <!-- Subscribe -->
    <script src="<?php echo base_url().'theme/js/subscribe.js'?>"></script>

    <script src="<?php echo base_url().'theme/js/jquery-ui-1.10.4.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/jquery.isotope.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/animated-masonry-gallery.js'?>"></script>
    <!-- Magnific popup JS -->
    <script src="<?php echo base_url().'theme/js/jquery.magnific-popup.js'?>"></script>
    <!-- Script JS -->
    <script src="<?php echo base_url().'theme/js/script.js'?>"></script>

  </body>

  </html>
