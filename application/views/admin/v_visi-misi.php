<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-7xl">

    <!-- Admin Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <div>
            <?php 
            $this->load->view('components/section_header_left', array(
                'eyebrow' => 'Administrator',
                'title'   => 'Data Visi & Misi'
            )); 
            ?>
            <p class="text-gray-600 font-serif mt-2">Kelola konten visi dan misi gereja.</p>
        </div>
        <?php if (count($datatentang) == 0): ?>
        <button onclick="document.getElementById('ModalAdd').classList.remove('hidden')" class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-primary transition-colors shadow-soft whitespace-nowrap">
            + Tambah Visi & Misi
        </button>
        <?php endif; ?>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[900px]">
                <thead>
                    <tr class="bg-primary/5 text-primary font-headline text-sm tracking-wide border-b border-primary/20">
                        <th class="p-4 w-32">Gambar</th>
                        <th class="p-4">Judul</th>
                        <th class="p-4 w-40">Tanggal Update</th>
                        <th class="p-4 w-40">Author</th>
                        <th class="p-4 w-32">Views</th>
                        <th class="p-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 font-serif text-sm">
                    <?php
                        $no=0;
                        foreach ($datatentang as $i) :
                          $no++;
                          $tulisan_id=$i->tulisan_id;
                          $tulisan_judul=$i->tulisan_judul;
                          $tulisan_isi=$i->tulisan_isi;
                          $tulisan_tanggal=$i->tanggal;
                          $tulisan_author=$i->tulisan_author;
                          $tulisan_gambar=$i->tulisan_gambar;
                          $tulisan_views=$i->tulisan_views;
                          $kategori_id=$i->tulisan_kategori_id;
                          $kategori_nama=$i->tulisan_kategori_nama;
                    ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors text-sm">
                        <td class="p-4">
                            <img src="<?php echo base_url().'assets/images/'.$tulisan_gambar;?>" class="w-24 h-16 object-cover rounded-lg shadow-sm">
                        </td>
                        <td class="p-4">
                            <span class="font-bold text-primary block truncate max-w-xs"><?php echo $tulisan_judul;?></span>
                        </td>
                        <td class="p-4 text-gray-500 italic"><?php echo $tulisan_tanggal;?></td>
                        <td class="p-4"><span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-secondary text-base">person</span> <?php echo $tulisan_author;?></span></td>
                        <td class="p-4"><span class="flex items-center gap-1.5 text-gray-600"><span class="material-symbols-outlined text-base">visibility</span> <?php echo $tulisan_views;?> x</span></td>
                        <td class="p-4 text-right space-x-2 whitespace-nowrap">
                            <button onclick="document.getElementById('ModalEdit<?php echo $tulisan_id;?>').classList.remove('hidden')" class="text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 p-2 rounded-md" title="Edit">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                            <button onclick="document.getElementById('ModalHapus<?php echo $tulisan_id;?>').classList.remove('hidden')" class="text-red-600 hover:text-red-800 transition-colors bg-red-50 p-2 rounded-md" title="Hapus">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    
                    <?php if($no == 0): ?>
                    <tr>
                        <td colspan="6" class="p-12 text-center text-gray-400 italic">Belum ada konten visi & misi.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

  </div>
</section>

