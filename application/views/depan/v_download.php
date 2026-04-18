<main class="bg-cream pt-24 pb-16 min-h-[70vh]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <span class="text-secondary font-bold tracking-[0.2em] uppercase text-xs">Pusat Informasi</span>
            <h1 class="mt-3 text-4xl md:text-5xl font-headline text-primary">Download File</h1>
            <p class="mt-4 text-gray-600 font-serif max-w-2xl mx-auto">Akses dan unduh berbagai dokumen resmi, warta jemaat, dan arsip publik yang disediakan untuk jemaat.</p>
        </div>

        <div class="bg-surface rounded-2xl shadow-soft overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-primary text-white uppercase tracking-widest text-xs font-bold">
                            <th class="py-5 px-6 font-medium text-center w-16">No</th>
                            <th class="py-5 px-6 font-medium">Nama Dokumen</th>
                            <th class="py-5 px-6 font-medium">Tanggal</th>
                            <th class="py-5 px-6 font-medium">Diunggah Oleh</th>
                            <th class="py-5 px-6 font-medium text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm flex-col">
                        <?php
                          $no=1;
                          foreach ($data->result() as $row):
                        ?>
                        <tr class="hover:bg-cream transition-colors group">
                            <td class="py-4 px-6 text-center text-gray-400 font-bold"><?php echo $no++;?></td>
                            <td class="py-4 px-6 text-primary font-bold">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-secondary text-xl">description</span>
                                    <?php echo $row->file_judul;?>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-500 font-serif"><?php echo $row->tanggal;?></td>
                            <td class="py-4 px-6 text-gray-500">
                                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gray-50 border border-gray-200 text-xs text-primary font-bold">
                                    <span class="material-symbols-outlined text-[14px]">person</span>
                                    <?php echo $row->file_oleh;?>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a href="<?php echo site_url('download/get_file/'.$row->file_id);?>" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-secondary text-white font-bold text-xs uppercase tracking-widest rounded-lg hover:bg-opacity-90 transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                                    <span class="material-symbols-outlined text-[16px] -mt-0.5">download</span>
                                    Unduh
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php if($data->num_rows() == 0): ?>
                    <div class="text-center py-16 opacity-60">
                        <span class="material-symbols-outlined text-gray-400 text-5xl mb-4">folder_off</span>
                        <p class="font-serif text-gray-500 text-lg">Belum ada dokumen untuk diunduh.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</main>
