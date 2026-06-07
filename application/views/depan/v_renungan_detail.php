<?php
$title = isset($title) ? $title : 'Renungan';
$blog = isset($blog) ? $blog : '';
$tanggal = isset($tanggal) ? $tanggal : '';
$author = isset($author) ? $author : 'Admin';
$slug = isset($slug) ? $slug : '';
$bacaan_alkitab = isset($bacaan_alkitab) ? $bacaan_alkitab : '';
$nats = isset($nats) ? $nats : '';
$doa_pembuka = isset($doa_pembuka) ? $doa_pembuka : '';
$pokok_doa = isset($pokok_doa) ? $pokok_doa : '';
?>
<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-4xl">
    
    <!-- Back Button -->
    <div class="mb-12">
        <a href="<?php echo site_url('renungan'); ?>" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-primary transition hover:text-secondary mb-6">
            <span class="material-symbols-outlined text-sm border border-primary/30 rounded-full p-2 transition">arrow_back</span>
            KEMBALI KE RENUNGAN
        </a>
    </div>

    <!-- Devotional Container -->
    <div class="bg-white rounded-2xl shadow-soft border-t-4 border-secondary p-8 md:p-12 space-y-10">
        
        <!-- Devotional Header -->
        <div class="text-center pb-8 border-b border-primary/10">
            <span class="text-secondary font-bold tracking-[0.25em] uppercase text-[10px] block mb-3">Siraman Rohani Harian</span>
            <h1 class="font-headline text-3xl md:text-4xl lg:text-5xl leading-tight text-primary mb-6"><?php echo $title;?></h1>
            <div class="flex items-center justify-center gap-6 text-xs text-muted font-serif">
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-base">calendar_today</span> <?php echo $tanggal;?></span>
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-base">person</span> <?php echo empty($author) ? 'Admin' : $author;?></span>
            </div>
        </div>

        <?php if (!empty($bacaan_alkitab) || !empty($nats)): ?>
        <!-- Bible Scripture & Verse Callout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-cream/40 rounded-xl p-6 border border-primary/5">
            <?php if (!empty($bacaan_alkitab)): ?>
            <div class="md:col-span-1 flex flex-col justify-center border-b pb-6 md:border-b-0 md:pb-0 md:border-r border-primary/10 pr-4">
                <div class="flex items-center gap-2 text-secondary font-headline text-xs tracking-widest uppercase mb-2">
                    <span class="material-symbols-outlined text-lg">menu_book</span>
                    Bacaan Alkitab
                </div>
                <p class="font-serif text-lg font-bold text-primary"><?php echo $bacaan_alkitab; ?></p>
            </div>
            <?php endif; ?>

            <?php if (!empty($nats)): ?>
            <div class="md:col-span-2 flex flex-col justify-center pl-2">
                <div class="flex items-center gap-2 text-secondary font-headline text-xs tracking-widest uppercase mb-2">
                    <span class="material-symbols-outlined text-lg">format_quote</span>
                    Nats Ayat
                </div>
                <blockquote class="font-serif italic text-sm text-gray-700 leading-relaxed">
                    <?php echo nl2br($nats); ?>
                </blockquote>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($doa_pembuka)): ?>
        <!-- Doa Pembuka Callout -->
        <div class="border-l-4 border-secondary bg-primary/5 p-6 rounded-r-xl">
            <h4 class="font-headline text-xs tracking-widest text-primary uppercase mb-3 flex items-center gap-2">
                <span class="material-symbols-outlined text-base text-secondary">volunteer_activism</span>
                Doa Pembuka
            </h4>
            <p class="font-serif italic text-sm text-gray-700 leading-relaxed whitespace-pre-line">
                <?php echo $doa_pembuka; ?>
            </p>
        </div>
        <?php endif; ?>

        <?php if (!empty($pokok_doa)): ?>
        <!-- Pokok Doa Callout -->
        <div class="border-l-4 border-secondary bg-primary/5 p-6 rounded-r-xl">
            <h4 class="font-headline text-xs tracking-widest text-primary uppercase mb-3 flex items-center gap-2">
                <span class="material-symbols-outlined text-base text-secondary">list_alt</span>
                Pokok Doa / Pokok Keprihatinan
            </h4>
            <p class="font-serif italic text-sm text-gray-700 leading-relaxed whitespace-pre-line">
                <?php echo $pokok_doa; ?>
            </p>
        </div>
        <?php endif; ?>

        <!-- Devotional Body Content -->
        <div class="prose prose-lg max-w-none font-serif text-gray-700 leading-relaxed">
            <?php 
            if (preg_match('/<[a-z][\s\S]*>/i', $blog)) {
                echo $blog;
            } else {
                echo nl2br(htmlspecialchars($blog, ENT_QUOTES, 'UTF-8'));
            }
            ?>
        </div>

        <!-- Share Block -->
        <div class="border-t border-primary/10 pt-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h5 class="font-headline text-primary tracking-widest text-xs uppercase flex items-center gap-2">
                <span class="material-symbols-outlined text-base text-secondary">share</span>
                Bagikan Renungan:
            </h5>
            <div class="sharePopup"></div>
        </div>

    </div>

  </div>
</section>

<!-- Script & Plugins local for Social Share -->
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
