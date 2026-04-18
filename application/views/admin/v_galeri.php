<section class="bg-cream px-6 py-24 min-h-screen font-body">
    <div class="mx-auto max-w-7xl">
        <!-- Admin Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
            <div>
                <?php 
                $this->load->view('components/section_header_left', array(
                    'eyebrow' => 'Media & Dokumentasi',
                    'title'   => 'Gallery Photos'
                )); 
                ?>
                <p class="text-gray-600 font-serif mt-2 text-sm max-w-xl">Kelola dokumentasi foto kegiatan dan momen berharga GKJ Tangerang.</p>
            </div>
            <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-primary transition-colors shadow-soft whitespace-nowrap">
                + Tambah Foto
            </button>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($data->result_array() as $i) :
                $galeri_id=$i['galeri_id'];
                $galeri_judul=$i['galeri_judul'];
                $galeri_tanggal=$i['tanggal'];
                $galeri_author=$i['galeri_author'];
                $galeri_gambar=$i['galeri_gambar'];
                $galeri_album_id=$i['galeri_album_id'];
                $galeri_album_nama=$i['album_nama'];
            ?>
            <div class="bg-white rounded-xl shadow-soft overflow-hidden border border-gray-100 group transition-all hover:-translate-y-1 hover:shadow-xl">
                <div class="relative aspect-[4/3] overflow-hidden bg-gray-200">
                    <img src="<?php echo base_url().'assets/images/galeri/'.$galeri_gambar;?>" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                         alt="<?php echo $galeri_judul;?>">
                    <div class="absolute top-2 right-2 flex gap-1 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                        <button onclick="document.getElementById('ModalEdit<?php echo $galeri_id;?>').classList.remove('hidden')" class="bg-white/90 backdrop-blur p-2 rounded-full text-indigo-600 hover:bg-white shadow-sm transition-colors">
                            <span class="material-symbols-outlined text-sm">edit</span>
                        </button>
                        <button onclick="document.getElementById('ModalHapus<?php echo $galeri_id;?>').classList.remove('hidden')" class="bg-white/90 backdrop-blur p-2 rounded-full text-red-600 hover:bg-white shadow-sm transition-colors">
                            <span class="material-symbols-outlined text-sm">delete</span>
                        </button>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="bg-secondary/10 text-secondary text-[10px] uppercase font-bold tracking-widest px-2 py-0.5 rounded border border-secondary/20">
                            <?php echo $galeri_album_nama;?>
                        </span>
                        <span class="text-[10px] text-gray-400 font-sans tracking-tight"><?php echo $galeri_tanggal;?></span>
                    </div>
                    <h3 class="font-headline text-primary text-sm line-clamp-2 leading-snug mb-3 min-h-[2.5rem]"><?php echo $galeri_judul;?></h3>
                    <div class="flex items-center gap-2 pt-3 border-t border-gray-50">
                        <div class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center text-primary italic text-[10px] font-headline">
                            <?php echo substr($galeri_author, 0, 1);?>
                        </div>
                        <span class="text-[10px] text-gray-500 font-serif">Oleh <?php echo $galeri_author;?></span>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

