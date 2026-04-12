<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <!-- <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>"> -->
    <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'theme/images/logo-gkj-tab.png'?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
    <!-- Ionicons -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
</head>
<!-- <body class="hold-transition skin-blue sidebar-mini"> -->
<body>
<!-- <div class="wrapper"> -->
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
            <li class="active">
                <a href="<?php echo base_url().'admin/dashboard'?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    <small class="label pull-right"></small>
                    </span>
                </a>
            </li>
        </ul>
    <?php foreach ($menu->result() as $indexAllMenu) :?>
        <ul class="sidebar-menu">
            <?php if ($indexAllMenu->id_halaman == 1): ?>
                <?php
                    $sub_menu=$indexAllMenu->id_menu;
                    $query=$this->db->query("SELECT * FROM tbl_sub_menu_admin WHERE id_menu = $sub_menu");
                ?>
                <?php if ($query->num_rows() > 0): ?>
                    <li class="treeview">
                        <a href="#"><i class="<?php echo $indexAllMenu->menu_icon;?>"></i><?php echo ' '.$indexAllMenu->menu_name;?><span></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php foreach($query->result() as $submenu) { $resultReplace_NamePage = preg_replace("/[^a-zA-Z0-9]/", "", $submenu->sub_menu_href);?>
                                <?php if ($submenu->sub_menu_status == 1): ?>
                                    <li><a href="<?php echo base_url('admin/').$resultReplace_NamePage;?>"><i class="<?php echo $submenu->sub_menu_icon;?>"></i><?php echo ' '.$submenu->nama_sub_menu; ?></a></li>
                                <?php endif; ?>
                            <?php } ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="<?php echo base_url('admin/').$indexAllMenu->menu_href;?>"><i class="<?php echo $indexAllMenu->menu_icon;?>"></i><?php echo ' '.$indexAllMenu->menu_name;?></a></li>
                <?php endif; ?>
            <?php else: ?>
                <li><a href="<?php echo base_url('admin/informasi/halaman/').$indexAllMenu->menu_href;?>"><i class="<?php echo $indexAllMenu->menu_icon;?>"></i><?php echo ' '.$indexAllMenu->menu_name;?></a></li>
            <?php endif; ?>
        </ul>
    <?php endforeach;?>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
            <a href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fa fa-sign-out"></i> <span>Sign Out</span>
                <span class="pull-right-container">
                <small class="label pull-right"></small>
                </span>
            </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
    </aside>
<!-- </div> -->
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<?php $this->load->view("admin/modal.php") ?>

<script>

            var lineChartData = {
                labels : <?php echo json_encode($bulan);?>,
                datasets : [

                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($value);?>
                    }

                ]

            }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

        var canvas = new Chart(myLine).Line(lineChartData, {
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.005)",
            scaleGridLineWidth : 0,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : true,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 2,
            datasetStroke : true,
            tooltipCornerRadius: 2,
            datasetStrokeWidth : 2,
            datasetFill : true,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });

        </script>
</body>
</html>