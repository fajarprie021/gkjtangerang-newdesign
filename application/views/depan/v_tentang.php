<?php
    if(!function_exists('limit_words')) {
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    }
?>
<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-4xl">
    
    <!-- Article Header -->
    <div class="text-center mb-12">
        <?php 
        $this->load->view('components/section_header_center', array(
            'eyebrow' => 'Informasi',
            'title'   => isset($title) ? $title : 'Profil'
        )); 
        ?>
        <?php if(isset($author) && isset($kategori)): ?>
        <div class="mt-6 flex flex-wrap items-center justify-center gap-6 text-sm text-muted font-serif">
            <span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-sm">person</span> <?php echo $author;?></span>
            <span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-sm">label</span> <?php echo $kategori;?></span>
        </div>
        <?php endif; ?>
    </div>

    <!-- Featured Image -->
    <?php if(!empty($image)): ?>
    <div class="mb-16 overflow-hidden shadow-soft rounded-lg">
        <img src="<?php echo resolve_image($image, 'tentang'); ?>" class="w-full h-auto object-cover" alt="Image">
    </div>
    <?php endif; ?>

    <!-- Content -->
    <?php if(!empty($blog)): ?>
    <div class="prose max-w-none text-gray-700 leading-loose font-serif prose-headings:font-headline prose-headings:text-primary prose-a:text-secondary bg-white p-8 md:p-16 shadow-soft mb-12 border-t-4 border-secondary">
        <?php echo $blog;?>
    </div>
    <?php endif; ?>

    <!-- Share Block -->
    <div class="border-t border-b border-primary/20 py-6 mb-12 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h5 class="font-headline text-primary tracking-widest text-sm uppercase">Bagikan Halaman Ini:</h5>
        <div class="sharePopup"></div>
    </div>
    
    <!-- Back CTA -->
    <div class="text-center">
        <?php 
        $this->load->view('components/cta_underline', array(
            'url' => site_url(),
            'text' => 'KEMBALI KE BERANDA'
        )); 
        ?>
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