<!-- Modal Add -->
<div id="ModalAdd" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
        <form action="<?php echo base_url().'admin/visimisi/simpan_visimisi'?>" method="post" enctype="multipart/form-data" class="flex flex-col h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0">
                <h4 class="font-headline tracking-widest text-lg">Tambah Visi & Misi</h4>
                <button type="button" onclick="document.getElementById('ModalAdd').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-8 font-serif overflow-y-auto space-y-6">
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 capitalize">Judul</label>
                    <input type="text" name="xjudul" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" placeholder="Misal: Visi & Misi GKJ Tangerang" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 capitalize">Kategori</label>
                    <select name="xkategori" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                        <option value="">- Pilih Kategori -</option>
                        <?php foreach ($kat->result_array() as $row) : ?>
                            <option value="<?php echo $row['kategori_id']; ?>"><?php echo $row['kategori_nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 capitalize">Konten</label>
                    <textarea name="xisi" id="ckeditorAdd" rows="10" required></textarea>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 capitalize">Gambar Unggulan</label>
                    <input type="file" name="filefoto" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-5 flex justify-end gap-3 border-t border-gray-100 shrink-0">
                <button type="button" onclick="document.getElementById('ModalAdd').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-sm uppercase tracking-wider transition-colors">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-sm uppercase tracking-wider shadow-sm transition-colors uppercase">Simpan Konten</button>
            </div>
        </form>
    </div>
</div>

<?php foreach ($datatentang as $i) :
    $tulisan_id=$i->tulisan_id;
    $tulisan_judul=$i->tulisan_judul;
    $tulisan_isi=$i->tulisan_isi;
    $tulisan_gambar=$i->tulisan_gambar;
    $tulisan_author=$i->tulisan_author;
    $tulisan_kategori_id=$i->tulisan_kategori_id;
?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $tulisan_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl overflow-hidden flex flex-col max-h-[95vh]">
        <form action="<?php echo base_url().'admin/Visimisi/update_visimisi'?>" method="post" enctype="multipart/form-data" class="flex flex-col min-h-0 h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0 shadow-sm">
                <h4 class="font-headline tracking-widest text-lg">Update Visi & Misi</h4>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $tulisan_id;?>').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined font-bold">close</span>
                </button>
            </div>
            
            <div class="p-8 font-serif overflow-y-auto grow space-y-6 scrollbar-thin scrollbar-thumb-gray-200">
                <input type="hidden" name="kode" value="<?php echo $tulisan_id;?>"/>
                <input type="hidden" value="<?php echo $tulisan_gambar;?>" name="gambar">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Judul Konten</label>
                            <input type="text" name="xjudul" value="<?php echo htmlspecialchars($tulisan_judul);?>" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary outline-none transition-all font-serif text-sm" required>
                        </div>
                        <div>
                            <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Kategori</label>
                            <select name="xkategori" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary outline-none transition-all font-serif text-sm cursor-pointer" required>
                                <option value="">- Pilih Kategori -</option>
                                <?php foreach ($kat->result_array() as $row) : ?>
                                    <option value="<?php echo $row['kategori_id']; ?>" <?php echo ($row['kategori_id'] == $tulisan_kategori_id) ? 'selected' : ''; ?>><?php echo $row['kategori_nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Penulis / Author</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">person</span>
                                <input type="text" name="xauthor" value="<?php echo htmlspecialchars($tulisan_author);?>" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl pl-10 pr-4 py-3 focus:border-secondary outline-none transition-all font-serif text-sm" placeholder="Nama Penulis..." required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold">Gambar Unggulan</label>
                        <div class="relative group border-2 border-dashed border-gray-200 rounded-2xl p-4 bg-gray-50/30 hover:bg-gray-50 transition-all flex flex-col items-center justify-center">
                            <img src="<?php echo base_url().'assets/images/'.$tulisan_gambar;?>" class="w-full h-40 object-cover rounded-xl shadow-md mb-4 group-hover:opacity-75 transition-opacity">
                            <input type="file" name="filefoto" class="w-full text-[10px] text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-headline file:bg-primary file:text-white hover:file:bg-secondary cursor-pointer transition-all">
                            <p class="text-[9px] text-gray-400 mt-2 font-headline uppercase tracking-widest text-center italic">Kosongkan jika tidak ingin mengganti gambar</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2 text-center">Isi Visi & Misi</label>
                    <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                        <textarea name="xisi" id="ckeditorEdit<?php echo $tulisan_id; ?>" rows="10" required><?php echo $tulisan_isi;?></textarea>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-8 py-5 flex justify-end gap-3 border-t border-gray-100 shrink-0 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $tulisan_id;?>').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-[10px] uppercase tracking-[0.2em] transition-colors font-bold">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-[10px] uppercase tracking-[0.2em] shadow-lg transition-all hover:scale-[1.02] active:scale-95 font-bold">Update Konten Sekarang</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus -->
<div id="ModalHapus<?php echo $tulisan_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden p-8 text-center font-serif">
        <form action="<?php echo base_url().'admin/visimisi/hapus_visimisi'?>" method="post">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-3xl">warning</span>
            </div>
            <h4 class="font-headline text-xl text-primary mb-2">Hapus Konten?</h4>
            <p class="text-gray-500 text-sm mb-8 px-4">Anda yakin ingin menghapus data visi & misi <strong><?php echo $tulisan_judul;?></strong>? Tindakan ini tidak dapat dibatalkan.</p>
            
            <input type="hidden" name="kode" value="<?php echo $tulisan_id;?>"/>
            <input type="hidden" value="<?php echo $tulisan_gambar;?>" name="gambar">
            
            <div class="flex justify-center gap-3">
                <button type="button" onclick="document.getElementById('ModalHapus<?php echo $tulisan_id;?>').classList.add('hidden')" class="px-6 py-2.5 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 font-headline tracking-widest text-xs uppercase transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-widest text-xs uppercase shadow-sm transition-colors">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach;?>

<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if(document.getElementById('ckeditorAdd')) {
            CKEDITOR.replace('ckeditorAdd');
        }
        <?php foreach ($datatentang as $i): ?>
            if(document.getElementById('ckeditorEdit<?php echo $i->tulisan_id; ?>')) {
                CKEDITOR.replace('ckeditorEdit<?php echo $i->tulisan_id; ?>');
            }
        <?php endforeach; ?>
    });
</script>

<!-- Toast Notifications -->
<?php 
$msg = $this->session->flashdata('msg');
$allowed_msgs = array('success', 'info', 'success-hapus');
if (in_array($msg, $allowed_msgs, true)): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Berhasil memperbarui data.";
    if($msg == 'success') {
        $toastText = "Konten berhasil disimpan.";
    } elseif($msg == 'info') {
        $toastText = "Konten berhasil diupdate.";
    } elseif($msg == 'success-hapus') {
        $toastClass = "bg-red-600";
        $toastIcon = "delete_sweep";
        $toastText = "Konten berhasil dihapus.";
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3 transition-opacity">
    <span class="material-symbols-outlined text-2xl"><?php echo $toastIcon; ?></span>
    <span class="text-sm"><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-msg');
        if(toast) { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }
    }, 4000);
</script>
<?php endif; ?>
