<section class="bg-cream px-6 py-24 min-h-screen">
    <div class="mx-auto max-w-5xl">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start mb-10 gap-4">
            <div>
                <?php 
                $this->load->view('components/section_header_left', array(
                    'eyebrow' => 'Administrator',
                    'title'   => 'Post Berita Baru'
                )); 
                ?>
                <p class="text-gray-600 font-serif mt-2">Buat dan publikasikan artikel atau berita baru ke website.</p>
            </div>
            <a href="<?php echo base_url('admin/tulisan'); ?>" class="flex items-center gap-2 text-primary hover:text-secondary transition-colors font-bold uppercase tracking-widest text-[10px]">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                Kembali ke Daftar
            </a>
        </div>

        <!-- Form -->
        <form action="<?php echo base_url().'admin/tulisan/simpan_tulisan'?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Content (Left) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Title Input -->
                    <div class="bg-white p-8 rounded-2xl shadow-soft border-t-4 border-secondary">
                        <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Judul Berita</label>
                        <input type="text" name="xjudul" 
                               class="w-full px-0 py-2 border-0 border-b-2 border-gray-100 focus:ring-0 focus:border-secondary text-2xl font-headline placeholder-gray-300 transition-colors"
                               placeholder="Masukkan judul berita di sini..." required>
                    </div>

                    <!-- Editor -->
                    <div class="bg-white p-8 rounded-2xl shadow-soft">
                        <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Konten Berita</label>
                        <div class="prose max-w-none">
                            <textarea id="ckeditor" name="xisi" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Settings (Right) -->
                <div class="space-y-6">
                    <!-- Category & Meta -->
                    <div class="bg-white p-8 rounded-2xl shadow-soft border-t-4 border-primary">
                        <h3 class="font-headline text-primary uppercase tracking-widest text-sm mb-6 pb-4 border-b border-gray-50 flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">settings</span>
                            Pengaturan
                        </h3>

                        <div class="space-y-6">
                            <!-- Kategori -->
                            <div class="space-y-2">
                                <label class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Kategori</label>
                                <select name="xkategori" class="w-full bg-cream border-0 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-secondary transition-all" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kat->result_array() as $i) : ?>
                                        <option value="<?php echo $i['kategori_id'];?>"><?php echo $i['kategori_nama'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <!-- Image Upload -->
                            <div class="space-y-2">
                                <label class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Gambar Utama</label>
                                <div class="relative group">
                                    <input type="file" name="filefoto" id="filefoto" class="hidden" required onchange="previewImage(this)">
                                    <label for="filefoto" class="cursor-pointer block w-full bg-cream border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-secondary hover:bg-white transition-all group">
                                        <span class="material-symbols-outlined text-gray-400 group-hover:text-secondary text-3xl mb-2">add_photo_alternate</span>
                                        <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Pilih File Gambar</p>
                                    </label>
                                    <div id="image-preview" class="hidden mt-4 rounded-xl overflow-hidden border border-gray-100 shadow-sm relative">
                                        <img src="" alt="Preview" class="w-full h-40 object-cover">
                                        <button type="button" onclick="removePreview()" class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full shadow-lg hover:bg-red-600 transition-colors">
                                            <span class="material-symbols-outlined text-sm">close</span>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-[9px] text-gray-400 italic">Format: JPG, PNG, JPEG | Max: 2MB</p>
                            </div>

                            <!-- Submit -->
                            <div class="pt-6">
                                <button type="submit" class="w-full py-4 bg-primary text-secondary font-headline tracking-[0.2em] text-xs uppercase rounded-xl hover:bg-primary/90 transition-all shadow-lg active:scale-[0.98] flex items-center justify-center gap-3">
                                    <span class="material-symbols-outlined text-lg">publish</span>
                                    <span>Publikasikan</span>
                                </button>
                                <p class="text-[9px] text-gray-400 text-center mt-4">Pastikan semua data sudah benar sebelum mempublikasikan berita.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- CKEditor & Custom Scripts -->
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<script>
    // Initialize CKEditor
    CKEDITOR.replace('ckeditor', {
        height: 400,
        // Optional configuration to match Tailwind style
        uiColor: '#F9F5F0'
    });

    // Image Preview Function
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#image-preview img').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removePreview() {
        document.getElementById('filefoto').value = '';
        document.getElementById('image-preview').classList.add('hidden');
    }
</script>
