<section class="bg-cream px-6 py-24 min-h-screen">
    <div class="mx-auto max-w-4xl">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start mb-10 gap-4">
            <div>
                <?php 
                $this->load->view('components/section_header_left', array(
                    'eyebrow' => 'Administrator',
                    'title'   => 'Tambah Slide Header'
                )); 
                ?>
                <p class="text-gray-600 font-serif mt-2">Unggah dan atur gambar slider utama homepage.</p>
            </div>
            <a href="<?php echo base_url('admin/slideheader'); ?>" class="flex items-center gap-2 text-primary hover:text-secondary transition-colors font-bold uppercase tracking-widest text-[10px]">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                Kembali ke Daftar
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-soft border-t-4 border-secondary p-8 md:p-12">
            <div class="space-y-8">
                <!-- Title Input -->
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Judul Slide <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" id="judul" 
                           class="w-full px-0 py-2 border-0 border-b-2 border-gray-100 focus:ring-0 focus:border-secondary text-2xl font-headline placeholder-gray-300 transition-colors bg-transparent outline-none"
                           placeholder="Masukkan judul slide..." required>
                </div>

                <!-- File Input / Drag & Drop -->
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.3em] text-gray-400 font-bold mb-4">Gambar Slide <span class="text-red-500">*</span></label>
                    <div class="relative group border-2 border-dashed border-gray-200 rounded-2xl p-8 bg-gray-50/30 hover:bg-gray-50 transition-all flex flex-col items-center justify-center min-h-[200px]">
                        <div id="upload-placeholder" class="flex flex-col items-center text-center space-y-2">
                            <span class="material-symbols-outlined text-4xl text-gray-400 group-hover:text-secondary transition-colors">add_photo_alternate</span>
                            <div class="text-sm font-semibold text-primary">Pilih Gambar atau Tarik ke Sini</div>
                            <div class="text-xs text-gray-400 font-serif">Format yang didukung: JPG, JPEG, PNG (rekomendasi resolusi tinggi)</div>
                        </div>
                        <div id="upload-preview-container" class="hidden w-full flex flex-col items-center">
                            <img id="upload-preview" class="w-full max-h-[300px] object-cover rounded-xl shadow-md mb-4">
                            <button type="button" id="remove-file-btn" class="text-xs font-bold text-red-500 hover:text-red-700 transition-colors uppercase tracking-wider flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">delete</span> Hapus Gambar
                            </button>
                        </div>
                        <input type="file" id="uploadFile" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </div>
                    <canvas id="canvas" style="display:none;"></canvas>
                </div>

                <!-- Submit Area -->
                <div class="pt-8 border-t border-gray-100 flex justify-end">
                    <div class="flex gap-4 w-full md:w-auto">
                        <a href="<?php echo base_url('admin/slideheader'); ?>" class="flex-1 md:flex-none text-center px-8 py-4 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-gray-500 transition hover:text-primary rounded-xl border border-transparent hover:border-gray-200">
                            Batal
                        </a>
                        <button type="button" id="upload" class="flex-1 md:flex-none py-4 px-10 bg-secondary text-white font-headline tracking-[0.2em] text-xs uppercase rounded-xl hover:bg-primary transition-all shadow-lg active:scale-95 flex items-center justify-center gap-3 font-bold">
                            <span class="material-symbols-outlined text-lg">publish</span>
                            <span>Publikasikan Slide</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Include Pica resizing library -->
<script src="https://cdn.jsdelivr.net/npm/pica@8.0.0/dist/pica.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const uploadFile = document.getElementById('uploadFile');
        const uploadPlaceholder = document.getElementById('upload-placeholder');
        const uploadPreviewContainer = document.getElementById('upload-preview-container');
        const uploadPreview = document.getElementById('upload-preview');
        const removeFileBtn = document.getElementById('remove-file-btn');
        const uploadBtn = document.getElementById('upload');
        const canvas = document.getElementById('canvas');
        const pica = window.pica();

        // Handle image selection preview
        uploadFile.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    uploadPreview.src = event.target.result;
                    uploadPlaceholder.classList.add('hidden');
                    uploadPreviewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle image removal
        removeFileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            uploadFile.value = '';
            uploadPreview.src = '';
            uploadPlaceholder.classList.remove('hidden');
            uploadPreviewContainer.classList.add('hidden');
        });

        // Resize and upload logic
        uploadBtn.addEventListener('click', function () {
            const file = uploadFile.files[0];
            const judul = document.getElementById('judul').value.trim();

            if (!judul) {
                alert('Silakan masukkan judul slide terlebih dahulu!');
                return;
            }
            if (!file) {
                alert('Silakan pilih gambar terlebih dahulu!');
                return;
            }

            // Disable button during upload
            uploadBtn.disabled = true;
            uploadBtn.innerHTML = `
                <span class="animate-spin inline-block w-4 h-4 border-2 border-current border-t-transparent text-white rounded-full"></span>
                <span>Mengunggah...</span>
            `;

            const img = new Image();
            img.src = URL.createObjectURL(file);

            img.onload = function () {
                // Set canvas size to scale down image to max width 800px
                let newWidth = 800;
                let newHeight = img.height * (newWidth / img.width);
                canvas.width = newWidth;
                canvas.height = newHeight;

                pica.resize(img, canvas, {
                    quality: 3,
                }).then(result => {
                    return pica.toBlob(result, 'image/jpeg', 0.85); // Convert canvas to Blob
                }).then(blob => {
                    const formData = new FormData();
                    formData.append('file', blob, file.name);
                    formData.append('judul', judul);

                    // Upload the resized image to the server
                    fetch('<?= base_url("admin/slideheader/uploadtoserver") ?>', {
                        method: 'POST',
                        body: formData
                    }).then(response => {
                        return response.json();
                    }).then(result => {
                        console.log('Success:', result);

                        if (result.status === 'success') {
                            window.location.href = '<?= base_url("admin/slideheader"); ?>'; // Redirect to list page
                        } else {
                            alert('Gagal mengunggah: ' + (result.message || 'Error tidak diketahui'));
                            resetBtn();
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan koneksi saat mengunggah.');
                        resetBtn();
                    });
                }).catch(err => {
                    console.error('Resize error:', err);
                    resetBtn();
                });
            };
        });

        function resetBtn() {
            uploadBtn.disabled = false;
            uploadBtn.innerHTML = `
                <span class="material-symbols-outlined text-lg">publish</span>
                <span>Publikasikan Slide</span>
            `;
        }
    });
</script>
