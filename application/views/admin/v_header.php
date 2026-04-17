<!--Counter Inbox-->
<?php
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();
?>
<header class="main-header">

    <!-- Logo — GKJ Tangerang brand replacing MSCHOOL -->
    <a href="<?php echo base_url('admin/dashboard');?>" class="logo" style="background-color:#1A365D; border-bottom:2px solid #C5A059;">
      <span class="logo-mini" style="font-family:'Cinzel',serif; color:#C5A059; font-weight:700;">GK</span>
      <span class="logo-lg" style="font-family:'Cinzel',serif; color:white; font-weight:700; letter-spacing:0.15em;">GKJ <span style="color:#C5A059;">Tangerang</span></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" style="background-color:#1A365D;">
      <!-- Sidebar toggle button -->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Inbox Messages -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:rgba(255,255,255,0.8);">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $jum_pesan;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda memiliki <?php echo $jum_pesan;?> pesan</li>
              <li>
                <ul class="menu">
                <?php
                    $inbox=$this->db->query("SELECT tbl_inbox.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_inbox WHERE inbox_status='1' ORDER BY inbox_id DESC LIMIT 5");
                    foreach ($inbox->result_array() as $in) :
                        $inbox_id=$in['inbox_id'];
                        $inbox_nama=$in['inbox_nama'];
                        $inbox_tgl=$in['tanggal'];
                        $inbox_pesan=$in['inbox_pesan'];
                ?>
                  <li>
                    <a href="<?php echo base_url().'admin/inbox'?>">
                      <div class="pull-left">
                        <img src="<?php echo base_url().'assets/images/user_blank.png'?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $inbox_nama;?>
                        <small><i class="fa fa-clock-o"></i> <?php echo $inbox_tgl;?></small>
                      </h4>
                      <p><?php echo $inbox_pesan;?></p>
                    </a>
                  </li>
                  <?php endforeach;?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url().'admin/inbox'?>">Lihat Semua Pesan</a></li>
            </ul>
          </li>

          <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:rgba(255,255,255,0.8);">
              <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $c['pengguna_nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header" style="background-color:#1A365D;">
                <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>" class="img-circle" alt="">
                <p style="color:white;">
                  <?php echo $c['pengguna_nama'];?>
                  <?php if($c['pengguna_level']=='1'):?>
                    <small style="color:#C5A059;">Administrator</small>
                  <?php else:?>
                    <small style="color:#C5A059;">Author</small>
                  <?php endif;?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
              </li>
            </ul>
          </li>

          <!-- View Website -->
          <li>
            <a href="<?php echo base_url();?>" target="_blank" title="Lihat Website" style="color:rgba(255,255,255,0.8);">
              <i class="fa fa-globe"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
