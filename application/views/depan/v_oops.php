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
    
    <div class="mb-16">
      <?php 
      $this->load->view('components/section_header_left', array(
          'eyebrow' => isset($header_subtitle) ? $header_subtitle : 'Informasi',
          'title'   => isset($header_title) ? $header_title : 'WARTA JEMAAT & BLOG'
      )); 
      ?>
    </div>

    <div class="flex flex-col lg:flex-row gap-12">
      <!-- Main Content -->
      <div class="w-full lg:w-2/3">
        
        <div class="bg-primary/10 border-l-4 border-primary p-6 mb-8 text-primary font-serif italic text-lg shadow-soft">
            <p><?php echo isset($pesan) ? $pesan : 'Oops... Mohon maaf, halaman atau artikel tidak ditemukan.'; ?></p>
        </div>
        
        <div class="mt-8">
            <a href="<?php echo site_url(); ?>" class="inline-flex items-center gap-2 bg-secondary px-8 py-3 text-xs font-bold uppercase tracking-[0.2em] text-white transition hover:bg-primary">
                <span class="material-symbols-outlined text-sm">home</span>
                Kembali ke Beranda
            </a>
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