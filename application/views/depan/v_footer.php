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
<div class="scroll-img scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></div>

<div class="text-left text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Links  -->
  <section class="" style="background-color: rgba(0, 0, 0, 0.05);">
    <div class="container">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-0">
        <div class="row">
          <div class="col-md-13 col-lg-13 col-xl-13 pl-3 pr-2">
          <?php foreach ($tlp->result() as $indexTlp) :?>
            <small class="text-muted"><span class="icon-phone pr-1"></span><a><?php echo $indexTlp->no_tlp;?></a>
                              <?php endforeach;?></small>
          </div>
          <div class="col-md-13 col-lg-13 col-xl-13">
          <?php foreach ($email->result() as $indexEmail) :?>
                              <small class="text-muted"><span class="icon-envelope-open pr-1"></span><a><?php echo $indexEmail->alamat_email;?></a>
                            <?php endforeach;?></small>
          </div>
          </div>
        <div class="col-md-13 col-lg-13 col-xl-13">
        <small class="text-muted"><?php foreach ($alamat->result() as $indexAlamat) :?>
          <span class="icon-location-pin pr-1"></span><a><?php echo $indexAlamat->alamat_gereja;?></a>
                            <?php endforeach;?></small>
        </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-0">
        <div class="col-md-13 col-lg-13 col-xl-13">
        <!-- <a class="fa fa-facebook-f" href="#!"></a>
        <a class="fa fa-instagram" href="#!"></a>
        <a class="fa fa-youtube" href="#!"></a> -->
        <?php
          $query_sosmed=$this->db->query("SELECT * FROM tbl_sosial_media WHERE sosial_media_status='1' ORDER BY id_sosial_media ASC");
        ?>
        <?php foreach($query_sosmed->result() as $sosmed) { ?>
          <a class="m-1 <?php echo $sosmed->sosial_media_icon;?>" href="<?php echo $sosmed->sosial_media_href;?>" target="_blank"></a>
        <?php } ?>
        </div>
        <div class="col-md-13 col-lg-13 col-xl-13">
        <small class="text-muted">Pengunjung Bulan Lalu <?php echo $jmlBlnLalu;?> || Pengunjung Bulan Ini <?php echo $jmlBlnIni;?></small>
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

 </body>
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