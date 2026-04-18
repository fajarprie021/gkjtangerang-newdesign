<main class="bg-cream pt-24 pb-16 min-h-[70vh]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <span class="text-secondary font-bold tracking-[0.2em] uppercase text-xs">Jadwal Pelayanan</span>
            <h1 class="mt-3 text-4xl md:text-5xl font-headline text-primary">Agenda Kegiatan</h1>
            <p class="mt-4 text-gray-600 font-serif max-w-2xl mx-auto">Ikuti berbagai kegiatan dan persekutuan yang diadakan. Tersedia untuk seluruh jemaat dan kalangan umum.</p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach($data->result() as $row):?>
                <div class="group flex flex-col bg-surface shadow-soft rounded-2xl overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="px-8 pt-8 pb-6 bg-primary text-white flex flex-col items-center justify-center relative overflow-hidden shrink-0">
                        <div class="batik-overlay absolute inset-0"></div>
                        <h4 class="text-5xl font-headline font-bold z-10"><?php echo date("d", strtotime($row->agenda_tanggal));?></h4>
                        <span class="text-xs font-bold tracking-[0.2em] uppercase text-secondary mt-2 z-10 opacity-90"><?php echo date("F Y", strtotime($row->agenda_tanggal));?></span>
                    </div>
                    
                    <div class="p-8 flex flex-col flex-1">
                        <div class="inline-flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-widest mb-4">
                            <span class="material-symbols-outlined text-secondary text-[16px]">schedule</span>
                            <?php echo $row->agenda_waktu;?>
                        </div>
                        
                        <h3 class="text-xl font-headline text-primary mb-3 limit-lines-2 leading-snug"><?php echo $row->agenda_nama;?></h3>
                        
                        <p class="text-gray-600 font-serif text-sm leading-relaxed mb-6 flex-1 line-clamp-3">
                            <?php echo strip_tags($row->agenda_deskripsi);?>
                        </p>
                        
                        <?php if(!empty($row->agenda_tempat)): ?>
                        <div class="mt-auto border-t border-gray-100 pt-4 flex items-start gap-2 text-sm text-gray-500">
                            <span class="material-symbols-outlined text-[16px] mt-0.5 text-secondary">location_on</span>
                            <span class="font-serif italic leading-relaxed line-clamp-2"><?php echo $row->agenda_tempat; ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

        <?php if($data->num_rows() == 0): ?>
            <div class="text-center py-20 opacity-60">
                <span class="material-symbols-outlined text-gray-400 text-6xl mb-4">event_busy</span>
                <p class="font-serif text-gray-500 text-lg">Belum ada agenda terbaru saat ini.</p>
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
