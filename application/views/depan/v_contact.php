<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact</title>
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/logo-gkj-tab.png'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
</head>

<body>
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

        <!-- Bagian contact-form tetap dipertahankan -->
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form">
                    <div class="row justify-content-center">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="contact-address text-center">
                                <h3>Lokasi</h3>
                                <div class="contact-details">
                                    <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                    <h6>Alamat</h6>
                                    <?php foreach ($alamat->result() as $indexAlamat) :?>
                                          <a><?php echo $indexAlamat->alamat_gereja;?></a>
                                    <?php endforeach;?>
                                </div>
                                <br>
                                <div class="contact-details">
                                    <!-- <i class="fa fa-envelope-o" aria-hidden="true"></i> -->
                                    <h6>Email</h6>
                                    <?php foreach ($email->result() as $indexEmail) :?>
                                          <a><?php echo $indexEmail->alamat_email;?></a>
                                    <?php endforeach;?>
                                </div>
                                <br>
                                <div class="contact-details">
                                    <!-- <i class="fa fa-phone" aria-hidden="true"></i> -->
                                    <h6>Phone</h6>
                                    <?php foreach ($tlp->result() as $indexTlp) :?>
                                          <a><?php echo $indexTlp->no_tlp;?></a>
                                    <?php endforeach;?>
                                </div>
                                <br>
                                <div class="contact-details">
                                    <!-- <i class="fa fa-phone" aria-hidden="true"></i> -->
                                    <h6>Sosial Media</h6>
                                    <?php foreach($sosialmedia->result() as $sosmed) { ?>
                                    <a class="text-primary m-1 <?php echo $sosmed->sosial_media_icon;?>" href="<?php echo $sosmed->sosial_media_href;?>" target="_blank"></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian row dipusatkan dengan justify-content-center -->
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <!-- Konten tambahan jika diperlukan -->
            </div>
        </div>

    </div>
  </section>

  <script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
  <script src="<?php echo base_url().'theme/js/tether.min.js'?>"></script>
  <script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
  <script src="<?php echo base_url().'theme/js/owl.carousel.min.js'?>"></script>
  <script src="<?php echo base_url().'theme/js/validate.js'?>"></script>
  <script src="<?php echo base_url().'theme/js/tweetie.min.js'?>"></script>
  <script src="<?php echo base_url().'theme/js/subscribe.js'?>"></script>
  <script src="<?php echo base_url().'theme/js/contact.js'?>"></script>
  <script src="<?php echo base_url().'theme/js/script.js'?>"></script>
</body>

</html>
