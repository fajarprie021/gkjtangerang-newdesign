<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-7xl">
    
    <!-- Admin Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <div>
            <?php 
            $this->load->view('components/section_header_left', array(
                'eyebrow' => 'Administrator',
                'title'   => 'Data Agenda'
            )); 
            ?>
            <p class="text-gray-600 font-serif mt-2">Kelola jadwal kegiatan dan acara gereja.</p>
        </div>
        <button onclick="document.getElementById('myModal').classList.remove('hidden')" class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-primary transition-colors shadow-soft whitespace-nowrap">
            + Tambah Agenda
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[900px]">
                <thead>
                    <tr class="bg-primary/5 text-primary font-headline text-sm tracking-wide border-b border-primary/20">
                        <th class="p-4 w-12">#</th>
                        <th class="p-4 w-64">Nama & Deskripsi Agenda</th>
                        <th class="p-4 w-40">Tgl Pelaksanaan</th>
                        <th class="p-4 w-48">Waktu & Tempat</th>
                        <th class="p-4 w-48">Keterangan / Author</th>
                        <th class="p-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 font-serif text-sm">
                    <?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                       $agenda_id=$i['agenda_id'];
                       $agenda_nama=$i['agenda_nama'];
                       $agenda_deskripsi=$i['agenda_deskripsi'];
                       $agenda_mulai=$i['agenda_mulai'];
                       $agenda_selesai=$i['agenda_selesai'];
                       $agenda_tempat=$i['agenda_tempat'];
                       $agenda_waktu=$i['agenda_waktu'];
                       $agenda_keterangan=$i['agenda_keterangan'];
                       $agenda_author=$i['agenda_author'];
                       $tanggal=$i['tanggal'];
                    ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="p-4 align-top"><?php echo $no;?></td>
                        <td class="p-4 align-top">
                            <span class="font-bold text-primary block mb-1">
                                <?php echo $agenda_nama;?>
                            </span>
                            <p class="text-xs text-gray-500 line-clamp-2"><?php echo strip_tags($agenda_deskripsi);?></p>
                        </td>
                        <td class="p-4 align-top">
                            <span class="inline-flex flex-col">
                                <span class="bg-primary text-white px-2 py-0.5 rounded text-[10px] mb-1 w-max uppercase tracking-wider font-headline">Mulai: <?php echo $agenda_mulai;?></span>
                                <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded text-[10px] w-max border border-gray-200 uppercase tracking-wider font-headline">Selesai: <?php echo $agenda_selesai;?></span>
                            </span>
                        </td>
                        <td class="p-4 align-top">
                            <span class="flex items-center gap-1.5 text-secondary font-bold text-xs mb-1">
                                <span class="material-symbols-outlined text-[14px]">schedule</span> <?php echo $agenda_waktu;?>
                            </span>
                            <span class="flex items-start gap-1.5 text-gray-600 text-xs">
                                <span class="material-symbols-outlined text-[14px]">location_on</span> <span class="line-clamp-2"><?php echo $agenda_tempat;?></span>
                            </span>
                        </td>
                        <td class="p-4 align-top">
                            <p class="text-xs italic text-gray-600 mb-1 line-clamp-1 border-b border-dashed border-gray-200 pb-1"><?php echo empty($agenda_keterangan) ? '-' : $agenda_keterangan; ?></p>
                            <span class="flex items-center gap-1 text-xs text-primary font-bold">
                                <span class="material-symbols-outlined text-[14px]">person</span> <?php echo $agenda_author;?>
                            </span>
                        </td>
                        <td class="p-4 align-top text-right space-x-2 whitespace-nowrap">
                            <button onclick="document.getElementById('ModalEdit<?php echo $agenda_id;?>').classList.remove('hidden')" class="text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 p-1.5 rounded-md" title="Edit">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                            <button onclick="document.getElementById('ModalHapus<?php echo $agenda_id;?>').classList.remove('hidden')" class="text-red-600 hover:text-red-800 transition-colors bg-red-50 p-1.5 rounded-md" title="Hapus">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    
                    <?php if($no == 0): ?>
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">Belum ada data agenda.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</section>

<!-- Modal Add Agenda -->
<div id="myModal" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl overflow-hidden flex flex-col max-h-[95vh]">
        <form action="<?php echo base_url().'admin/agenda/simpan_agenda'?>" method="post" class="flex flex-col min-h-0 h-full font-serif">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0 shadow-sm">
                <h4 class="font-headline tracking-widest text-lg">Tambah Agenda Baru</h4>
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined font-bold">close</span>
                </button>
            </div>
            <div class="p-8 grow overflow-y-auto space-y-6 scrollbar-thin scrollbar-thumb-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Nama Agenda <span class="text-red-500">*</span></label>
                        <input type="text" name="xnama_agenda" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" placeholder="Misal: Ibadah Syukur" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Deskripsi Agenda <span class="text-red-500">*</span></label>
                        <textarea name="xdeskripsi" rows="3" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" placeholder="Singkat tentang acara..." required></textarea>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Tgl Mulai <span class="text-red-500">*</span></label>
                        <input type="date" name="xmulai" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Tgl Selesai <span class="text-red-500">*</span></label>
                        <input type="date" name="xselesai" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2 text-secondary flex items-center gap-2"><span class="material-symbols-outlined text-sm">location_on</span> Tempat <span class="text-red-500">*</span></label>
                        <input type="text" name="xtempat" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" placeholder="Misal: Gedung GKJ" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2 text-secondary flex items-center gap-2"><span class="material-symbols-outlined text-sm">schedule</span> Waktu <span class="text-red-500">*</span></label>
                        <input type="text" name="xwaktu" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" placeholder="Misal: 10.30 - 11.00 WIB" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Keterangan Tambahan</label>
                        <textarea name="xketerangan" rows="2" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" placeholder="Boleh dikosongkan..."></textarea>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-5 flex justify-end gap-3 border-t border-gray-100 shrink-0 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-[10px] uppercase tracking-[0.2em] font-bold transition-colors">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold shadow-lg transition-all hover:scale-[1.02] active:scale-95">Simpan Agenda Sekarang</button>
            </div>
        </form>
    </div>
