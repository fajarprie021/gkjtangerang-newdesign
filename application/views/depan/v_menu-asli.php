<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <title>Pengumuman</title> -->
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
    <!-- Calendar Css -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/fullcalendar.min.css'?>" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
</head>
<body>
<div class="header-topbar">
    <div class="container">
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
                    <a href="<?php echo site_url('');?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="200px;" src="<?php echo base_url().'theme/images/logo-gkj-header-dark.png'?>"></a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <?php foreach ($menu->result() as $indexAllMenu) :?>
                            <ul class="nav navbar-nav">
                            <?php
                                $sub_menu=$indexAllMenu->id_menu;
                                $query=$this->db->query("SELECT * FROM tbl_sub_menu WHERE id_menu = $sub_menu");
                            ?>
                            <?php if ($query->num_rows() > 0): ?>
                                <li class="dropdown">
                                <!-- <a class="nav-link js-scroll-trigger" href="#"><?php echo $indexAllMenu->menu_name; ?></a> -->
                                <a href="#" class="nav-link js-scroll-trigger dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $indexAllMenu->menu_name; ?><span class="caret"></span></a>
                                    <?php if (!empty($query)): ?>
                                        <!-- <?php foreach ($query->result() as $res) :?>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($query->result() as $submenu): ?>
                                                    <li>
                                                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url().'blog/kategori/'.$submenu->sub_menu_href;?>"><?php echo $submenu->nama_sub_menu;?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endforeach;?> -->
                                        <ul class="dropdown-menu  sub-menu">
                                            <!-- <?php foreach($query->result() as $submenu) { ?>
                                            <li class="sub-active"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('blog/kategori/'.$submenu->sub_menu_href) ?>">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $submenu->nama_sub_menu ?></a></li>
                                            <?php } ?>  -->
                                            <?php foreach($query->result() as $submenu) { ?>
                                                <?php if ($submenu->id_halaman == 1): ?>
                                                    <!-- <li class="sub-active"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('blog/kategori/'.$submenu->sub_menu_href) ?>">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $submenu->nama_sub_menu ?></a></li> -->
                                                    <?php if ($submenu->sub_menu_href == 'berita'): ?>
                                                        <li class="sub-active"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('blog') ?>">
                                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $submenu->nama_sub_menu ?></a></li>
                                                    <?php else: ?>
                                                        <li class="sub-active"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('blog/kategori/'.$submenu->sub_menu_href) ?>">
                                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $submenu->nama_sub_menu ?></a></li>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                        <li class="sub-active"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('informasi/halaman/'.$submenu->sub_menu_href) ?>">
                                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $submenu->nama_sub_menu ?></a></li>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </ul>
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
</body>

</html>