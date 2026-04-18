<section class="bg-cream px-6 py-24 min-h-screen">
    <div class="mx-auto max-w-7xl space-y-10">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <?php
                $this->load->view('components/section_header_left', array(
                    'eyebrow' => 'Administrator',
                    'title'   => 'Data Renungan'
                ));
                ?>
                <p class="mt-2 max-w-2xl text-gray-600 font-serif">
                    Kelola daftar renungan harian dengan tampilan admin yang konsisten dengan modul baru.
                </p>
            </div>

            <button
                type="button"
                onclick="document.getElementById('myModal').classList.remove('hidden')"
                class="inline-flex items-center justify-center gap-2 rounded-full bg-secondary px-6 py-3 text-sm font-headline uppercase tracking-[0.2em] text-white shadow-soft transition hover:bg-primary"
            >
                <span class="material-symbols-outlined text-[18px]">add</span>
                Tambah Renungan
            </button>
        </div>

        <?php 
        $total_renungan = ($data instanceof CI_DB_result) ? $data->num_rows() : 0; 
        ?>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="rounded-xl border border-primary/10 bg-white p-6 shadow-soft hover:shadow-lg transition-all border-l-4 border-l-primary/30">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-primary/70 font-headline">Total Koleksi</p>
                <div class="mt-3 flex items-end justify-between gap-4">
                    <p class="font-headline text-4xl text-primary"><?php echo $total_renungan; ?></p>
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/5 text-secondary">
                        <span class="material-symbols-outlined">menu_book</span>
                    </span>
                </div>
            </div>
            <div class="rounded-xl border border-primary/10 bg-white p-6 shadow-soft border-l-4 border-l-secondary/30">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-primary/70 font-headline">Status Modul</p>
                <p class="mt-3 font-serif text-sm text-gray-700 leading-relaxed italic">"Memberi makan jiwa dengan firman Tuhan setiap hari."</p>
            </div>
            <div class="rounded-xl border border-primary/10 bg-white p-6 shadow-soft border-l-4 border-l-blue-100">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-primary/70 font-headline">Ringkasan</p>
                <div class="mt-2 flex items-center gap-2 text-xs text-gray-500">
                    <span class="material-symbols-outlined text-[14px]">event</span>
                    <span>Update Terakhir: <?php echo date('d M Y'); ?></span>
                </div>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-primary/10 bg-white shadow-soft">
            <div class="flex flex-col gap-3 border-b border-gray-100 px-6 py-5 md:flex-row md:items-center md:justify-between bg-primary/5">
                <div>
                    <h3 class="font-headline text-lg tracking-[0.16em] text-primary uppercase">Daftar Renungan</h3>
                    <p class="mt-0.5 text-xs text-gray-500 italic font-serif">Arsip data renungan yang dipublikasikan ke jemaat.</p>
                </div>
                <div class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-primary border border-primary/10 shadow-sm">
                    <span class="material-symbols-outlined text-[16px] text-secondary">inventory_2</span>
                    <?php echo $total_renungan; ?> item
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-[900px] w-full border-collapse text-left">
                    <thead>
                        <tr class="border-b border-primary/15 bg-white text-primary">
                            <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em]">No</th>
                            <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em]">Informasi Renungan</th>
                            <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em]">Cuplikan Isi</th>
                            <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-[0.2em]">Detail Publikasi</th>
                            <th class="px-6 py-4 text-right text-[10px] font-bold uppercase tracking-[0.2em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="font-serif text-sm text-gray-700">
                        <?php
                        $no=0;
                        if($total_renungan > 0):
                        foreach ($data->result_array() as $i) :
                            $no++;
                            $renungan_id=$i['renungan_id'];
                            $renungan_judul=$i['renungan_judul'];
                            $renungan_deskripsi=$i['renungan_deskripsi'];
                            $renungan_author=$i['renungan_author'];
                            $tanggal=$i['tanggal'];
                        ?>
                        <tr class="border-b border-gray-100 align-top transition hover:bg-cream/20">
                            <td class="px-6 py-6 text-gray-400 font-headline text-xs"><?php echo str_pad($no, 2, '0', STR_PAD_LEFT); ?></td>
                            <td class="px-6 py-6">
                                <p class="font-bold text-primary text-base leading-tight"><?php echo $renungan_judul; ?></p>
                                <div class="mt-2 flex items-center gap-3">
                                    <span class="inline-flex items-center gap-1 text-[10px] uppercase font-bold tracking-widest text-secondary">
                                        <span class="material-symbols-outlined text-[14px]">person</span>
                                        <?php echo $renungan_author; ?>
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="max-w-md text-xs text-gray-600 leading-relaxed line-clamp-3 italic">
                                    "<?php echo strip_tags($renungan_deskripsi); ?>"
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <span class="inline-flex items-center gap-2 rounded-lg bg-primary/5 px-3 py-1.5 text-[10px] font-bold uppercase tracking-widest text-primary border border-primary/5">
                                    <span class="material-symbols-outlined text-[14px]">calendar_today</span>
                                    <?php echo $tanggal; ?>
                                </span>
                            </td>
                            <td class="px-6 py-6 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <button
                                        type="button"
                                        onclick="document.getElementById('ModalEdit<?php echo $renungan_id; ?>').classList.remove('hidden')"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-blue-600 transition hover:bg-blue-600 hover:text-white group"
                                        title="Edit"
                                    >
                                        <span class="material-symbols-outlined text-[18px] group-hover:scale-110 transition-transform">edit</span>
                                    </button>
                                    <button
                                        type="button"
                                        onclick="document.getElementById('ModalHapus<?php echo $renungan_id; ?>').classList.remove('hidden')"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-red-50 text-red-600 transition hover:bg-red-600 hover:text-white group"
                                        title="Hapus"
                                    >
                                        <span class="material-symbols-outlined text-[18px] group-hover:scale-110 transition-transform">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center justify-center space-y-3 opacity-40">
                                    <span class="material-symbols-outlined text-6xl">find_in_page</span>
                                    <p class="font-serif text-lg">Belum ada data renungan yang tersedia.</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal Add -->
