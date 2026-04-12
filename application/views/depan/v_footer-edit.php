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
<div class="footer-up">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-8 col-md-9">
                    <div class="header-top_address">
                        <div class="header-top_list">
                            <span class="icon-phone"></span>
                            <?php foreach ($tlp->result() as $indexTlp) :?>
                                  <a><?php echo $indexTlp->no_tlp;?></a>
                            <?php endforeach;?>
                        </div>
                        <div class="header-top_list">
                            <span class="icon-envelope-open"></span>
                            <?php foreach ($email->result() as $indexEmail) :?>
                                  <a><?php echo $indexEmail->alamat_email;?></a>
                            <?php endforeach;?>
                        </div>
                        <div class="header-top_list">
                            <span class="icon-location-pin"></span>
                            <?php foreach ($alamat->result() as $indexAlamat) :?>
                                  <a><?php echo $indexAlamat->alamat_gereja;?></a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <!-- <div class="header-top_login2">
                        <a href="<?php echo site_url('contact');?>">Hubungi Kami</a>
                    </div> -->
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="address">
                            <ul class="footer-social-icons">
                                <li><a href="#"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram fa-in" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube fa-in" aria-hidden="true"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-8 col-md-9">
                <div class="footer-down">
                    <div class="header-top_address">
                        <div class="header-top_list">
                            <?php foreach ($identitas->result() as $indexIdentitas) :?>
                                  <?php echo date('Y');?> © copyright by <a href="<?php echo $indexIdentitas->website_identitas;?>" target="_blank"><?php echo $indexIdentitas->nama_identitas;?></a>
                            <?php endforeach;?>. All rights reserved.
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 pt-2">
                    <div class="card" style="background-color:#ddd">
                        <div class="card-body pt-2 p-2">
                            <!-- <h8 class="card-subtitle mb-2"><small class="text-muted">Pengunjung Bulan Lalu <?php echo $jmlBlnLalu;?></small></h8> -->
                            <!-- <h8 class="card-subtitle mb-2"><small class="text-muted">|| Pengunjung Bulan Ini <?php echo $jmlBlnLalu;?></h8> -->
                            <!-- <h8 class="card-subtitle mb-2"><small class="text-muted">Pengunjung Bulan Lalu <?php echo $jmlBlnLalu;?> || Pengunjung Bulan Ini <?php echo $jmlBlnLalu;?></small></h8> -->
                            <p class="card-text text_pengunjung"><small class="text-muted">Pengunjung Bulan Lalu <?php echo $jmlBlnLalu;?> || Pengunjung Bulan Ini <?php echo $jmlBlnLalu;?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</html>