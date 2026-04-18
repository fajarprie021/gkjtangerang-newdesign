<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-7xl">
    
    <!-- Admin Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <div>
            <?php 
            $this->load->view('components/section_header_left', array(
                'eyebrow' => 'Administrator',
                'title'   => 'Kategori Berita'
            )); 
            ?>
            <p class="text-gray-600 font-serif mt-2">Kelola kategori untuk pengelompokan berita dan tulisan.</p>
        </div>
        <button onclick="document.getElementById('ModalAdd').classList.remove('hidden')" class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-primary transition-colors shadow-soft whitespace-nowrap">
            + Tambah Kategori
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary max-w-3xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary/5 text-primary font-headline text-sm tracking-wide border-b border-primary/20">
                        <th class="p-4 w-16">#</th>
                        <th class="p-4">Nama Kategori</th>
                        <th class="p-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 font-serif text-sm">
                    <?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                       $kategori_id=$i['kategori_id'];
                       $kategori_nama=$i['kategori_nama'];
                    ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="p-4"><?php echo $no;?></td>
                        <td class="p-4">
                            <span class="font-bold text-primary"><?php echo $kategori_nama;?></span>
                        </td>
                        <td class="p-4 text-right space-x-2 whitespace-nowrap">
                            <button onclick="document.getElementById('ModalEdit<?php echo $kategori_id;?>').classList.remove('hidden')" class="text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 p-2 rounded-md" title="Edit">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                            <button onclick="document.getElementById('ModalHapus<?php echo $kategori_id;?>').classList.remove('hidden')" class="text-red-600 hover:text-red-800 transition-colors bg-red-50 p-2 rounded-md" title="Hapus">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    
                    <?php if($no == 0): ?>
                    <tr>
                        <td colspan="3" class="p-12 text-center text-gray-400 italic font-serif">Belum ada data kategori.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</section>

<!-- Modal Add Kategori -->
<div id="ModalAdd" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden flex flex-col">
        <form action="<?php echo base_url().'admin/kategori/simpan_kategori'?>" method="post">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white">
                <h4 class="font-headline tracking-widest text-lg uppercase">Tambah Kategori</h4>
                <button type="button" onclick="document.getElementById('ModalAdd').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-8 font-serif">
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Nama Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="xkategori" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" placeholder="Misal: Warta Jemaat" required>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-5 flex justify-end gap-3 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('ModalAdd').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-xs uppercase tracking-widest transition-colors">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-xs uppercase tracking-widest shadow-sm transition-colors">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>

<?php foreach ($data->result_array() as $i) :
    $kategori_id=$i['kategori_id'];
    $kategori_nama=$i['kategori_nama'];
?>
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $kategori_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden flex flex-col">
        <form action="<?php echo base_url().'admin/kategori/update_kategori'?>" method="post">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white">
                <h4 class="font-headline tracking-widest text-lg uppercase">Update Kategori</h4>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $kategori_id;?>').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-8 font-serif">
                <input type="hidden" name="kode" value="<?php echo $kategori_id;?>">
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Nama Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="xkategori" value="<?php echo $kategori_nama;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-5 flex justify-end gap-3 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $kategori_id;?>').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-xs uppercase tracking-widest transition-colors">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-xs uppercase tracking-widest shadow-sm transition-colors">Update Kategori</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus -->
<div id="ModalHapus<?php echo $kategori_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden p-8 text-center font-serif">
        <form action="<?php echo base_url().'admin/kategori/hapus_kategori'?>" method="post">
            <div class="w-16 h-16 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-3xl">warning</span>
            </div>
            <h4 class="font-headline text-xl text-primary mb-2 uppercase tracking-wider">Hapus Kategori?</h4>
            <p class="text-gray-600 text-sm mb-8 px-4 font-serif">Apakah Anda yakin mau menghapus kategori <strong><?php echo $kategori_nama;?></strong>? Tindakan ini tidak dapat dibatalkan.</p>
            
            <input type="hidden" name="kode" value="<?php echo $kategori_id;?>"/>
            
            <div class="flex justify-center gap-3">
                <button type="button" onclick="document.getElementById('ModalHapus<?php echo $kategori_id;?>').classList.add('hidden')" class="px-6 py-2.5 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 font-headline tracking-widest text-xs uppercase transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-widest text-xs uppercase shadow-sm transition-colors">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach;?>

<!-- Notifications / Toasts -->
<?php 
$msg = $this->session->flashdata('msg');
if($msg): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Berhasil memperbarui data.";
    if($msg == 'success') {
        $toastText = "Kategori berhasil disimpan.";
    } elseif($msg == 'info') {
        $toastText = "Kategori berhasil diupdate.";
    } elseif($msg == 'success-hapus') {
        $toastClass = "bg-red-600";
        $toastIcon = "delete_sweep";
        $toastText = "Kategori berhasil dihapus.";
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3 transition-opacity duration-300">
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
