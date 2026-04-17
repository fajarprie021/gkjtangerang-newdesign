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
            <p class="text-gray-600 font-serif mt-2">Kelola agenda dan kegiatan gereja.</p>
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
                        <th class="p-4 w-40">Tanggal</th>
                        <th class="p-4">Nama Agenda</th>
                        <th class="p-4 w-48">Periode</th>
                        <th class="p-4 w-40">Tempat</th>
                        <th class="p-4 w-32">Waktu</th>
                        <th class="p-4 w-36">Author</th>
                        <th class="p-4 w-24 text-right">Aksi</th>
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
                        <td class="p-4 text-gray-500"><?php echo $tanggal;?></td>
                        <td class="p-4">
                            <span class="font-bold text-primary"><?php echo $agenda_nama;?></span>
                            <?php if(!empty($agenda_deskripsi)): ?>
                            <p class="text-xs text-gray-500 mt-1 line-clamp-1"><?php echo strip_tags($agenda_deskripsi);?></p>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 text-xs text-gray-600"><?php echo $agenda_mulai.' s/d '.$agenda_selesai;?></td>
                        <td class="p-4"><?php echo $agenda_tempat;?></td>
                        <td class="p-4"><?php echo $agenda_waktu;?></td>
                        <td class="p-4"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-[16px]">person</span> <?php echo $agenda_author;?></span></td>
                        <td class="p-4 text-right space-x-2">
                            <button onclick="document.getElementById('ModalEdit<?php echo $agenda_id;?>').classList.remove('hidden')" class="text-blue-600 hover:text-blue-800 transition-colors" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button onclick="document.getElementById('ModalHapus<?php echo $agenda_id;?>').classList.remove('hidden')" class="text-red-600 hover:text-red-800 transition-colors" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>

                    <?php if($no == 0): ?>
                    <tr>
                        <td colspan="7" class="p-8 text-center text-gray-500">Belum ada data agenda.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

  </div>
</section>

<!-- Modal Tambah Agenda -->
<div id="myModal" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
        <form action="<?php echo base_url().'admin/agenda/simpan_agenda'?>" method="post" class="flex flex-col h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0">
                <h4 class="font-headline tracking-widest text-lg">Tambah Agenda</h4>
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 space-y-4 font-serif overflow-y-auto">
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Nama Agenda</label>
                    <input type="text" name="xnama_agenda" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" placeholder="Nama Agenda" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Deskripsi</label>
                    <textarea name="xdeskripsi" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" placeholder="Deskripsi agenda..." required></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-primary font-headline text-sm mb-2">Mulai</label>
                        <input type="date" name="xmulai" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-sm mb-2">Selesai</label>
                        <input type="date" name="xselesai" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-primary font-headline text-sm mb-2">Tempat</label>
                        <input type="text" name="xtempat" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" placeholder="Tempat" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-sm mb-2">Waktu</label>
                        <input type="text" name="xwaktu" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" placeholder="Contoh: 10.30-11.00 WIB" required>
                    </div>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Keterangan</label>
                    <textarea name="xketerangan" rows="2" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" placeholder="Keterangan tambahan..."></textarea>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100 shrink-0">
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="px-6 py-2.5 text-gray-600 hover:text-gray-800 font-headline text-sm uppercase tracking-wider transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-secondary text-white rounded-md hover:bg-primary font-headline text-sm uppercase tracking-wider shadow-sm transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modals Edit & Hapus per item -->
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
<!-- Modal Edit -->
<div id="ModalEdit<?php echo $agenda_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
        <form action="<?php echo base_url().'admin/agenda/update_agenda'?>" method="post" class="flex flex-col h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0">
                <h4 class="font-headline tracking-widest text-lg">Edit Agenda</h4>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $agenda_id;?>').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 space-y-4 font-serif overflow-y-auto">
                <input type="hidden" name="kode" value="<?php echo $agenda_id;?>">
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Nama Agenda</label>
                    <input type="text" name="xnama_agenda" value="<?php echo $agenda_nama;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Deskripsi</label>
                    <textarea name="xdeskripsi" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required><?php echo $agenda_deskripsi;?></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-primary font-headline text-sm mb-2">Mulai</label>
                        <input type="text" name="xmulai" value="<?php echo $agenda_mulai;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-sm mb-2">Selesai</label>
                        <input type="text" name="xselesai" value="<?php echo $agenda_selesai;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-primary font-headline text-sm mb-2">Tempat</label>
                        <input type="text" name="xtempat" value="<?php echo $agenda_tempat;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                    </div>
                    <div>
                        <label class="block text-primary font-headline text-sm mb-2">Waktu</label>
                        <input type="text" name="xwaktu" value="<?php echo $agenda_waktu;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" required>
                    </div>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Keterangan</label>
                    <textarea name="xketerangan" rows="2" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all"><?php echo $agenda_keterangan;?></textarea>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100 shrink-0">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $agenda_id;?>').classList.add('hidden')" class="px-6 py-2.5 text-gray-600 hover:text-gray-800 font-headline text-sm uppercase tracking-wider transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-secondary text-white rounded-md hover:bg-primary font-headline text-sm uppercase tracking-wider shadow-sm transition-colors">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus -->
<div id="ModalHapus<?php echo $agenda_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden">
        <form action="<?php echo base_url().'admin/agenda/hapus_agenda'?>" method="post">
            <div class="p-6 text-center font-serif">
                <div class="w-16 h-16 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-3xl">warning</span>
                </div>
                <h4 class="font-headline text-xl text-primary mb-2">Hapus Agenda?</h4>
                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus agenda <strong><?php echo $agenda_nama;?></strong>? Tindakan ini tidak dapat dibatalkan.</p>
                <input type="hidden" name="kode" value="<?php echo $agenda_id;?>"/>
                <div class="flex justify-center gap-3">
                    <button type="button" onclick="document.getElementById('ModalHapus<?php echo $agenda_id;?>').classList.add('hidden')" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 font-headline tracking-wider text-sm transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-wider text-sm shadow-sm transition-colors">Ya, Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endforeach;?>

<!-- Toast Notifications -->
<?php 
$msg = $this->session->flashdata('msg');
if($msg): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Tindakan berhasil.";
    if($msg == 'success') {
        $toastText = "Agenda berhasil disimpan.";
    } elseif($msg == 'success-hapus') {
        $toastClass = "bg-red-500";
        $toastIcon = "delete";
        $toastText = "Agenda berhasil dihapus.";
    } elseif($msg == 'info') {
        $toastClass = "bg-blue-500";
        $toastIcon = "info";
        $toastText = "Agenda berhasil diupdate.";
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3">
    <span class="material-symbols-outlined"><?php echo $toastIcon; ?></span>
    <span><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-msg');
        if(toast) { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }
    }, 4000);
</script>
<?php endif; ?>
