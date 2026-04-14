<?php
    if(!function_exists('limit_words')) {
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    }
?>
<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-7xl">
    
    <div class="mb-12">
        <a href="<?php echo site_url('blog'); ?>" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-primary transition hover:text-secondary mb-6">
            <span class="material-symbols-outlined text-sm border border-primary/30 rounded-full p-2 transition">arrow_back</span>
            KEMBALI KE WARTA
        </a>
    </div>

    <div class="flex flex-col lg:flex-row gap-12">
      <!-- Main Content -->
      <div class="w-full lg:w-2/3">
        
        <!-- Article Header -->
        <div class="mb-10">
            <h1 class="font-headline text-4xl lg:text-5xl leading-tight text-primary mb-6"><?php echo $title;?></h1>
            <div class="flex flex-wrap items-center gap-6 text-sm text-muted font-serif">
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-sm">calendar_today</span> <?php echo $tanggal;?></span>
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-sm">person</span> <?php echo $author;?></span>
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-sm">label</span> <?php echo $kategori;?></span>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="mb-12 overflow-hidden shadow-soft">
            <img src="<?php echo base_url().'assets/images/'.$image?>" class="w-full h-auto object-cover" alt="<?php echo $title;?>">
        </div>

        <!-- Content -->
        <div class="prose max-w-none text-muted leading-loose font-serif prose-headings:font-headline prose-headings:text-primary prose-a:text-secondary mb-16">
            <?php echo $blog;?>
        </div>

        <!-- Share Block -->
        <div class="border-t border-b border-primary/20 py-6 mb-12 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h5 class="font-headline text-primary tracking-widest text-sm uppercase">Bagikan Ke:</h5>
            <div class="sharePopup"></div>
        </div>

        <!-- Comments Section -->
        <div>
            <h3 class="font-headline text-2xl text-primary mb-10">Komentar</h3>
            <?php echo $this->session->flashdata('msg');?>

            <div class="space-y-8 mb-16">
                <!-- Komentar Loop -->
                <?php
                $colors = array('#ff9e67', '#10bdff', '#14b5c7', '#f98182', '#8f9ce2', '#ee2b33', '#d4ec15', '#613021');
                foreach ($show_komentar->result() as $row) :
                shuffle($colors);
                ?>
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-xl flex-shrink-0" style="background-color:<?php echo reset($colors);?>;">
                        <?php echo substr($row->komentar_nama,0,1);?>
                    </div>
                    <div class="flex-1 bg-white p-6 shadow-soft">
                        <div class="flex justify-between items-center mb-2 flex-wrap">
                            <h6 class="font-bold text-primary mr-4"><?php echo $row->komentar_nama;?></h6>
                            <small class="text-muted italic text-xs"><?php echo date("d M Y H:i", strtotime($row->komentar_tanggal));?></small>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed"><?php echo nl2br($row->komentar_isi);?></p>
                    </div>
                </div>

                    <!-- Anak Komentar (Balasan) -->
                    <?php
                    $komentar_id=$row->komentar_id;
                    $query=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='1' AND komentar_parent='$komentar_id' ORDER BY komentar_id ASC");
                    foreach ($query->result() as $res) :
                    shuffle($colors);
                    ?>
                    <div class="flex gap-4 ml-12 mt-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0" style="background-color:<?php echo reset($colors);?>;">
                            <?php echo substr($res->komentar_nama,0,1);?>
                        </div>
                        <div class="flex-1 bg-primary/5 p-5 shadow-inner border border-primary/10">
                            <div class="flex justify-between items-center mb-2 flex-wrap">
                                <h6 class="font-bold text-primary text-sm mr-4"><?php echo $res->komentar_nama;?></h6>
                                <small class="text-muted italic text-[10px]"><?php echo date("d M Y H:i", strtotime($res->komentar_tanggal));?></small>
                            </div>
                            <p class="text-sm text-gray-700 leading-relaxed"><?php echo nl2br($res->komentar_isi);?></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                <?php endforeach;?>
            </div>

            <!-- Form -->
            <div class="bg-white p-8 shadow-soft">
                <h3 class="font-headline text-xl text-primary mb-6">Tinggalkan Komentar</h3>
                <form action="<?php echo site_url('blog/komentar');?>" method="post" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary mb-2">Nama Lengkap</label>
                            <input type="text" name="nama" class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-secondary transition" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary mb-2">Email</label>
                            <input type="email" name="email" class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-secondary transition" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-primary mb-2">Pesan Komentar</label>
                        <textarea name="komentar" rows="5" class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-secondary transition" required></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id;?>" required>
                    <button type="submit" class="bg-secondary px-8 py-4 text-xs font-bold uppercase tracking-[0.2em] text-white transition hover:bg-primary">Kirim Komentar</button>
                </form>
            </div>
        </div>

      </div>

      <!-- Sidebar -->
      <div class="w-full lg:w-1/3 space-y-12">
        <!-- Search -->
        <div class="bg-white p-8 shadow-soft">
          <h3 class="font-headline text-2xl text-primary mb-6">Pencarian</h3>
          <form action="<?php echo site_url('blog/search');?>" method="get" class="flex">
              <input type="text" name="keyword" placeholder="Cari artikel..." class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-secondary" required>
              <button type="submit" class="bg-secondary px-6 text-white hover:bg-primary transition"><span class="material-symbols-outlined">search</span></button>
          </form>
        </div>

        <!-- Kategori -->
        <div class="bg-white p-8 shadow-soft">
          <h3 class="font-headline text-2xl text-primary mb-6">Kategori</h3>
          <ul class="space-y-3">
            <?php foreach ($category->result() as $row) : ?>
              <li>
                <a href="<?php echo site_url('blog/kategori/'.str_replace(" ","-",$row->kategori_nama));?>" class="flex items-center text-muted hover:text-secondary transition text-sm">
                  <span class="material-symbols-outlined text-sm mr-2">chevron_right</span>
                  <?php echo $row->kategori_nama;?>
                </a>
              </li>
            <?php endforeach;?>
          </ul>
        </div>

        <!-- Populer -->
        <div class="bg-white p-8 shadow-soft">
          <h3 class="font-headline text-2xl text-primary mb-6">Populer</h3>
          <div class="space-y-6">
            <?php foreach ($populer->result() as $row) :?>
              <div class="flex gap-4 group cursor-pointer" onclick="window.location.href='<?php echo site_url('artikel/'.$row->tulisan_slug);?>'">
                  <div class="w-24 h-24 flex-shrink-0 overflow-hidden">
                    <img src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Thumbnail">
                  </div>
                  <div>
                    <h5 class="font-headline text-primary text-sm leading-snug group-hover:text-secondary transition line-clamp-2 mb-2">
                        <a href="<?php echo site_url('artikel/'.$row->tulisan_slug);?>"><?php echo $row->tulisan_judul;?></a>
                    </h5>
                    <p class="text-xs text-muted line-clamp-2"><?php echo strip_tags($row->tulisan_isi);?></p>
                  </div>
              </div>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Script/Plugins lokal untuk Social Share Detail Artikel -->
<link href="<?php echo base_url().'theme/css/jssocials.css'?>" rel="stylesheet">
<link href="<?php echo base_url().'theme/css/jssocials-theme-flat.css'?>" rel="stylesheet">
<style>
.sharePopup { font-size: 11px; }
.sharePopup a { font-size: 11px; color: #fff; text-decoration: none; }
</style>
<script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'theme/js/jssocials.js'?>"></script>
<script>
  $(document).ready(function(){
    $(".sharePopup").jsSocials({
          showCount: true,
          showLabel: true,
          shareIn: "popup",
          shares: [
          { share: "twitter", label: "Twitter" },
          { share: "facebook", label: "Facebook" },
          { share: "googleplus", label: "Google+" },
          { share: "linkedin", label: "Linked In" },
          { share: "whatsapp", label: "WhatsApp" }
          ]
    });
  });
</script>
