<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-7xl">

    <!-- Admin Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <div>
            <?php 
            $this->load->view('components/section_header_left', array(
                'eyebrow' => 'Administrator',
                'title'   => 'Slide Header'
            )); 
            ?>
            <p class="text-gray-600 font-serif mt-2">Kelola konten slider/hero image yang tampil di homepage utama.</p>
        </div>
        <a href="<?php echo base_url().'admin/slideheader/add_slideheader'?>" class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-primary transition-colors shadow-soft whitespace-nowrap flex items-center gap-2">
            <span class="material-symbols-outlined text-lg">add_a_photo</span>
            Tambah Slide
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[900px]">
                <thead>
                    <tr class="bg-primary/5 text-primary font-headline text-sm tracking-wide border-b border-primary/20">
                        <th class="p-4 w-32">Gambar</th>
                        <th class="p-4">Judul</th>
                        <th class="p-4 w-40">Tanggal Buat</th>
                        <th class="p-4 w-40">Status</th>
                        <th class="p-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 font-serif text-sm">
                    <?php
                        $no=0;
                        foreach ($data->result_array() as $i) :
                           $no++;
                           $galeri_id=$i['id_header'];
                           $galeri_judul=$i['judul_header'];
                           $galeri_tanggal=$i['tanggal'];
                           $galeri_gambar=$i['gambar'];
                           $galeri_status=$i['status'];
                    ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors text-sm">
                        <td class="p-4">
                            <img src="<?php echo base_url().'assets/images/header/'.$galeri_gambar;?>" class="w-24 h-16 object-cover rounded-lg shadow-sm">
                        </td>
                        <td class="p-4">
                            <span class="font-bold text-primary block truncate max-w-xs"><?php echo $galeri_judul;?></span>
                        </td>
                        <td class="p-4 text-gray-500 italic"><?php echo $galeri_tanggal;?></td>
                        <td class="p-4">
                            <?php if ($galeri_status > 0): ?>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-green-50 text-green-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                                    Aktif
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-gray-50 text-gray-500">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                    Tidak Aktif
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 text-right space-x-2 whitespace-nowrap">
                            <button onclick="document.getElementById('ModalEdit<?php echo $galeri_id;?>').classList.remove('hidden')" class="text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 p-2 rounded-md" title="Edit">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                            <button onclick="document.getElementById('ModalHapus<?php echo $galeri_id;?>').classList.remove('hidden')" class="text-red-600 hover:text-red-800 transition-colors bg-red-50 p-2 rounded-md" title="Hapus">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    
                    <?php if($no == 0): ?>
                    <tr>
                        <td colspan="5" class="p-12 text-center text-gray-400 italic">Belum ada slide header. Silakan tambahkan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

  </div>
</section>

<!-- Modal Edit -->
<?php foreach ($data->result_array() as $i) :
    $galeri_id=$i['id_header'];
    $galeri_judul=$i['judul_header'];
    $galeri_gambar=$i['gambar'];
    $galeri_status=$i['status'];
?>
<div id="ModalEdit<?php echo $galeri_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-[95vw] max-w-5xl max-h-[90vh] overflow-y-auto flex flex-col">
        <form action="<?php echo base_url().'admin/slideheader/update_galeri'?>" method="post" enctype="multipart/form-data" class="flex flex-col h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0 sticky top-0 z-10">
                <h4 class="font-headline tracking-widest text-lg">Edit Slide</h4>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $galeri_id;?>').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <div class="p-6 md:p-10 font-serif space-y-6 flex-grow">
                <input type="hidden" name="kode" value="<?php echo $galeri_id;?>"/>
                <input type="hidden" value="<?php echo $galeri_gambar;?>" name="gambar">

                <!-- Judul -->
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 capitalize">Judul</label>
                    <input type="text" name="xjudul" value="<?php echo htmlspecialchars($galeri_judul);?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 bg-gray-50 text-gray-500 cursor-not-allowed outline-none font-serif text-sm" placeholder="Judul" readonly>
                </div>

                <!-- Preview Image -->
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 capitalize">Preview Image</label>
                    <?php if (!empty($galeri_gambar)): ?>
                        <img src="<?php echo base_url().'assets/images/header/'.$galeri_gambar;?>" class="w-full h-[320px] md:h-[420px] object-cover rounded-xl shadow-md" alt="Preview Slide">
                    <?php else: ?>
                        <div class="w-full min-h-[320px] flex items-center justify-center bg-gray-100 rounded-xl border border-dashed border-gray-300 text-gray-400 font-serif text-sm">
                            Belum ada gambar
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Status Switch -->
                <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                    <div>
                        <span class="block text-primary font-headline text-sm font-bold">Status Aktif</span>
                        <span class="text-xs text-gray-500 font-serif">Aktifkan untuk menampilkan slide ini di homepage.</span>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="status" value="1" <?php echo $galeri_status == 1 ? 'checked' : ''; ?> class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary"></div>
                    </label>
                </div>
            </div>

            <div class="bg-gray-50 px-8 py-5 flex justify-end gap-3 border-t border-gray-100 shrink-0 sticky bottom-0 z-10">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $galeri_id;?>').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-xs uppercase tracking-wider transition-colors font-bold">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-xs uppercase tracking-wider shadow-sm transition-colors font-bold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach;?>

<!-- Modal Hapus -->
<?php foreach ($data->result_array() as $i) :
    $galeri_id=$i['id_header'];
    $galeri_judul=$i['judul_header'];
    $galeri_gambar=$i['gambar'];
?>
<div id="ModalHapus<?php echo $galeri_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden p-8 text-center font-serif">
        <form action="<?php echo base_url().'admin/slideheader/hapus_slideheader'?>" method="post">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-3xl">warning</span>
            </div>
            <h4 class="font-headline text-xl text-primary mb-2">Hapus Slide?</h4>
            <p class="text-gray-500 text-sm mb-8 px-4">Anda yakin ingin menghapus slide <strong><?php echo $galeri_judul;?></strong>? Tindakan ini tidak dapat dibatalkan.</p>
            
            <input type="hidden" name="kode" value="<?php echo $galeri_id;?>"/>
            <input type="hidden" value="<?php echo $galeri_gambar;?>" name="gambar">
            
            <div class="flex justify-center gap-3">
                <button type="button" onclick="document.getElementById('ModalHapus<?php echo $galeri_id;?>').classList.add('hidden')" class="px-6 py-2.5 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 font-headline tracking-widest text-xs uppercase transition-colors font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-widest text-xs uppercase shadow-sm transition-colors font-bold">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach;?>

<!-- Toast Notifications -->
<?php 
$msg = $this->session->flashdata('msg');
$allowed_msgs = array('success', 'info', 'success-hapus');
if (in_array($msg, $allowed_msgs, true)): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Berhasil memperbarui data.";
    if($msg == 'success') {
        $toastText = "Slide Header berhasil disimpan.";
    } elseif($msg == 'info') {
        $toastText = "Slide Header berhasil diupdate.";
    } elseif($msg == 'success-hapus') {
        $toastClass = "bg-red-600";
        $toastIcon = "delete_sweep";
        $toastText = "Slide Header berhasil dihapus.";
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
