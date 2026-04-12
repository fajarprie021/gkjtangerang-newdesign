<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  .alamat p {
  color: #c4c4c4;
  padding: 16px 0 0;
  font-size: 2px; 
  }
</style>
<body>
	<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="foot-logo">
                    <a href="<?php echo site_url();?>">
                        <!-- <img src="<?php echo base_url().'theme/images/logo-white.png'?>" class="img-fluid" alt="footer_logo"> -->
                        <img src="<?php echo base_url().'theme/images/logo-gkj-footer-white.png'?>" class="img-fluid" alt="footer_logo">
                    </a>
                    <!-- <p><?php echo date('Y');?> © copyright by <a href="http://mfikri.com" target="_blank">GKJ TANGERANG</a>. <br>All rights reserved.</p> -->
                    <p><?php foreach ($identitas->result() as $indexIdentitas) :?>
                                  <?php echo date('Y');?> © copyright by <a href="<?php echo $indexIdentitas->website_identitas;?>" target="_blank"><?php echo $indexIdentitas->nama_identitas;?></a>
                            <?php endforeach;?>. All rights reserved.
                        </p>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="sitemap">
                        <h3>Menu Utama</h3>
                        <ul>
                            <?php foreach ($menu->result() as $indexAllMenu) :?>
                                <li>
                                    <a href="<?php echo base_url().$indexAllMenu->menu_href;?>"><?php echo $indexAllMenu->menu_name;?></a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div> -->
                <div class="col-md-3">
                    <div class="address">
                        <h3>Hubungi Kami</h3>
                        <p><span>Alamat: </span> 
                        <?php foreach ($alamat->result() as $indexAlamat) :?>
                                  <a><?php echo $indexAlamat->alamat_gereja;?></a>
                            <?php endforeach;?>
                        </p>
                        <p>Email : 
                            <?php foreach ($email->result() as $indexEmail) :?>
                                  <a><?php echo $indexEmail->alamat_email;?></a>
                            <?php endforeach;?>
                            <br> Phone : 
                        <?php foreach ($tlp->result() as $indexTlp) :?>
                                  <a><?php echo $indexTlp->no_tlp;?></a>
                            <?php endforeach;?>
                        </p>
                            <ul class="footer-social-icons">
                                <li><a href="#"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram fa-in" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube fa-in" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
 </body>

</html>