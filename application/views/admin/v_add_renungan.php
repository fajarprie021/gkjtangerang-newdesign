<section class="bg-cream px-6 py-24 min-h-screen">
    <div class="mx-auto max-w-4xl">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start mb-10 gap-4">
            <div>
                <?php 
                $this->load->view('components/section_header_left', array(
                    'eyebrow' => 'Administrator',
                    'title'   => 'Tambah Renungan'
                )); 
                ?>
                <p class="text-gray-600 font-serif mt-2">Input konten renungan harian baru untuk dipublikasikan kepada jemaat.</p>
            </div>
            <a href="<?php echo base_url('admin/renungan'); ?>" class="flex items-center gap-2 text-primary hover:text-secondary transition-colors font-bold uppercase tracking-widest text-[10px]">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                Kembali ke Daftar
            </a>
        </div>

        <!-- Form -->
        <form action="<?php echo base_url().'admin/renungan/simpan_renungan'?>" method="post" class="bg-white rounded-2xl shadow-soft border-t-4 border-secondary p-8 md:p-12">
            <div class="space-y-8">
                <!-- Title Input -->
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Judul Renungan <span class="text-red-500">*</span></label>
                    <input type="text" name="xrenungan_judul" 
                           class="w-full px-0 py-2 border-0 border-b-2 border-gray-100 focus:ring-0 focus:border-secondary text-2xl font-headline placeholder-gray-300 transition-colors bg-transparent"
                           placeholder="Masukkan judul renungan yang inspiratif..." required>
                </div>

                <!-- Bacaan Alkitab & Nats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Bacaan Alkitab -->
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Bacaan Alkitab</label>
                        <input type="text" name="xbacaan_alkitab" 
                               class="w-full px-0 py-2 border-0 border-b-2 border-gray-100 focus:ring-0 focus:border-secondary text-base font-serif placeholder-gray-300 transition-colors bg-transparent"
                               placeholder="Contoh: Matius 5:1-12">
                    </div>

                    <!-- Nats Ayat -->
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Nats Ayat</label>
                        <textarea name="xnats" rows="2" 
                                  class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-3 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white resize-y font-serif text-gray-700 text-sm leading-relaxed" 
                                  placeholder="Contoh: Matius 5:3 - 'Berbahagialah orang yang miskin di hadapan Allah...'"></textarea>
                    </div>
                </div>

                <!-- Doa Pembuka -->
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Doa Pembuka</label>
                    <textarea name="xdoa_pembuka" rows="3" 
                              class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-3 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white resize-y font-serif text-gray-700 text-sm leading-relaxed" 
                              placeholder="Tuliskan doa pembuka di sini..."></textarea>
                </div>

                <!-- Pokok Doa -->
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Pokok Doa</label>
                    <textarea name="xpokok_doa" rows="3" 
                              class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-3 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white resize-y font-serif text-gray-700 text-sm leading-relaxed" 
                              placeholder="Tuliskan pokok-pokok doa di sini..."></textarea>
                </div>

                <!-- Editor -->
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Isi Renungan <span class="text-red-500">*</span></label>
                    <textarea name="xdeskripsi" rows="15" 
                              class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-4 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white resize-y font-serif text-gray-700 leading-relaxed" 
                              placeholder="Tuliskan isi renungan di sini..." required></textarea>
                    <p class="mt-3 text-[10px] text-gray-400 italic font-serif">* Gunakan bahasa yang mudah dipahami jemaat.</p>
                </div>

                <!-- Submit Area -->
                <div class="pt-8 border-t border-gray-100 flex justify-end">
                    <div class="flex gap-4 w-full md:w-auto">
                        <a href="<?php echo base_url('admin/renungan'); ?>" class="flex-1 md:flex-none text-center px-8 py-4 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-gray-500 transition hover:text-primary rounded-xl border border-transparent hover:border-gray-200">
                            Batal
                        </a>
                        <button type="submit" class="flex-1 md:flex-none py-4 px-10 bg-secondary text-white font-headline tracking-[0.2em] text-xs uppercase rounded-xl hover:bg-primary transition-all shadow-lg active:scale-95 flex items-center justify-center gap-3">
                            <span class="material-symbols-outlined text-lg">publish</span>
                            <span>Publikasikan Renungan</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
