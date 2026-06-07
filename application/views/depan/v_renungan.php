<main class="bg-cream pt-24 pb-16 min-h-[70vh]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <span class="text-secondary font-bold tracking-[0.2em] uppercase text-xs">Siraman Rohani</span>
            <h1 class="mt-3 text-4xl md:text-5xl font-headline text-primary">Firman & Renungan</h1>
            <p class="mt-4 text-gray-600 font-serif max-w-2xl mx-auto">Kumpulan renungan rohani untuk meneguhkan iman dan menguatkan langkah kehidupan berjemaat.</p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php if(isset($data) && is_object($data) && method_exists($data, 'num_rows') && $data->num_rows() > 0): ?>
                <?php foreach($data->result() as $row): ?>
                    <?php
                        $slug = !empty($row->renungan_slug) ? $row->renungan_slug : (isset($row->renungan_id) ? $row->renungan_id : '');
                        $judul = isset($row->renungan_judul) ? $row->renungan_judul : 'Renungan';
                        $deskripsi = isset($row->renungan_deskripsi) ? strip_tags($row->renungan_deskripsi) : '';
                        $tgl = isset($row->tanggal) ? $row->tanggal : '';
                        $author = isset($row->renungan_author) && !empty($row->renungan_author) ? $row->renungan_author : 'Admin';
                    ?>
                    <div class="group flex flex-col bg-surface shadow-soft rounded-2xl overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        
                        <div class="p-8 flex flex-col flex-1">
                            <div class="inline-flex items-center gap-2 text-secondary font-bold text-xs uppercase tracking-widest mb-4">
                                <span class="material-symbols-outlined text-[16px]">menu_book</span>
                                Renungan
                            </div>
                            
                            <h3 class="text-xl font-headline text-primary mb-3 limit-lines-2 leading-snug">
                                <a href="<?php echo site_url('renungan/halaman/'.$slug); ?>" class="hover:text-secondary transition-colors relative z-10 before:absolute before:-inset-2 before:z-0">
                                    <?php echo htmlspecialchars($judul);?>
                                </a>
                            </h3>
                            
                            <p class="text-gray-600 font-serif text-sm leading-relaxed mb-6 flex-1 line-clamp-3">
                                <?php echo $deskripsi;?>
                            </p>
                            
                            <div class="mt-auto border-t border-gray-100 pt-4 flex items-center justify-between text-xs text-gray-400 font-bold uppercase tracking-wider">
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px]">calendar_today</span><?php echo htmlspecialchars($tgl); ?></span>
                                <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px]">person</span><?php echo htmlspecialchars($author); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>

        <?php if(!isset($data) || !is_object($data) || !method_exists($data, 'num_rows') || $data->num_rows() == 0): ?>
            <div class="text-center py-20 opacity-60">
                <span class="material-symbols-outlined text-gray-400 text-6xl mb-4">menu_book</span>
                <p class="font-serif text-gray-500 text-lg">Belum ada renungan terbaru saat ini.</p>
            </div>
        <?php endif; ?>

        <!-- Pagination -->
        <?php if(isset($page) && !empty($page)): ?>
        <div class="mt-16 flex justify-center pagination-tailwind">
            <?php echo $page;?>
        </div>
        <?php endif; ?>
        
    </div>
</main>

<style>
    .pagination-tailwind ul {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.5rem;
    }
    .pagination-tailwind li {
        list-style-type: none;
    }
    .pagination-tailwind .page-item .page-link {
        display: flex;
        height: 2.5rem;
        min-width: 2.5rem;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        border: 1px solid #e2e8f0;
        background-color: #ffffff;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        font-weight: 700;
        color: #1A365D;
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }
    .pagination-tailwind .page-item .page-link:hover {
        border-color: #C5A059 !important;
        background-color: #C5A059 !important;
        color: #ffffff !important;
    }
    .pagination-tailwind .page-item.active .page-link {
        border-color: #1A365D !important;
        background-color: #1A365D !important;
        color: #ffffff !important;
        pointer-events: none;
    }
</style>
