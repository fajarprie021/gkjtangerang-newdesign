<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact</title>
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
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
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
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.618940227314!2d106.64112217504568!3d-6.1817284605710086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f927b69c0bc9%3A0xf454ec694d6433e8!2sGKJ%20Tangerang!5e0!3m2!1sid!2sid!4v1714467815763!5m2!1sid!2sid" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Hubungi Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 contact-option">
                            <div class="contact-option_rsp">
                                <h3>Tinggalkan Pesan</h3>
                                <form action="<?php echo site_url('contact/kirim_pesan');?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="xnama" required>
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="xemail" required>
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone" name="xphone" required>
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <textarea placeholder="Message" class="form-control" name="xmessage" required rows="5"></textarea>
                                    </div>
                                    <!-- // end .form-group -->
                                    <button type="submit" class="btn btn-default btn-submit">SUBMIT</button>
                                    <div><?php echo $this->session->flashdata('msg');?></div>
                                    <!-- // end #js-contact-result -->
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="contact-address">
                                <h3>Lokasi</h3>
                                <div class="contact-details">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <h6>Alamat</h6>
                                    <!-- <p> Unisco university
                                        <br> Albany, NY
                                        <br> USA. 11001</p> -->
                                        <?php foreach ($alamat->result() as $indexAlamat) :?>
                                              <a><?php echo $indexAlamat->alamat_gereja;?></a>
                                        <?php endforeach;?>
                                    </div>
                                    <br>
                                    <div class="contact-details">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <h6>Email</h6>
                                        <!-- <p>info@unisco.edu
                                            <br> admin@unisco.edu
                                        </p> -->
                                        <?php foreach ($email->result() as $indexEmail) :?>
                                              <a><?php echo $indexEmail->alamat_email;?></a>
                                        <?php endforeach;?>
                                    </div>
                                    <br>
                                    <div class="contact-details">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <h6>Phone</h6>
                                        <!-- <p>+91 555 668 986</p> -->
                                        <?php foreach ($tlp->result() as $indexTlp) :?>
                                              <a><?php echo $indexTlp->no_tlp;?></a>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="contact-center">OR</p>
                </div>
            </div>
        </div>
    </section>
    <!--//END  ABOUT IMAGE -->
    <!--============================= FOOTER =============================-->
    
            <!--//END FOOTER -->
            <!-- jQuery, Bootstrap JS. -->
            <script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/tether.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/owl.carousel.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/validate.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/tweetie.min.js'?>"></script>
            <!-- Subscribe / Contact-->
            <script src="<?php echo base_url().'theme/js/subscribe.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/contact.js'?>"></script>
            <!-- Script JS -->
            <script src="<?php echo base_url().'theme/js/script.js'?>"></script>
        </body>

        </html>