<div id="myModal" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm transition-opacity">
    <div class="flex max-h-[95vh] w-full max-w-4xl flex-col overflow-hidden rounded-xl bg-white shadow-2xl">
        <form action="<?php echo base_url().'admin/renungan/simpan_renungan'?>" method="post" enctype="multipart/form-data" class="flex h-full flex-col font-serif">
            <div class="flex items-center justify-between bg-primary px-8 py-5 text-white shrink-0">
                <div>
                    <h4 class="font-headline text-lg tracking-[0.2em] uppercase">Tambah Renungan</h4>
                    <p class="text-[10px] text-white/60 tracking-widest uppercase mt-0.5">Input konten renungan harian baru</p>
                </div>
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="text-white/80 transition hover:text-white hover:rotate-90 transition-transform duration-300">
                    <span class="material-symbols-outlined font-bold">close</span>
                </button>
            </div>

            <div class="space-y-6 overflow-y-auto p-8 grow scrollbar-thin scrollbar-thumb-gray-100">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="mb-2 block text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-primary">Judul Renungan <span class="text-red-500">*</span></label>
                        <input
                            type="text"
                            name="xrenungan_judul"
                            class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-3.5 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white"
                            placeholder="Masukkan judul renungan yang inspiratif"
                            required
                        >
                    </div>
                    <div>
                        <label class="mb-2 block text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-primary">Isi Renungan Pendek <span class="text-red-500">*</span></label>
                        <textarea
                            name="xdeskripsi"
                            rows="10"
                            class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-3.5 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white resize-none"
                            placeholder="Tuliskan isi renungan di sini..."
                            required
                        ></textarea>
                        <p class="mt-2 text-[10px] text-gray-400 italic font-serif">* Gunakan bahasa yang mudah dipahami jemaat.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-gray-100 bg-gray-50/80 px-8 py-5 shrink-0 shadow-[0_-4px_10px_rgba(0,0,0,0.02)]">
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="px-6 py-2.5 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-gray-500 transition hover:text-primary">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-secondary px-10 py-3.5 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-white shadow-lg transition hover:bg-primary active:scale-95">
                    Publikasikan Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modals Edit -->
<?php if($total_renungan > 0): ?>
<?php foreach ($data->result_array() as $i) :
    $renungan_id=$i['renungan_id'];
    $renungan_judul=$i['renungan_judul'];
    $renungan_deskripsi=$i['renungan_deskripsi'];
