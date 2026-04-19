<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-4xl">
    
    <!-- Header -->
    <div class="text-center mb-12">
        <?php 
        $this->load->view('components/section_header_center', array(
            'eyebrow' => 'Pelayanan Jemaat',
            'title'   => $category
        )); 
        ?>
    </div>

    <?php if($data->num_rows() > 0): ?>
        <?php 
            $posts = $data->result_array();
            $main_post = $posts[0]; // Take the latest one as main
        ?>
        
        <!-- Featured Image -->
        <?php if(!empty($main_post['tulisan_gambar'])): ?>
        <div class="mb-16 overflow-hidden shadow-soft rounded-lg">
            <img src="<?php echo base_url().'assets/images/'.$main_post['tulisan_gambar']?>" class="w-full h-auto object-cover" alt="Service Image">
        </div>
        <?php endif; ?>

        <!-- Main Content -->
        <div class="prose max-w-none text-gray-700 leading-loose font-serif prose-headings:font-headline prose-headings:text-primary prose-a:text-secondary bg-white p-8 md:p-16 shadow-soft mb-12 border-t-4 border-secondary">
            <?php echo $main_post['tulisan_isi'];?>
        </div>

    <?php else: ?>
        <!-- Fallback if no data -->
        <div class="bg-white p-16 rounded-xl shadow-soft text-center border-t-4 border-secondary/20">
            <span class="material-symbols-outlined text-6xl text-gray-200 mb-4 font-thin">inventory_2</span>
            <p class="text-gray-500 font-serif italic text-lg">Saat ini informasi mengenai pelayanan <b><?php echo $category;?></b> sedang kami siapkan.</p>
            <div class="mt-8">
                <a href="<?php echo site_url();?>" class="inline-flex items-center gap-2 text-secondary font-bold uppercase tracking-widest text-xs hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali ke Beranda
                </a>
            </div>
        </div>
    <?php endif; ?>

  </div>
</section>
