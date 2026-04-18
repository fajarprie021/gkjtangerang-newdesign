<main class="bg-cream pt-24 pb-16 min-h-[70vh]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <span class="text-secondary font-bold tracking-[0.2em] uppercase text-xs">Siraman Rohani</span>
            <h1 class="mt-3 text-4xl md:text-5xl font-headline text-primary">Firman & Renungan</h1>
            <p class="mt-4 text-gray-600 font-serif max-w-2xl mx-auto">Kumpulan renungan rohani untuk meneguhkan iman dan menguatkan langkah kehidupan berjemaat.</p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach($data->result() as $row):?>
                <div class="group flex flex-col bg-surface shadow-soft rounded-2xl overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    
                    <div class="p-8 flex flex-col flex-1">
                        <div class="inline-flex items-center gap-2 text-secondary font-bold text-xs uppercase tracking-widest mb-4">
                            <span class="material-symbols-outlined text-[16px]">menu_book</span>
                            Renungan
                        </div>
                        
                        <h3 class="text-xl font-headline text-primary mb-3 limit-lines-2 leading-snug">
                            <a href="<?php echo site_url('renungan/detail/'.$row->renungan_slug); ?>" class="hover:text-secondary transition-colors relative z-10 before:absolute before:-inset-2 before:z-0">
                                <?php echo $row->renungan_judul;?>
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 font-serif text-sm leading-relaxed mb-6 flex-1 line-clamp-3">
                            <?php echo strip_tags($row->renungan_deskripsi);?>
                        </p>
                        
                        <div class="mt-auto border-t border-gray-100 pt-4 flex items-center justify-between text-xs text-gray-400 font-bold uppercase tracking-wider">
                            <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px]">calendar_today</span><?php echo $row->tanggal; ?></span>
                            <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px]">person</span><?php echo empty($row->renungan_author) ? 'Admin' : $row->renungan_author; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

        <?php if($data->num_rows() == 0): ?>
            <div class="text-center py-20 opacity-60">
                <span class="material-symbols-outlined text-gray-400 text-6xl mb-4">menu_book</span>
                <p class="font-serif text-gray-500 text-lg">Belum ada renungan terbaru saat ini.</p>
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
        .pagination-tailwind ul {
            @apply flex flex-wrap items-center gap-2;
        }
        .pagination-tailwind li {
            @apply list-none;
        }
        .pagination-tailwind .page-item .page-link {
            @apply flex h-10 min-w-[2.5rem] items-center justify-center rounded-lg border border-gray-200 bg-white px-3 font-bold text-primary transition-colors hover:border-secondary hover:bg-secondary hover:text-white !important;
        }
        .pagination-tailwind .page-item.active .page-link {
            @apply border-primary bg-primary text-white pointer-events-none !important;
        }
    }
</style>
