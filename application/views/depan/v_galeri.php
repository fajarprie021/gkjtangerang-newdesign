<main class="bg-cream pt-24 pb-16 min-h-[70vh]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <span class="text-secondary font-bold tracking-[0.2em] uppercase text-xs">Dokumentasi</span>
            <h1 class="mt-3 text-4xl md:text-5xl font-headline text-primary">Galeri Foto</h1>
            <p class="mt-4 text-gray-600 font-serif max-w-2xl mx-auto">Kumpulan momen dan dokumentasi setiap kegiatan yang diadakan di lingkungan pelayanan kami.</p>
        </div>

        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6">
            <?php foreach ($all_galeri->result() as $row) : ?>
                <div class="break-inside-avoid relative group rounded-2xl overflow-hidden shadow-soft hover:shadow-xl transition-all duration-500">
                    <div class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-4xl transform scale-50 group-hover:scale-100 transition-transform duration-300">zoom_in</span>
                    </div>
                    <img 
                        src="<?php echo base_url().'assets/images/galeri/'.$row->galeri_gambar;?>" 
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
