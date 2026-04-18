<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-7xl">
    
    <!-- Admin Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <div>
            <?php 
            $this->load->view('components/section_header_left', array(
                'eyebrow' => 'Administrator',
                'title'   => 'Data Album'
            )); 
            ?>
            <p class="text-gray-600 font-serif mt-2 text-sm max-w-xl">Kelola album galeri foto untuk mendokumentasikan setiap kegiatan dan pelayanan gereja.</p>
        </div>
        <button onclick="document.getElementById('modalAdd').classList.remove('hidden')" class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-primary transition-colors shadow-soft whitespace-nowrap">
            + Tambah Album
        </button>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr class="bg-primary/5 text-primary font-headline text-sm tracking-wide border-b border-primary/20">
                        <th class="p-4 w-32 text-center">Cover</th>
                        <th class="p-4">Nama Album</th>
                        <th class="p-4 w-40">Tanggal Buat</th>
                        <th class="p-4 w-40">Author</th>
                        <th class="p-4 w-24 text-center">Jumlah Foto</th>
                        <th class="p-4 w-32 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 font-serif text-sm">
                    <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
          					   $no++;
          					   $album_id=$i['album_id'];
          					   $album_nama=$i['album_nama'];
          					   $album_tanggal=$i['tanggal'];
          					   $album_author=$i['album_author'];
          					   $album_cover=$i['album_cover'];
          					   $album_jumlah=$i['album_count'];
                    ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <img src="<?php echo base_url().'assets/images/'.$album_cover;?>" class="w-24 h-16 object-cover rounded-lg shadow-sm border border-gray-100 mx-auto">
                        </td>
                        <td class="p-4">
                            <span class="font-bold text-primary block text-base"><?php echo $album_nama;?></span>
                        </td>
                        <td class="p-4 text-gray-500 italic"><?php echo $album_tanggal;?></td>
                        <td class="p-4">
                            <span class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary text-base">person</span>
                                <?php echo $album_author;?>
                            </span>
                        </td>
                        <td class="p-4 text-center font-bold text-secondary"><?php echo $album_jumlah;?></td>
                        <td class="p-4 text-right space-x-2 whitespace-nowrap">
                            <button onclick="openEditModal('<?php echo $album_id;?>', '<?php echo htmlspecialchars($album_nama, ENT_QUOTES);?>', '<?php echo $album_cover;?>')" class="inline-block text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 p-2 rounded-md" title="Edit">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                            <button onclick="openDeleteModal('<?php echo $album_id;?>', '<?php echo htmlspecialchars($album_nama, ENT_QUOTES);?>', '<?php echo $album_cover;?>')" class="text-red-600 hover:text-red-800 transition-colors bg-red-50 p-2 rounded-md" title="Hapus">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    
                    <?php if($no == 0): ?>
                    <tr>
                        <td colspan="6" class="p-12 text-center text-gray-400 italic font-serif text-lg">Belum ada album yang dibuat.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</section>

<!-- Modal Add -->
<div id="modalAdd" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden flex flex-col">
        <form action="<?php echo base_url().'admin/album/simpan_album'?>" method="post" enctype="multipart/form-data">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white">
                <h4 class="font-headline tracking-widest text-base uppercase">Tambah Album Baru</h4>
                <button type="button" onclick="document.getElementById('modalAdd').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-8 space-y-6">
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold">Nama Album</label>
                    <input type="text" name="xnama_album" class="w-full bg-cream border-0 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-secondary transition-all" placeholder="Nama album kegiatan..." required>
                </div>
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold">Cover Album</label>
                    <input type="file" name="filefoto" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-headline file:bg-primary/5 file:text-primary hover:file:bg-primary/10 transition-colors" required>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('modalAdd').classList.add('hidden')" class="px-6 py-2 text-gray-500 hover:text-gray-700 font-headline text-[10px] uppercase tracking-widest transition-colors">Batal</button>
                <button type="submit" class="px-8 py-2 bg-secondary text-white rounded-md hover:bg-primary font-headline text-[10px] uppercase tracking-widest shadow-sm transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modalEdit" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden flex flex-col">
        <form action="<?php echo base_url().'admin/album/update_album'?>" method="post" enctype="multipart/form-data">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white">
                <h4 class="font-headline tracking-widest text-base uppercase">Edit Album</h4>
                <button type="button" onclick="document.getElementById('modalEdit').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-8 space-y-6">
                <input type="hidden" name="kode" id="edit_kode">
                <input type="hidden" name="gambar" id="edit_gambar_old">
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold">Nama Album</label>
                    <input type="text" name="xnama_album" id="edit_nama" class="w-full bg-cream border-0 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-secondary transition-all" required>
                </div>
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold">Cover Baru (Opsional)</label>
                    <input type="file" name="filefoto" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-headline file:bg-primary/5 file:text-primary hover:file:bg-primary/10 transition-colors">
                </div>
                <div class="pt-2">
                    <p class="text-[9px] text-gray-400 uppercase tracking-widest mb-2 font-bold">Cover Saat Ini:</p>
                    <img id="edit_preview" src="" class="w-full h-32 object-cover rounded-lg border border-gray-100">
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('modalEdit').classList.add('hidden')" class="px-6 py-2 text-gray-500 hover:text-gray-700 font-headline text-[10px] uppercase tracking-widest transition-colors">Batal</button>
                <button type="submit" class="px-8 py-2 bg-secondary text-white rounded-md hover:bg-primary font-headline text-[10px] uppercase tracking-widest shadow-sm transition-colors">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus -->
<div id="modalDelete" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden p-8 text-center">
        <form action="<?php echo base_url().'admin/album/hapus_album'?>" method="post">
            <div class="w-16 h-16 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-3xl">warning</span>
            </div>
            <h4 class="font-headline text-xl text-primary mb-2 uppercase tracking-wider">Hapus Album?</h4>
            <p class="text-gray-600 text-sm mb-8 px-4 font-serif leading-relaxed">Apakah Anda yakin mau menghapus album <strong id="delete_nama"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
            
            <input type="hidden" name="kode" id="delete_kode">
            <input type="hidden" name="gambar" id="delete_gambar">
            
            <div class="flex justify-center gap-3">
                <button type="button" onclick="document.getElementById('modalDelete').classList.add('hidden')" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 font-headline tracking-widest text-[10px] uppercase transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-widest text-[10px] uppercase shadow-sm transition-colors">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, nama, cover) {
        document.getElementById('edit_kode').value = id;
        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_gambar_old').value = cover;
        document.getElementById('edit_preview').src = '<?php echo base_url()."assets/images/"; ?>' + cover;
        document.getElementById('modalEdit').classList.remove('hidden');
    }

    function openDeleteModal(id, nama, cover) {
        document.getElementById('delete_kode').value = id;
        document.getElementById('delete_nama').innerText = nama;
        document.getElementById('delete_gambar').value = cover;
        document.getElementById('modalDelete').classList.remove('hidden');
    }
</script>

<!-- Toasts / Notifications -->
<?php 
$msg = $this->session->flashdata('msg');
if($msg): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Berhasil!";
    
    if($msg == 'success') {
        $toastText = "Album berhasil disimpan.";
    } elseif($msg == 'info') {
        $toastText = "Album berhasil diperbarui.";
    } elseif($msg == 'success-hapus') {
        $toastClass = "bg-red-600";
        $toastIcon = "delete_sweep";
        $toastText = "Album berhasil dihapus.";
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
