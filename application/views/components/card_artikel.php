<?php
// Defensive check: ensure data object is passed
if (!isset($item) || !is_object($item)) {
    return;
}
?>
<article class="group cursor-pointer" onclick="window.location.href='<?php echo site_url('artikel/' . $item->tulisan_slug); ?>'">
    <div class="relative mb-6 aspect-video overflow-hidden">
        <img class="h-full w-full object-cover transition duration-700 group-hover:scale-105" src="<?php echo resolve_image($item->tulisan_gambar, 'berita'); ?>" alt="Artikel Thumbnail" />
    </div>
    <a class="block" href="<?php echo site_url('artikel/' . $item->tulisan_slug); ?>">
        <h3 class="font-headline text-lg text-primary transition group-hover:text-secondary leading-snug line-clamp-3">
            <?php echo $item->tulisan_judul; ?>
        </h3>
    </a>
    <p class="mt-4 text-[10px] font-bold tracking-widest uppercase text-secondary">BACA SELENGKAPNYA →</p>
</article>
