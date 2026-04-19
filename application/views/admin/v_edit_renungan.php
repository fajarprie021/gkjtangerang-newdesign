<?php
    $b=$data->row_array();
?>
<section class="bg-cream px-6 py-24 min-h-screen">
    <div class="mx-auto max-w-4xl">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start mb-10 gap-4">
            <div>
                <?php 
                $this->load->view('components/section_header_left', array(
                    'eyebrow' => 'Administrator',
                    'title'   => 'Update Renungan'
                )); 
                ?>
                <p class="text-gray-600 font-serif mt-2">Perbarui konten renungan yang sudah ada.</p>
            </div>
            <a href="<?php echo base_url('admin/renungan'); ?>" class="flex items-center gap-2 text-primary hover:text-secondary transition-colors font-bold uppercase tracking-widest text-[10px]">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                Kembali ke Daftar
            </a>
        </div>

        <!-- Form -->
        <form action="<?php echo base_url().'admin/renungan/update_renungan'?>" method="post" class="bg-white rounded-2xl shadow-soft border-t-4 border-secondary p-8 md:p-12">
            <input type="hidden" name="kode" value="<?php echo $b['renungan_id'];?>">
            
            <div class="space-y-8">
                <!-- Title Input -->
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Judul Renungan <span class="text-red-500">*</span></label>
                    <input type="text" name="xrenungan_judul" 
                           class="w-full px-0 py-2 border-0 border-b-2 border-gray-100 focus:ring-0 focus:border-secondary text-2xl font-headline placeholder-gray-300 transition-colors bg-transparent"
                           value="<?php echo htmlspecialchars($b['renungan_judul']);?>"
                           placeholder="Masukkan judul renungan yang inspiratif..." required>
                </div>

                <!-- Editor -->
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Isi Renungan <span class="text-red-500">*</span></label>
                    <textarea name="xdeskripsi" rows="15" 
                              class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-4 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white resize-y font-serif text-gray-700 leading-relaxed" 
                              placeholder="Tuliskan isi renungan di sini..." required><?php echo htmlspecialchars($b['renungan_deskripsi']); ?></textarea>
                    <p class="mt-3 text-[10px] text-gray-400 italic font-serif">* Gunakan bahasa yang mudah dipahami jemaat.</p>
                </div>

                <!-- Submit Area -->
                <div class="pt-8 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6">
                    <p class="text-[10px] text-gray-400">
                        Terakhir diperbarui oleh: <span class="text-primary font-bold uppercase tracking-widest"><?php echo $b['renungan_author']; ?></span><br>
                        Tanggal: <span class="text-gray-500 font-bold"><?php echo $b['tanggal']; ?></span>
                    </p>
                    
                    <div class="flex gap-4 w-full md:w-auto">
                        <a href="<?php echo base_url('admin/renungan'); ?>" class="flex-1 md:flex-none text-center px-8 py-4 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-gray-500 transition hover:text-primary rounded-xl border border-transparent hover:border-gray-200">
                            Batal
                        </a>
                        <button type="submit" class="flex-1 md:flex-none py-4 px-10 bg-primary text-secondary font-headline tracking-[0.2em] text-xs uppercase rounded-xl hover:bg-primary/90 transition-all shadow-lg active:scale-95 flex items-center justify-center gap-3">
                            <span class="material-symbols-outlined text-lg">save</span>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
