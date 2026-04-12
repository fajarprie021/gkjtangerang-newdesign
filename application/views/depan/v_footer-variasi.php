<?php
    $queryBlnLalu=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
    $jmlBlnLalu=$queryBlnLalu->num_rows();
?>
<?php
    $queryBlnIni=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
    $jmlBlnIni=$queryBlnIni->num_rows();
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  .footer-up {
    padding: 10px;
    background: #2d2d2d;
  }
</style>
<style type="text/css">
  .footer-down {
    padding-top: 20px;
    background: #2d2d2d;
  }
</style>
<body>
  <!-- Start Scrolling -->

<div class="scroll-img scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></div>


<!-- End Scrolling -->
<!-- <button class="btn btn-primary scroll-top" data-scroll="up" type="button">
<i class="fa fa-chevron-up"></i>
</button> -->
 </body>

<!-- Footer -->
<div class="text-left text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Links  -->
  <section class="" style="background-color: rgba(0, 0, 0, 0.05);">
    <div class="container">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-0">
        <div class="col-md-13 col-lg-13 col-xl-13">
        <?php foreach ($tlp->result() as $indexTlp) :?>
          <small class="text-muted"><a class="icon-phone"><?php echo $indexTlp->no_tlp;?></a>
                            <?php endforeach;?></small>
                            <?php foreach ($email->result() as $indexEmail) :?>
                              <small class="text-muted"><a class="icon-envelope-open"><?php echo $indexEmail->alamat_email;?></a>
                            <?php endforeach;?></small>
                            </div>
        <div class="col-md-13 col-lg-13 col-xl-13">
        <small class="text-muted"><?php foreach ($alamat->result() as $indexAlamat) :?>
                                  <a class="icon-location-pin"><?php echo $indexAlamat->alamat_gereja;?></a>
                            <?php endforeach;?></small>
        </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-0">
        <div class="col-md-13 col-lg-13 col-xl-13">
        <a class="fa fa-facebook-f" href="#!"></a>
        <a class="fa fa-instagram" href="#!"></a>
        <a class="fa fa-youtube" href="#!"></a>
        </div>
        <div class="col-md-13 col-lg-13 col-xl-13">
        <small class="text-muted">Pengunjung Bulan Lalu <?php echo $jmlBlnLalu;?> || Pengunjung Bulan Ini <?php echo $jmlBlnLalu;?></small>
        </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-0">

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto">
          
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
</div>
<!-- Footer -->

<div class="text-left text-lg-start bg-body-tertiary text-muted">
  <section class="" style="background-color: rgba(45, 45, 45, 1);">
    <div class="container text-center text-md-start mt-0 pt-1 pb-3">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-13 col-lg-13 col-xl-13 mx-auto mb-0 text_copyright">
        <?php foreach ($identitas->result() as $indexIdentitas) :?>
                                  <?php echo date('Y');?> © copyright by <a href="<?php echo $indexIdentitas->website_identitas;?>" target="_blank"><?php echo $indexIdentitas->nama_identitas;?></a>
                            <?php endforeach;?>. All rights reserved.
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>theme/js/bootstrap.min.js"></script>
<link rel="stylesheet" src="<?php echo base_url() ?>theme/css/scroll-to-top.css">
<style>
    .text_pengunjung
    {
        font-family:    Arial, Helvetica, sans-serif;
        font-size:      12px;
        font-weight:    bold;
    }
</style>
<style>
    .text_copyright
    {
        font-family:    Arial, Helvetica, sans-serif;
        font-size:      80%;
        color: #f2f2f2;
    }
</style>
<style>
    .scroll-img{
      position: fixed;
      width: 40px;
      height: 40px;
      line-height: 44px;
      text-align: center;
      background: #0099cc;
      right: 3%;
      bottom: 10%;
      cursor: pointer;
      z-index: 99;
    }
      .scroll-img .fa{
        font-size: 24px;
        color: #fff;
    }
</style>
<script>
$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });

    $('.scroll-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 100);
        return false;
    });

});
</script>
</html>