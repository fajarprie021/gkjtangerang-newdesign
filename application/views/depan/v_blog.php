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
          'eyebrow' => isset($header_subtitle) ? $header_subtitle : 'Kumpulan Artikel',
          'title'   => isset($header_title) ? $header_title : 'WARTA JEMAAT & BLOG'
      )); 
      ?>
    </div>

    <div class="flex flex-col lg:flex-row gap-12">
      <!-- Main Content -->
      <div class="w-full lg:w-2/3">
        <?php echo $this->session->flashdata('msg');?>
        <?php if(isset($pesan)) echo "<div class='mb-6 p-4 bg-red-100 text-red-700'>".$pesan."</div>"; ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <?php foreach ($data->result() as $row) : ?>
              <?php $this->load->view('components/card_artikel', array('item' => $row)); ?>
          <?php endforeach;?>
        </div>

        <div class="mt-12 flex justify-center">
            <?php error_reporting(0); echo $page;?>
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
                    <img src="<?php echo resolve_image($row->tulisan_gambar, 'berita'); ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Thumbnail">
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
