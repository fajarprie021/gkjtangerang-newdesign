<?php
    if(!function_exists('limit_words')) {
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    }
?>
<section class="bg-cream px-6 py-24 min-h-screen flex flex-col items-center justify-center">
  <div class="mx-auto max-w-3xl text-center">
    
    <!-- Article Header -->
    <div class="mb-12">
        <?php 
        $this->load->view('components/section_header_center', array(
            'eyebrow' => 'Kesalahan URL',
            'title'   => 'HALAMAN TIDAK DITEMUKAN'
        )); 
        ?>
    </div>

    <!-- Error Content -->
    <div class="bg-primary/10 border-t-4 border-primary p-12 shadow-soft mb-12">
        <h4 class="font-headline text-2xl text-primary mb-4">Mohon Maaf</h4>
        <p class="text-gray-700 font-serif leading-relaxed mb-8">
            <?php echo isset($pesan) ? $pesan : 'Informasi profil, sejarah, atau halaman yang Anda tuju tidak tersedia atau telah dipindahkan.'; ?>
        </p>
        
        <?php 
        $this->load->view('components/cta_underline', array(
            'url' => site_url(),
            'text' => 'KEMBALI KE BERANDA'
        )); 
        ?>
    </div>

  </div>
</section>
