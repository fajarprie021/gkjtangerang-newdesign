<?php
    error_reporting(0);
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $query2=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
    $jum_comment=$query2->num_rows();
    $jum_pesan=$query->num_rows();

    /* Mengambil query report*/
    $bulan = [];
    $value = [];
    foreach($visitor as $result){
        $bulan[] = $result->tgl; //ambil bulan
        $value[] = (float) $result->jumlah; //ambil nilai
    }
?>

<div class="space-y-6 animate-fade-in">
    <!-- Header Section -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Dashboard Overview</h1>
            <p class="text-gray-400 text-sm mt-1">Selamat datang kembali, Ringkasan statistik situs Anda.</p>
        </div>
        <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-secondary bg-secondary/10 px-4 py-2 rounded-full border border-secondary/20">
            <span class="material-symbols-outlined text-[16px]">calendar_today</span>
            <span><?php echo date('d M Y'); ?></span>
        </div>
    </div>

    <!-- Info Boxes Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Chrome Box -->
        <?php
            $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Chrome'");
            $jml_chrome=$query->num_rows();
        ?>
        <div class="bg-primary/50 backdrop-blur-sm border border-white/5 p-6 rounded-3xl flex items-center gap-5 transition hover:border-secondary/30 group">
            <div class="w-12 h-12 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-400 group-hover:scale-110 transition">
                <i class="fab fa-chrome text-2xl"></i>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Google Chrome</p>
                <h3 class="text-2xl font-bold text-white"><?php echo number_format($jml_chrome); ?></h3>
            </div>
        </div>

        <!-- Firefox Box -->
        <?php
            $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Firefox' OR pengunjung_perangkat='Mozilla'");
            $jml_firefox=$query->num_rows();
        ?>
        <div class="bg-primary/50 backdrop-blur-sm border border-white/5 p-6 rounded-3xl flex items-center gap-5 transition hover:border-secondary/30 group">
            <div class="w-12 h-12 rounded-2xl bg-orange-500/10 flex items-center justify-center text-orange-400 group-hover:scale-110 transition">
                <i class="fab fa-firefox text-2xl"></i>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Mozilla Firefox</p>
                <h3 class="text-2xl font-bold text-white"><?php echo number_format($jml_firefox); ?></h3>
            </div>
        </div>

        <!-- Safari (Replaced Googlebot with Safari for better consistency) -->
        <?php
            $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Safari'");
            $jml_safari=$query->num_rows();
        ?>
        <div class="bg-primary/50 backdrop-blur-sm border border-white/5 p-6 rounded-3xl flex items-center gap-5 transition hover:border-secondary/30 group">
            <div class="w-12 h-12 rounded-2xl bg-sky-500/10 flex items-center justify-center text-sky-400 group-hover:scale-110 transition">
                <i class="fab fa-safari text-2xl"></i>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Safari Browser</p>
                <h3 class="text-2xl font-bold text-white"><?php echo number_format($jml_safari); ?></h3>
            </div>
        </div>

        <!-- Opera -->
        <?php
            $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Opera'");
            $jml_opera=$query->num_rows();
        ?>
        <div class="bg-primary/50 backdrop-blur-sm border border-white/5 p-6 rounded-3xl flex items-center gap-5 transition hover:border-secondary/30 group">
            <div class="w-12 h-12 rounded-2xl bg-red-500/10 flex items-center justify-center text-red-500 group-hover:scale-110 transition">
                <i class="fab fa-opera text-2xl"></i>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Opera Browser</p>
                <h3 class="text-2xl font-bold text-white"><?php echo number_format($jml_opera); ?></h3>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Chart -->
        <div class="lg:col-span-2 bg-primary/50 backdrop-blur-sm border border-white/5 p-8 rounded-3xl">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-lg font-bold text-white uppercase tracking-widest text-xs">Statistik Pengunjung (Bulan Ini)</h3>
                <span class="text-[10px] text-gray-500">Live Updates</span>
            </div>
            <div class="relative w-full h-[300px]">
                <canvas id="canvas"></canvas>
            </div>
        </div>

        <!-- Popular Posts -->
        <div class="bg-primary/50 backdrop-blur-sm border border-white/5 p-8 rounded-3xl overflow-hidden flex flex-col">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-lg font-bold text-white uppercase tracking-widest text-xs">Artikel Populer</h3>
                <span class="material-symbols-outlined text-secondary text-[20px]">trending_up</span>
            </div>
            <div class="flex-1 space-y-4 overflow-y-auto pr-2 scrollbar-thin">
                <?php
                    $query=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 10");
                    foreach ($query->result_array() as $i) :
                        $tulisan_id=$i['tulisan_id'];
                        $tulisan_judul=$i['tulisan_judul'];
                        $tulisan_views=$i['tulisan_views'];
                ?>
                    <div class="flex items-start gap-4 p-3 rounded-2xl hover:bg-white/5 transition border border-transparent hover:border-white/5 group">
                        <div class="bg-secondary/10 text-secondary text-[10px] font-bold w-10 h-10 rounded-xl flex flex-shrink-0 items-center justify-center border border-secondary/20">
                            <?php echo number_format($tulisan_views); ?>
                        </div>
                        <div class="flex-1">
                            <p class="text-[11px] text-white font-medium line-clamp-1 group-hover:text-secondary transition uppercase tracking-wider"><?php echo $tulisan_judul;?></p>
                            <p class="text-[9px] text-gray-500 mt-1 uppercase tracking-widest font-light">Views Artikel</p>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <!-- Bottom Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Previous Month -->
        <?php
            $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
            $jml_prev=$query->num_rows();
        ?>
        <div class="bg-red-500/5 border border-red-500/10 p-6 rounded-3xl flex items-center justify-between">
            <div>
                <p class="text-[9px] uppercase tracking-widest text-red-400/60 font-bold">Bulan Kemarin</p>
                <h4 class="text-xl font-bold text-red-400 mt-1"><?php echo number_format($jml_prev); ?></h4>
            </div>
            <div class="text-red-400/20">
                <span class="material-symbols-outlined text-[32px]">history</span>
            </div>
        </div>

        <!-- This Month -->
        <?php
            $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
            $jml_now=$query->num_rows();
        ?>
        <div class="bg-green-500/5 border border-green-500/10 p-6 rounded-3xl flex items-center justify-between">
            <div>
                <p class="text-[9px] uppercase tracking-widest text-green-400/60 font-bold">Bulan Ini</p>
                <h4 class="text-xl font-bold text-green-400 mt-1"><?php echo number_format($jml_now); ?></h4>
            </div>
            <div class="text-green-400/20">
                <span class="material-symbols-outlined text-[32px]">trending_up</span>
            </div>
        </div>

        <!-- Total Comments/Inbox -->
        <div class="bg-blue-500/5 border border-blue-500/10 p-6 rounded-3xl flex items-center justify-between">
            <div>
                <p class="text-[9px] uppercase tracking-widest text-blue-400/60 font-bold">Komentar Belum Dibaca</p>
                <h4 class="text-xl font-bold text-blue-400 mt-1"><?php echo number_format($jum_comment); ?></h4>
            </div>
            <div class="text-blue-400/20">
                <span class="material-symbols-outlined text-[32px]">chat</span>
            </div>
        </div>
    </div>
</div>

<!-- Scripts - Injecting into main layout -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<script>
    var lineChartData = {
        labels : <?php echo json_encode($bulan);?>,
        datasets : [
            {
                fillColor: "rgba(226, 177, 71, 0.1)",
                strokeColor: "rgba(226, 177, 71, 1)",
                pointColor: "#E2B147",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(226, 177, 71, 1)",
                data : <?php echo json_encode($value);?>
            }
        ]
    }

    var ctx = document.getElementById("canvas").getContext("2d");
    var myLine = new Chart(ctx).Line(lineChartData, {
        scaleShowGridLines : true,
        scaleGridLineColor : "rgba(255,255,255,.05)",
        scaleGridLineWidth : 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: false,
        bezierCurve : true,
        bezierCurveTension : 0.4,
        pointDot : true,
        pointDotRadius : 5,
        pointDotStrokeWidth : 2,
        pointHitDetectionRadius : 20,
        datasetStroke : true,
        datasetStrokeWidth : 3,
        datasetFill : true,
        responsive: true,
        maintainAspectRatio: false,
        scaleFontColor: "#666",
        scaleFontSize: 10
    });
</script>
