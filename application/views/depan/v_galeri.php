<main class="bg-cream pt-24 pb-16 min-h-[70vh]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <span class="text-secondary font-bold tracking-[0.2em] uppercase text-xs">Dokumentasi</span>
            <h1 class="mt-3 text-4xl md:text-5xl font-headline text-primary">Galeri Foto</h1>
            <p class="mt-4 text-gray-600 font-serif max-w-2xl mx-auto">Kumpulan momen dan dokumentasi setiap kegiatan yang diadakan di lingkungan pelayanan kami.</p>
        </div>

        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6">
            <?php foreach ($all_galeri->result() as $row) : ?>
                <?php $resolved_img = resolve_image($row->galeri_gambar, 'galeri'); ?>
                <div class="break-inside-avoid relative group rounded-2xl overflow-hidden shadow-soft hover:shadow-xl transition-all duration-500 cursor-zoom-in" onclick="openLightbox('<?php echo $resolved_img; ?>')">
                    <div class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-4xl transform scale-50 group-hover:scale-100 transition-transform duration-300">zoom_in</span>
                    </div>
                    <img 
                        src="<?php echo $resolved_img; ?>" 
                        class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700" 
                        alt="Gallery Image" 
                    />
                </div>
            <?php endforeach;?>
        </div>

        <?php if($all_galeri->num_rows() == 0): ?>
            <div class="text-center py-20 opacity-60">
                <span class="material-symbols-outlined text-gray-400 text-6xl mb-4">photo_library</span>
                <p class="font-serif text-gray-500 text-lg">Belum ada foto yang tersedia.</p>
            </div>
        <?php endif; ?>

        <!-- Pagination -->
        <?php if(!empty($page)): ?>
        <div class="mt-16 flex justify-center pagination-tailwind">
            <?php echo $page;?>
        </div>
        <?php endif; ?>
        
    </div>
</main>

<!-- Lightbox Modal Component -->
<div id="lightbox-modal" class="fixed inset-0 z-50 hidden bg-black/95 flex items-center justify-center p-4 backdrop-blur-sm transition-opacity duration-300 opacity-0" onclick="closeLightbox()">
    <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white/70 hover:text-white transition-colors focus:outline-none z-50">
        <span class="material-symbols-outlined text-4xl">close</span>
    </button>
    <div class="relative max-w-5xl max-h-[90vh] flex items-center justify-center" onclick="event.stopPropagation()">
        <img id="lightbox-img" class="max-w-full max-h-[85vh] object-contain rounded shadow-2xl transform scale-95 transition-transform duration-300" src="" alt="Gallery Image Full">
    </div>
</div>

<script>
function openLightbox(src) {
    const modal = document.getElementById('lightbox-modal');
    const img = document.getElementById('lightbox-img');
    if (!modal || !img) return;

    img.src = src;
    modal.classList.remove('hidden');
    // Force a reflow to allow transition to run
    modal.offsetWidth;
    modal.classList.add('opacity-100');
    modal.classList.add('flex');
    img.classList.add('scale-100');
    img.classList.remove('scale-95');
}

function closeLightbox() {
    const modal = document.getElementById('lightbox-modal');
    const img = document.getElementById('lightbox-img');
    if (!modal || !img) return;

    modal.classList.remove('opacity-100');
    img.classList.remove('scale-100');
    img.classList.add('scale-95');
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        img.src = '';
    }, 300);
}

// Close on Escape key press
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    }
});
</script>

<style type="text/tailwindcss">
    @layer components {
        .pagination-tailwind ul { @apply flex flex-wrap items-center gap-2; }
        .pagination-tailwind li { @apply list-none; }
        .pagination-tailwind .page-item .page-link {
            @apply flex h-10 min-w-[2.5rem] items-center justify-center rounded-lg border border-gray-200 bg-white px-3 font-bold text-primary transition-colors hover:border-secondary hover:bg-secondary hover:text-white !important;
        }
        .pagination-tailwind .page-item.active .page-link {
            @apply border-primary bg-primary text-white pointer-events-none !important;
        }
    }
</style>