<!-- Modal Tambah Photo -->
<div id="modalTambah" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 animate-in fade-in duration-300">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden flex flex-col scale-in duration-300">
        <form id="form_add_gallery" method="post" enctype="multipart/form-data">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white">
                <h4 class="font-headline tracking-widest text-lg uppercase">Tambah Koleksi Foto</h4>
                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 font-serif space-y-5">
                <div>
                    <label class="block text-primary font-headline text-xs mb-2 uppercase tracking-widest font-bold">Judul Foto <span class="text-red-500">*</span></label>
                    <input type="text" name="galeri_judul" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all placeholder:text-gray-300" placeholder="Contoh: Ibadah Minggu Pagi" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-xs mb-2 uppercase tracking-widest font-bold">Album <span class="text-red-500">*</span></label>
                    <select name="galeri_album_id" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                        <option value="">- Pilih Album -</option>
                        <?php foreach ($alb->result_array() as $a): ?>
                            <option value="<?php echo $a['album_id']; ?>"><?php echo $a['album_nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-primary font-headline text-xs mb-2 uppercase tracking-widest font-bold">File Gambar <span class="text-red-500">*</span></label>
                    <div class="relative group">
                        <input type="file" id="fileInput" accept="image/*" class="hidden" required onchange="updateFileName(this)">
                        <label for="fileInput" class="flex flex-col items-center justify-center w-full min-h-[120px] border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-secondary hover:bg-secondary/5 transition-all text-gray-500 group-hover:text-secondary">
                            <span class="material-symbols-outlined text-3xl mb-1">add_photo_alternate</span>
                            <span id="fileNameDisplay" class="text-xs font-headline tracking-widest uppercase">Klik untuk Pilih Gambar</span>
                            <span class="text-[10px] italic mt-1">(Maks 2MB, Resizing otomatis)</span>
                        </label>
                    </div>
                </div>
                
                <!-- Progress Bar Placeholder -->
                <div id="uploadProgress" class="hidden">
                    <div class="flex justify-between text-[10px] text-primary font-bold uppercase tracking-widest mb-1">
                        <span>Uploading...</span>
                        <span id="progressPercent">0%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-1">
                        <div id="progressBar" class="bg-secondary h-1 rounded-full w-0 transition-all duration-300"></div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-xs uppercase tracking-widest transition-colors">Batal</button>
                <button type="submit" id="btnSimpan" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-xs uppercase tracking-widest shadow-sm transition-all disabled:opacity-50 disabled:cursor-not-allowed">Simpan Foto</button>
            </div>
        </form>
    </div>
</div>

<?php foreach ($data->result_array() as $i) :
    $galeri_id=$i['galeri_id'];
    $galeri_judul=$i['galeri_judul'];
    $galeri_gambar=$i['galeri_gambar'];
    $galeri_album_id=$i['galeri_album_id'];
?>
<!-- Modal Edit: <?php echo $galeri_judul; ?> -->
<div id="ModalEdit<?php echo $galeri_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden flex flex-col">
        <form action="<?php echo base_url().'admin/galeri/update_galeri'?>" method="post" enctype="multipart/form-data">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white">
                <h4 class="font-headline tracking-widest text-lg uppercase">Edit Foto</h4>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $galeri_id;?>').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 font-serif space-y-5">
                <input type="hidden" name="kode" value="<?php echo $galeri_id;?>"/>
                <input type="hidden" value="<?php echo $galeri_gambar;?>" name="gambar">
                <div>
                    <label class="block text-primary font-headline text-xs mb-2 uppercase tracking-widest font-bold">Judul Foto</label>
                    <input type="text" name="xjudul" value="<?php echo $galeri_judul;?>" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-xs mb-2 uppercase tracking-widest font-bold">Album</label>
                    <select name="xalbum" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                        <?php foreach ($alb->result_array() as $a): ?>
                            <option value="<?php echo $a['album_id']; ?>" <?php echo ($galeri_album_id==$a['album_id'])?'selected':'';?>><?php echo $a['album_nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <div class="mb-4">
                        <label class="block text-primary font-headline text-[10px] mb-2 uppercase tracking-widest opacity-60">Foto Saat Ini</label>
                        <img src="<?php echo base_url().'assets/images/galeri/'.$galeri_gambar;?>" class="w-32 h-20 object-cover rounded-lg border">
                    </div>
                    <label class="block text-primary font-headline text-xs mb-2 uppercase tracking-widest font-bold">Ganti Foto (Opsional)</label>
                    <input type="file" name="filefoto" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-headline file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $galeri_id;?>').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-xs uppercase tracking-widest transition-colors">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-xs uppercase tracking-widest shadow-sm transition-colors">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus -->
<div id="ModalHapus<?php echo $galeri_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden p-8 text-center font-serif">
        <form action="<?php echo base_url().'admin/galeri/hapus_galeri'?>" method="post">
            <div class="w-16 h-16 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-3xl">delete_forever</span>
            </div>
            <h4 class="font-headline text-xl text-primary mb-2 uppercase tracking-wider">Hapus Foto?</h4>
            <p class="text-gray-600 text-sm mb-8 px-4 font-serif leading-relaxed">Hapus postingan <strong>"<?php echo $galeri_judul;?>"</strong>? Foto akan dihapus permanen dari server.</p>
            
            <input type="hidden" name="kode" value="<?php echo $galeri_id;?>"/>
            <input type="hidden" value="<?php echo $galeri_gambar;?>" name="gambar">
            <input type="hidden" value="<?php echo $galeri_album_id;?>" name="album">
            
            <div class="flex justify-center gap-3">
                <button type="button" onclick="document.getElementById('ModalHapus<?php echo $galeri_id;?>').classList.add('hidden')" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 font-headline tracking-widest text-xs uppercase transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-widest text-xs uppercase shadow-sm transition-colors">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach;?>

<!-- Include Pica and jQuery for Chunk Upload -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pica@8.0.0/dist/pica.min.js"></script>

<script>
    const pica = Pica();
    const chunkSize = 1 * 1024 * 1024; // 1MB

    function updateFileName(input) {
        const display = document.getElementById('fileNameDisplay');
        if (input.files && input.files[0]) {
            display.innerText = input.files[0].name;
            display.classList.add('text-secondary');
        }
    }

    $('#form_add_gallery').on('submit', function(e) {
        e.preventDefault();
        const fileInput = document.getElementById('fileInput');
        if (!fileInput.files || !fileInput.files[0]) return;

        $('#btnSimpan').prop('disabled', true).text('Processing...');
        $('#uploadProgress').removeClass('hidden');

        const file = fileInput.files[0];
        const img = new Image();
        const reader = new FileReader();

        reader.onload = function(event) {
            img.src = event.target.result;
            img.onload = function() {
                const canvas = document.createElement('canvas');
                let width = 1200; // Increased base width for better quality
                let height = Math.floor((img.height / img.width) * width);
                canvas.width = width;
                canvas.height = height;

                pica.resize(img, canvas).then(result => {
                    return pica.toBlob(result, 'image/jpeg', 0.9);
                }).then(resizedBlob => {
                    uploadInChunks(resizedBlob);
                });
            };
        };
        reader.readAsDataURL(file);
    });

    function uploadInChunks(blob) {
        const totalChunks = Math.ceil(blob.size / chunkSize);
        let currentChunk = 0;
        const fileName = `foto_galeri_${Date.now()}.jpg`;

        const title = $('input[name="galeri_judul"]').val();
        const category = $('select[name="galeri_album_id"]').val();

        function uploadNextChunk(start) {
            const end = Math.min(start + chunkSize, blob.size);
            const chunk = blob.slice(start, end);
            
            const formData = new FormData();
            formData.append('file', chunk);
            formData.append('name', fileName);
            formData.append('chunk', currentChunk);
            formData.append('chunks', totalChunks);
            formData.append('judul', title);
            formData.append('kategori', category);

            $.ajax({
                url: "<?= base_url('admin/galeri/uploadtoserver') ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    const xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            const percentLoaded = Math.round((currentChunk / totalChunks) * 100);
                            $('#progressBar').css('width', percentLoaded + '%');
                            $('#progressPercent').text(percentLoaded + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function(response) {
                    currentChunk++;
                    if (currentChunk < totalChunks) {
                        uploadNextChunk(currentChunk * chunkSize);
                    } else {
                        $('#progressBar').css('width', '100%');
                        $('#progressPercent').text('100%');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Upload gagal: ' + error);
                    alert('Gagal mengupload file ke server.');
                    $('#btnSimpan').prop('disabled', false).text('Simpan Foto');
                }
            });
        }

        uploadNextChunk(0);
    }
</script>

<!-- Toasts -->
<?php 
$msg = $this->session->flashdata('msg');
if($msg): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Berhasil!";
    
    if($msg == 'success') {
        $toastText = "Foto berhasil disimpan.";
    } elseif($msg == 'info') {
        $toastText = "Foto berhasil diupdate.";
    } elseif($msg == 'success-hapus') {
        $toastClass = "bg-red-600";
        $toastIcon = "delete_sweep";
        $toastText = "Foto berhasil dihapus.";
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3 transition-opacity duration-300">
    <span class="material-symbols-outlined text-2xl"><?php echo $toastIcon; ?></span>
    <span class="text-sm font-bold uppercase tracking-widest"><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-msg');
        if(toast) { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }
    }, 4000);
</script>
<?php endif; ?>