</div>

<!-- Modals Edit & Hapus -->
<?php foreach ($data->result_array() as $i) :
    $agenda_id=$i['agenda_id'];
    $agenda_nama=$i['agenda_nama'];
    $agenda_deskripsi=$i['agenda_deskripsi'];
    $agenda_mulai=$i['agenda_mulai'];
    $agenda_selesai=$i['agenda_selesai'];
    $agenda_tempat=$i['agenda_tempat'];
    $agenda_waktu=$i['agenda_waktu'];
    $agenda_keterangan=$i['agenda_keterangan'];
?>
<!-- Modal Edit: <?php echo $agenda_nama; ?> -->
<div id="ModalEdit<?php echo $agenda_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl overflow-hidden flex flex-col max-h-[95vh]">
        <form action="<?php echo base_url().'admin/agenda/update_agenda'?>" method="post" class="flex flex-col min-h-0 h-full font-serif">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0 shadow-sm">
                <h4 class="font-headline tracking-widest text-lg">Update Data Agenda</h4>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $agenda_id;?>').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined font-bold">close</span>
                </button>
            </div>
            <div class="p-8 grow overflow-y-auto space-y-6 scrollbar-thin scrollbar-thumb-gray-200">
                <input type="hidden" name="kode" value="<?php echo $agenda_id;?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Nama Agenda <span class="text-red-500">*</span></label>
                        <input type="text" name="xnama_agenda" value="<?php echo htmlspecialchars($agenda_nama);?>" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Deskripsi Agenda <span class="text-red-500">*</span></label>
                        <textarea name="xdeskripsi" rows="3" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" required><?php echo $agenda_deskripsi;?></textarea>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Tgl Mulai <span class="text-red-500">*</span></label>
                        <input type="date" name="xmulai" value="<?php echo date('Y-m-d', strtotime($agenda_mulai));?>" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Tgl Selesai <span class="text-red-500">*</span></label>
                        <input type="date" name="xselesai" value="<?php echo date('Y-m-d', strtotime($agenda_selesai));?>" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2 text-secondary flex items-center gap-2"><span class="material-symbols-outlined text-sm">location_on</span> Tempat <span class="text-red-500">*</span></label>
                        <input type="text" name="xtempat" value="<?php echo htmlspecialchars($agenda_tempat);?>" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2 text-secondary flex items-center gap-2"><span class="material-symbols-outlined text-sm">schedule</span> Waktu <span class="text-red-500">*</span></label>
                        <input type="text" name="xwaktu" value="<?php echo htmlspecialchars($agenda_waktu);?>" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold mb-2">Keterangan Tambahan</label>
                        <textarea name="xketerangan" rows="2" class="w-full border border-gray-200 bg-gray-50/50 rounded-xl px-4 py-3 focus:border-secondary transition-all outline-none"><?php echo $agenda_keterangan;?></textarea>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-8 py-5 flex justify-end gap-3 border-t border-gray-100 shrink-0 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $agenda_id;?>').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-[10px] uppercase tracking-[0.2em] font-bold transition-colors">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-[10px] uppercase tracking-[0.2em] font-bold shadow-lg transition-all hover:scale-[1.02] active:scale-95">Update Agenda Sekarang</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus: <?php echo $agenda_nama; ?> -->
<div id="ModalHapus<?php echo $agenda_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden p-8 text-center font-serif">
        <form action="<?php echo base_url().'admin/agenda/hapus_agenda'?>" method="post">
            <div class="w-16 h-16 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-3xl">warning</span>
            </div>
            <h4 class="font-headline text-xl text-primary mb-2 uppercase tracking-wider">Hapus Agenda?</h4>
            <p class="text-gray-600 text-sm mb-8 px-4 font-serif">Apakah Anda yakin mau menghapus agenda <strong><?php echo $agenda_nama;?></strong>? Tindakan ini tidak dapat dibatalkan.</p>
            
            <input type="hidden" name="kode" value="<?php echo $agenda_id;?>"/>
            
            <div class="flex justify-center gap-3">
                <button type="button" onclick="document.getElementById('ModalHapus<?php echo $agenda_id;?>').classList.add('hidden')" class="px-6 py-2.5 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 font-headline tracking-widest text-xs uppercase transition-colors">Batal</button>
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
    $toastText = "Tindakan berhasil.";
    
    if($msg == 'success') {
        $toastText = "Agenda berhasil disimpan.";
    } elseif($msg == 'success-hapus') {
        $toastClass = "bg-red-600";
        $toastIcon = "delete";
        $toastText = "Agenda berhasil dihapus.";
    } elseif($msg == 'info') {
        $toastClass = "bg-blue-500";
        $toastIcon = "info";
        $toastText = "Agenda berhasil diupdate.";
    } elseif($msg == 'error') {
        $toastClass = "bg-red-500";
        $toastIcon = "error";
        $toastText = "Terjadi kesalahan.";
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3 transition-opacity duration-300">
    <span class="material-symbols-outlined text-2xl"><?php echo $toastIcon; ?></span>
    <span class="text-sm"><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-msg');
        if(toast) {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }, 4000);
</script>
<?php endif; ?>