?>
<div id="ModalEdit<?php echo $renungan_id; ?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm transition-opacity border-none">
    <div class="flex max-h-[95vh] w-full max-w-4xl flex-col overflow-hidden rounded-xl bg-white shadow-2xl">
        <form action="<?php echo base_url().'admin/renungan/update_renungan'?>" method="post" enctype="multipart/form-data" class="flex h-full flex-col font-serif">
            <div class="flex items-center justify-between bg-primary px-8 py-5 text-white shrink-0 shadow-sm">
                <div>
                    <h4 class="font-headline text-lg tracking-[0.2em] uppercase">Edit Konten Renungan</h4>
                    <p class="text-[10px] text-white/60 tracking-widest uppercase mt-0.5">ID Ref: #REN-<?php echo $renungan_id; ?></p>
                </div>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $renungan_id; ?>').classList.add('hidden')" class="text-white/80 transition hover:text-white hover:rotate-90 transition-transform duration-300">
                    <span class="material-symbols-outlined font-bold">close</span>
                </button>
            </div>

            <div class="space-y-6 overflow-y-auto p-8 grow scrollbar-thin scrollbar-thumb-gray-100">
                <input type="hidden" name="kode" value="<?php echo $renungan_id; ?>">
                <div>
                    <label class="mb-2 block text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-primary">Judul Renungan <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="xrenungan_judul"
                        value="<?php echo htmlspecialchars($renungan_judul); ?>"
                        class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-3.5 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white"
                        required
                    >
                </div>
                <div>
                    <label class="mb-2 block text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-primary">Isi Renungan <span class="text-red-500">*</span></label>
                    <textarea
                        name="xdeskripsi"
                        rows="12"
                        class="w-full rounded-xl border border-gray-200 bg-gray-50/50 px-5 py-3.5 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary focus:bg-white resize-none"
                        required
                    ><?php echo $renungan_deskripsi; ?></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-gray-100 bg-gray-50/80 px-8 py-5 shrink-0 shadow-inner">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $renungan_id; ?>').classList.add('hidden')" class="px-6 py-2.5 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-gray-500 transition hover:text-primary">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-secondary px-10 py-3.5 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-white shadow-lg transition hover:bg-primary active:scale-95">
                    Update Renungan
                </button>
            </div>
        </form>
    </div>
</div>

<div id="ModalHapus<?php echo $renungan_id; ?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm transition-opacity">
    <div class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl p-8 text-center font-serif">
        <form action="<?php echo base_url().'admin/renungan/hapus_renungan'?>" method="post" enctype="multipart/form-data">
            <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-red-50 text-red-600 border border-red-100">
                <span class="material-symbols-outlined text-4xl">warning</span>
            </div>
            <h4 class="font-headline text-xl text-primary uppercase tracking-wider">Hapus Data?</h4>
            <p class="mt-3 text-gray-600 leading-relaxed px-2">
                Apakah Anda yakin ingin menghapus renungan <strong>"<?php echo $renungan_judul; ?>"</strong> secara permanen?
            </p>
            <input type="hidden" name="kode" value="<?php echo $renungan_id; ?>"/>
            <div class="mt-10 flex justify-center gap-4">
                <button
                    type="button"
                    onclick="document.getElementById('ModalHapus<?php echo $renungan_id; ?>').classList.add('hidden')"
                    class="rounded-lg bg-gray-50 px-6 py-3 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-gray-500 transition hover:bg-gray-100 border border-gray-100"
                >
                    Batal
                </button>
                <button
                    type="submit"
                    class="rounded-lg bg-red-600 px-8 py-3 text-[10px] font-headline font-bold uppercase tracking-[0.2em] text-white shadow-lg transition hover:bg-red-700 active:scale-95 hover:scale-105"
                >
                    Hapus Selamanya
                </button>
            </div>
        </form>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>

<?php
$msg = $this->session->flashdata('msg');
if($msg):
    $toastClass = 'bg-green-500';
    $toastIcon = 'check_circle';
    $toastText = 'Tindakan berhasil.';
    if($msg == 'success') {
        $toastText = 'Renungan berhasil disimpan.';
    } elseif($msg == 'success-hapus') {
        $toastClass = 'bg-red-500';
        $toastIcon = 'delete';
        $toastText = 'Renungan berhasil dihapus.';
    } elseif($msg == 'info') {
        $toastClass = 'bg-blue-500';
        $toastIcon = 'info';
        $toastText = 'Renungan berhasil diupdate.';
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 z-[100] flex items-center gap-3 rounded-xl px-6 py-4 font-serif text-white shadow-2xl <?php echo $toastClass; ?>">
    <span class="material-symbols-outlined"><?php echo $toastIcon; ?></span>
    <span><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(function () {
        var toast = document.getElementById('toast-msg');
        if (toast) {
            toast.style.opacity = '0';
            setTimeout(function () {
                toast.remove();
            }, 300);
        }
    }, 4000);
</script>
<?php endif; ?>
